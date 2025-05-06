document.addEventListener("DOMContentLoaded", () => {
  // Mobile sidebar functionality
  const sidebar = document.querySelector(".sidebar")
  const showSidebarBtn = document.getElementById("show-sidebar-btn")
  const sidebarToggle = document.getElementById("sidebar-toggle")

  // Create overlay element if it doesn't exist
  let overlay = document.querySelector(".sidebar-overlay")
  if (!overlay) {
    overlay = document.createElement("div")
    overlay.className = "sidebar-overlay"
    document.body.appendChild(overlay)
  }

  // Function to open sidebar on mobile
  function openSidebar() {
    sidebar.classList.add("active")
    overlay.classList.add("active")
    document.body.style.overflow = "hidden" // Prevent scrolling when sidebar is open
  }

  // Function to close sidebar on mobile
  function closeSidebar() {
    sidebar.classList.remove("active")
    overlay.classList.remove("active")
    document.body.style.overflow = "" // Restore scrolling
  }

  // Toggle sidebar on button click
  if (showSidebarBtn) {
    showSidebarBtn.addEventListener("click", () => {
      openSidebar()
    })
  }

  // Close sidebar when clicking the toggle button inside sidebar
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", () => {
      closeSidebar()
    })
  }

  // Close sidebar when clicking the overlay
  overlay.addEventListener("click", () => {
    closeSidebar()
  })

  // Close sidebar when pressing Escape key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && sidebar.classList.contains("active")) {
      closeSidebar()
    }
  })

  // Check window size and adjust sidebar accordingly
  function checkWindowSize() {
    if (window.innerWidth > 768) {
      // On desktop, remove active classes
      sidebar.classList.remove("active")
      overlay.classList.remove("active")
      document.body.style.overflow = ""
    }
  }

  // Listen for window resize
  window.addEventListener("resize", checkWindowSize)

  // Initial check
  checkWindowSize()

  // Toggle between grid and list view
  const viewOptions = document.querySelectorAll(".view-option")
  const usersGrid = document.getElementById("users-grid")
  const usersList = document.getElementById("users-list")

  viewOptions.forEach((option) => {
    option.addEventListener("click", function () {
      // Remove active class from all options
      viewOptions.forEach((opt) => opt.classList.remove("active"))

      // Add active class to clicked option
      this.classList.add("active")

      // Show the corresponding view
      const viewType = this.getAttribute("data-view")
      if (viewType === "grid") {
        usersGrid.style.display = "grid"
        usersList.style.display = "none"
      } else if (viewType === "list") {
        usersGrid.style.display = "none"
        usersList.style.display = "block"
      }

      // Save preference in localStorage
      localStorage.setItem("usersViewPreference", viewType)
    })
  })

  // Initialize view based on saved preference
  const savedViewPreference = localStorage.getItem("usersViewPreference")
  if (savedViewPreference) {
    const option = document.querySelector(`.view-option[data-view="${savedViewPreference}"]`)
    if (option) {
      option.click()
    }
  }

  // Search functionality
  const searchInput = document.getElementById("user-search")
  const clearSearchBtn = document.getElementById("clear-search")
  const userCards = document.querySelectorAll(".user-card")
  const userRows = document.querySelectorAll(".table-row")

  function filterUsers() {
    const searchTerm = searchInput.value.toLowerCase()

    // Filter grid view
    userCards.forEach((card) => {
      const userName = card.querySelector("h3").textContent.toLowerCase()
      const userEmail = card.querySelector(".user-email").textContent.toLowerCase()
      const userRole = card.getAttribute("data-role").toLowerCase()

      if (userName.includes(searchTerm) || userEmail.includes(searchTerm) || userRole.includes(searchTerm)) {
        card.style.display = "flex"
      } else {
        card.style.display = "none"
      }
    })

    // Filter list view
    userRows.forEach((row) => {
      if (row.classList.contains("table-header")) return

      const userName = row.querySelector(".user-cell span").textContent.toLowerCase()
      const userEmail = row
        .querySelectorAll(".table-cell')[1].textContent.toLowerCase()ble-cell")[1]
        .textContent.toLowerCase()
      const userRole = row.getAttribute("data-role").toLowerCase()

      if (userName.includes(searchTerm) || userEmail.includes(searchTerm) || userRole.includes(searchTerm)) {
        row.style.display = "flex"
      } else {
        row.style.display = "none"
      }
    })
  }

  if (searchInput) {
    searchInput.addEventListener("input", filterUsers)
  }

  if (clearSearchBtn) {
    clearSearchBtn.addEventListener("click", () => {
      searchInput.value = ""
      filterUsers()
    })
  }

  // Filter chips functionality
  const filterChips = document.querySelectorAll(".filter-chip")

  filterChips.forEach((chip) => {
    chip.addEventListener("click", function () {
      // Toggle active state
      const wasActive = this.classList.contains("active")

      // Remove active class from all chips
      filterChips.forEach((c) => c.classList.remove("active"))

      // If the chip wasn't active before, make it active
      if (!wasActive) {
        this.classList.add("active")
      } else {
        // If we're deactivating the "all" filter, activate it again
        // because we need at least one filter active
        if (this.getAttribute("data-filter") === "all") {
          this.classList.add("active")
        } else {
          // If we're deactivating a specific filter, activate the "all" filter
          document.querySelector('.filter-chip[data-filter="all"]').classList.add("active")
        }
      }

      // Apply filter
      const activeFilter = document.querySelector(".filter-chip.active").getAttribute("data-filter")

      // Filter grid view
      userCards.forEach((card) => {
        if (activeFilter === "all" || card.getAttribute("data-role") === activeFilter) {
          card.style.display = "flex"
        } else {
          card.style.display = "none"
        }
      })

      // Filter list view
      userRows.forEach((row) => {
        if (row.classList.contains("table-header")) return

        if (activeFilter === "all" || row.getAttribute("data-role") === activeFilter) {
          row.style.display = "flex"
        } else {
          row.style.display = "none"
        }
      })
    })
  })

  // Activate "all" filter by default
  document.querySelector('.filter-chip[data-filter="all"]').classList.add("active")

  // Modal functionality
  const modal = document.getElementById("user-modal")
  const addUserBtn = document.getElementById("add-user-btn")
  const editUserBtns = document.querySelectorAll(".edit-user-btn")
  const modalClose = document.getElementById("modal-close")
  const cancelUserBtn = document.getElementById("cancel-user")
  const saveUserBtn = document.getElementById("save-user")
  const modalTitle = document.getElementById("modal-title")
  const userForm = document.getElementById("user-form")

  // Toggle password visibility
  const togglePasswordBtn = document.querySelector(".toggle-password")
  const passwordInput = document.getElementById("user-password")

  if (togglePasswordBtn && passwordInput) {
    togglePasswordBtn.addEventListener("click", () => {
      const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
      passwordInput.setAttribute("type", type)
      togglePasswordBtn.innerHTML =
        type === "password" ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>'
    })
  }

  // Avatar preview
  const avatarInput = document.getElementById("user-avatar-input")
  const avatarPreview = document.getElementById("avatar-preview-image")

  if (avatarInput && avatarPreview) {
    avatarInput.addEventListener("change", function () {
      const file = this.files[0]
      if (file) {
        const reader = new FileReader()
        reader.onload = (e) => {
          avatarPreview.style.backgroundImage = `url(${e.target.result})`
        }
        reader.readAsDataURL(file)
      }
    })
  }

  // Open modal for adding a new user
  if (addUserBtn) {
    addUserBtn.addEventListener("click", () => {
      modalTitle.textContent = "Nuevo Usuario"
      userForm.reset()
      avatarPreview.style.backgroundImage = 'url("https://via.placeholder.com/80")'
      modal.classList.add("active")
    })
  }

  // Open modal for editing a user
  editUserBtns.forEach((btn) => {
    btn.addEventListener("click", () => {
      modalTitle.textContent = "Editar Usuario"

      // Get user data from the card or row
      let userCard
      if (btn.closest(".user-card")) {
        userCard = btn.closest(".user-card")

        // Fill form with user data
        document.getElementById("user-name").value = userCard.querySelector("h3").textContent
        document.getElementById("user-email").value = userCard.querySelector(".user-email").textContent
        document.getElementById("user-role").value = userCard.getAttribute("data-role")
        document.getElementById("user-status").value = userCard.getAttribute("data-status")

        // Set avatar preview
        const avatarSrc = userCard.querySelector(".user-avatar img").src
        avatarPreview.style.backgroundImage = `url(${avatarSrc})`
      } else if (btn.closest(".table-row")) {
        const userRow = btn.closest(".table-row")

        // Fill form with user data
        document.getElementById("user-name").value = userRow.querySelector(".user-cell span").textContent
        document.getElementById("user-email").value = userRow.querySelectorAll(".table-cell")[1].textContent
        document.getElementById("user-role").value = userRow.getAttribute("data-role")
        document.getElementById("user-status").value = userRow.getAttribute("data-status")

        // Set avatar preview
        const avatarSrc = userRow.querySelector(".user-avatar-small img").src
        avatarPreview.style.backgroundImage = `url(${avatarSrc})`
      }

      modal.classList.add("active")
    })
  })

  // Close modal
  function closeModal() {
    modal.classList.remove("active")
  }

  if (modalClose) {
    modalClose.addEventListener("click", closeModal)
  }

  if (cancelUserBtn) {
    cancelUserBtn.addEventListener("click", closeModal)
  }

  // Close modal when clicking outside
  modal.addEventListener("click", (e) => {
    if (e.target === modal || e.target.classList.contains("modal-backdrop")) {
      closeModal()
    }
  })

  // Close modal when pressing Escape
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && modal.classList.contains("active")) {
      closeModal()
    }
  })

  // Save user
  if (saveUserBtn) {
    saveUserBtn.addEventListener("click", () => {
      // Here you would normally validate the form and save the data
      // For this demo, we'll just close the modal
      alert("Usuario guardado correctamente")
      closeModal()
    })
  }

  // Reemplazar toda la función applyUserSettings() con esta versión mejorada
  // que se conecta directamente con las configuraciones de settings

  function applyUserSettings() {
    console.log("Aplicando configuraciones de usuario desde settings...")

    // ===== TEMA =====
    const savedTheme = localStorage.getItem("theme")
    const darkModeEnabled = localStorage.getItem("darkMode") === "enabled"

    console.log("Tema guardado:", savedTheme)
    console.log("Modo oscuro habilitado:", darkModeEnabled)

    if (savedTheme === "dark" || darkModeEnabled) {
      document.body.classList.add("dark-mode")
      document.documentElement.style.setProperty("--text-color", "#ffffff")
      document.documentElement.style.setProperty("--text-secondary", "#a0a0a0")
      document.documentElement.style.setProperty("--background-color", "#1c1c1e")
      document.documentElement.style.setProperty("--panel-color", "#2c2c2e")
      document.documentElement.style.setProperty("--border-color", "#3c3c3e")
      document.documentElement.style.setProperty("--gray-5", "#5c5c5e")
      document.documentElement.style.setProperty("--gray-6", "#48484a")
      document.documentElement.style.setProperty("--gray-7", "#3a3a3c")
      console.log("Aplicado tema oscuro")
    } else if (savedTheme === "light" || !savedTheme) {
      document.body.classList.remove("dark-mode")
      document.documentElement.style.setProperty("--text-color", "#000000")
      document.documentElement.style.setProperty("--text-secondary", "#666666")
      document.documentElement.style.setProperty("--background-color", "#f2f2f7")
      document.documentElement.style.setProperty("--panel-color", "#ffffff")
      document.documentElement.style.setProperty("--border-color", "#e5e5ea")
      document.documentElement.style.setProperty("--gray-5", "#e5e5ea")
      document.documentElement.style.setProperty("--gray-6", "#f2f2f7")
      document.documentElement.style.setProperty("--gray-7", "#f9f9f9")
      console.log("Aplicado tema claro")
    } else if (savedTheme === "system") {
      const prefersDarkMode = window.matchMedia("(prefers-color-scheme: dark)").matches
      if (prefersDarkMode) {
        document.body.classList.add("dark-mode")
        document.documentElement.style.setProperty("--text-color", "#ffffff")
        document.documentElement.style.setProperty("--text-secondary", "#a0a0a0")
        document.documentElement.style.setProperty("--background-color", "#1c1c1e")
        document.documentElement.style.setProperty("--panel-color", "#2c2c2e")
        document.documentElement.style.setProperty("--border-color", "#3c3c3e")
        document.documentElement.style.setProperty("--gray-5", "#5c5c5e")
        document.documentElement.style.setProperty("--gray-6", "#48484a")
        document.documentElement.style.setProperty("--gray-7", "#3a3a3c")
        console.log("Aplicado tema oscuro (sistema)")
      } else {
        document.body.classList.remove("dark-mode")
        document.documentElement.style.setProperty("--text-color", "#000000")
        document.documentElement.style.setProperty("--text-secondary", "#666666")
        document.documentElement.style.setProperty("--background-color", "#f2f2f7")
        document.documentElement.style.setProperty("--panel-color", "#ffffff")
        document.documentElement.style.setProperty("--border-color", "#e5e5ea")
        document.documentElement.style.setProperty("--gray-5", "#e5e5ea")
        document.documentElement.style.setProperty("--gray-6", "#f2f2f7")
        document.documentElement.style.setProperty("--gray-7", "#f9f9f9")
        console.log("Aplicado tema claro (sistema)")
      }
    }

    // ===== COLOR DE ACENTO =====
    const savedColor = localStorage.getItem("accentColor") || "#007AFF"
    console.log("Color de acento guardado:", savedColor)

    // Función para convertir hex a rgb
    function hexToRgb(hex) {
      // Eliminar el # si existe
      if (hex.startsWith("#")) {
        hex = hex.substring(1)
      }

      // Convertir formato corto (#abc) a formato largo (#aabbcc)
      if (hex.length === 3) {
        hex = hex
          .split("")
          .map((char) => char + char)
          .join("")
      }

      const r = Number.parseInt(hex.substring(0, 2), 16)
      const g = Number.parseInt(hex.substring(2, 4), 16)
      const b = Number.parseInt(hex.substring(4, 6), 16)

      return { r, g, b }
    }

    // Aplicar color de acento
    document.documentElement.style.setProperty("--primary-color", savedColor)

    // Crear versión RGB para transparencia
    const colorRGB = hexToRgb(savedColor)
    if (colorRGB) {
      const rgbValue = `${colorRGB.r}, ${colorRGB.g}, ${colorRGB.b}`
      document.documentElement.style.setProperty("--primary-color-rgb", rgbValue)

      // Aplicar versión clara para fondos
      const lightColor = `rgba(${colorRGB.r}, ${colorRGB.g}, ${colorRGB.b}, 0.1)`
      document.documentElement.style.setProperty("--primary-light", lightColor)
      console.log("Color de acento aplicado:", savedColor)
    }

    // ===== TIPOGRAFÍA =====
    const savedFontFamily =
      localStorage.getItem("fontFamily") || '"SF Pro Display", -apple-system, BlinkMacSystemFont, sans-serif'
    console.log("Familia de fuente guardada:", savedFontFamily)

    // Aplicar familia de fuente
    document.documentElement.style.setProperty("--font-family", savedFontFamily)
    document.documentElement.style.fontFamily = savedFontFamily
    document.body.style.fontFamily = savedFontFamily

    // Aplicar a elementos específicos
    const elementsToApplyFont = document.querySelectorAll(
      "body, .user-card, .user-info h3, .user-email, .meta-item, .stat-item, .table-row, .modal-container, .form-input, .form-select, .form-textarea, .btn, .section-header h1, .filter-chip, .pagination-btn",
    )

    elementsToApplyFont.forEach((el) => {
      el.style.fontFamily = savedFontFamily
    })
    console.log("Familia de fuente aplicada a", elementsToApplyFont.length, "elementos")

    // ===== PESO DE FUENTE =====
    const savedFontWeight = localStorage.getItem("fontWeight") || "400"
    console.log("Peso de fuente guardado:", savedFontWeight)

    // Aplicar peso de fuente
    document.documentElement.style.setProperty("--font-weight", savedFontWeight)
    document.documentElement.style.fontWeight = savedFontWeight
    document.body.style.fontWeight = savedFontWeight

    // Aplicar a elementos específicos
    const elementsToApplyWeight = document.querySelectorAll(
      "body, .user-email, .meta-item, .stat-label, .table-cell:not(.user-cell), .filter-chip, .search-box input",
    )

    elementsToApplyWeight.forEach((el) => {
      el.style.fontWeight = savedFontWeight
    })
    console.log("Peso de fuente aplicado a", elementsToApplyWeight.length, "elementos")

    // ===== ANIMACIONES =====
    const savedAnimations = localStorage.getItem("animations")
    if (savedAnimations === "disabled") {
      document.body.classList.add("no-animations")
      console.log("Animaciones desactivadas")
    } else {
      document.body.classList.remove("no-animations")
      console.log("Animaciones activadas")
    }

    // ===== VELOCIDAD DE ANIMACIÓN =====
    const savedSpeed = localStorage.getItem("animationSpeed") || "normal"
    let speedValue = "0.2s" // normal por defecto
    if (savedSpeed === "slow") {
      speedValue = "0.4s"
    } else if (savedSpeed === "fast") {
      speedValue = "0.1s"
    }
    document.documentElement.style.setProperty("--animation-speed", speedValue)
    console.log("Velocidad de animación:", speedValue)

    // ===== ALTO CONTRASTE =====
    const savedHighContrast = localStorage.getItem("highContrast")
    if (savedHighContrast === "enabled") {
      document.body.classList.add("high-contrast")
      console.log("Alto contraste activado")
    } else {
      document.body.classList.remove("high-contrast")
      console.log("Alto contraste desactivado")
    }

    // ===== RADIO DE BORDES =====
    const savedBorderRadius = localStorage.getItem("borderRadius") || "normal"
    let cardRadius = "16px"
    let buttonRadius = "10px"
    let inputRadius = "10px"

    if (savedBorderRadius === "rounded") {
      cardRadius = "20px"
      buttonRadius = "12px"
      inputRadius = "12px"
    } else if (savedBorderRadius === "square") {
      cardRadius = "4px"
      buttonRadius = "4px"
      inputRadius = "4px"
    }

    document.documentElement.style.setProperty("--card-radius", cardRadius)
    document.documentElement.style.setProperty("--button-radius", buttonRadius)
    document.documentElement.style.setProperty("--input-radius", inputRadius)
    console.log("Radio de bordes aplicado:", savedBorderRadius)

    // ===== DENSIDAD DE LAYOUT =====
    // Primero eliminar todas las clases de densidad
    document.body.classList.remove("compact-layout", "spacious-layout")

    const savedDensity = localStorage.getItem("layoutDensity") || "normal"
    if (savedDensity === "compact") {
      document.body.classList.add("compact-layout")
      console.log("Layout compacto aplicado")
    } else if (savedDensity === "spacious") {
      document.body.classList.add("spacious-layout")
      console.log("Layout espacioso aplicado")
    } else {
      console.log("Layout normal aplicado")
    }

    // ===== CSS PERSONALIZADO =====
    const customCSS = localStorage.getItem("customCSS")
    if (customCSS) {
      let styleElement = document.getElementById("custom-user-styles")
      if (!styleElement) {
        styleElement = document.createElement("style")
        styleElement.id = "custom-user-styles"
        document.head.appendChild(styleElement)
      }
      styleElement.textContent = customCSS
      console.log("CSS personalizado aplicado")
    }

    console.log("Configuraciones de usuario aplicadas correctamente")
  }

  // Reemplazar el código de inicialización con este
  document.addEventListener("DOMContentLoaded", () => {
    // Resto del código existente...

    // Aplicar configuraciones inmediatamente al cargar
    applyUserSettings()

    // Aplicar configuraciones después de un breve retraso para asegurar que el DOM esté completamente cargado
    setTimeout(applyUserSettings, 100)
    setTimeout(applyUserSettings, 500)
    setTimeout(applyUserSettings, 1000)

    // Aplicar configuraciones cada vez que cambie el localStorage
    window.addEventListener("storage", (e) => {
      console.log("Evento de almacenamiento detectado:", e.key)
      applyUserSettings()
    })

    // Crear un observador de mutaciones para aplicar estilos a nuevos elementos
    const observer = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.type === "childList" && mutation.addedNodes.length > 0) {
          // Si se añaden nuevos elementos al DOM, aplicar las configuraciones
          applyUserSettings()
        }
      })
    })

    // Iniciar observación del DOM
    observer.observe(document.body, { childList: true, subtree: true })

    // Aplicar configuraciones cada 2 segundos para asegurar que se mantengan
    const settingsInterval = setInterval(applyUserSettings, 2000)

    // Limpiar el intervalo cuando la página se descarga
    window.addEventListener("beforeunload", () => {
      clearInterval(settingsInterval)
      observer.disconnect()
    })
  })
})
