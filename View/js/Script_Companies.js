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
    const companiesGrid = document.getElementById("companies-grid")
    const companiesList = document.getElementById("companies-list")

    viewOptions.forEach((option) => {
        option.addEventListener("click", function () {
            // Remove active class from all options
            viewOptions.forEach((opt) => opt.classList.remove("active"))

            // Add active class to clicked option
            this.classList.add("active")

            // Show the corresponding view
            const viewType = this.getAttribute("data-view")
            if (viewType === "grid") {
                companiesGrid.style.display = "grid"
                companiesList.style.display = "none"
            } else if (viewType === "list") {
                companiesGrid.style.display = "none"
                companiesList.style.display = "block"
            }

            // Save preference in localStorage
            localStorage.setItem("companiesViewPreference", viewType)
        })
    })

    // Initialize view based on saved preference
    const savedViewPreference = localStorage.getItem("companiesViewPreference")
    if (savedViewPreference) {
        const option = document.querySelector(`.view-option[data-view="${savedViewPreference}"]`)
        if (option) {
            option.click()
        }
    }

    // Search functionality
    const searchInput = document.getElementById("company-search")
    const clearSearchBtn = document.getElementById("clear-search")
    const companyCards = document.querySelectorAll(".company-card")
    const companyRows = document.querySelectorAll(".table-row")

    function filterCompanies() {
        const searchTerm = searchInput.value.toLowerCase()
        const activeFilter = document.querySelector(".filter-chip.active").getAttribute("data-filter")

        // Filter grid view
        companyCards.forEach((card) => {
            const companyName = card.querySelector("h3").textContent.toLowerCase()
            const companyDescription = card.querySelector(".company-description").textContent.toLowerCase()
            const companyIndustry = card.getAttribute("data-industry")
            const companyStatus = card.getAttribute("data-status")

            const matchesSearch = companyName.includes(searchTerm) || companyDescription.includes(searchTerm)
            const matchesFilter = activeFilter === "all" || companyIndustry === activeFilter

            if (matchesSearch && matchesFilter) {
                card.style.display = "flex"
            } else {
                card.style.display = "none"
            }
        })

        // Filter list view
        companyRows.forEach((row) => {
            const companyName = row.querySelector(".company-cell span").textContent.toLowerCase()
            const companyIndustry = row.getAttribute("data-industry")
            const companyStatus = row.getAttribute("data-status")

            const matchesSearch = companyName.includes(searchTerm)
            const matchesFilter = activeFilter === "all" || companyIndustry === activeFilter

            if (matchesSearch && matchesFilter) {
                row.style.display = "flex"
            } else {
                row.style.display = "none"
            }
        })

        // Show/hide clear button
        if (searchTerm.length > 0) {
            clearSearchBtn.style.display = "flex"
        } else {
            clearSearchBtn.style.display = "none"
        }
    }

    // Search input event
    searchInput.addEventListener("input", filterCompanies)

    // Clear search button
    clearSearchBtn.addEventListener("click", () => {
        searchInput.value = ""
        filterCompanies()
    })

    // Filter chips functionality
    const filterChips = document.querySelectorAll(".filter-chip")

    filterChips.forEach((chip) => {
        chip.addEventListener("click", function () {
            // Remove active class from all chips
            filterChips.forEach((c) => c.classList.remove("active"))

            // Add active class to clicked chip
            this.classList.add("active")

            // Apply filters
            filterCompanies()
        })
    })

    // Set "all" filter as active by default
    document.querySelector('.filter-chip[data-filter="all"]').classList.add("active")

    // Modal functionality
    const companyModal = document.getElementById("company-modal")
    const companyDetailsModal = document.getElementById("company-details-modal")
    const addCompanyBtn = document.getElementById("add-company-btn")
    const modalClose = document.getElementById("modal-close")
    const detailsModalClose = document.getElementById("details-modal-close")
    const cancelCompanyBtn = document.getElementById("cancel-company")
    const saveCompanyBtn = document.getElementById("save-company")
    const closeDetailsBtn = document.getElementById("close-details")
    const editFromDetailsBtn = document.getElementById("edit-from-details")
    const modalTitle = document.getElementById("modal-title")
    const companyForm = document.getElementById("company-form")

    // Company logo preview functionality
    const logoInput = document.getElementById("company-logo-input")
    const logoPreview = document.getElementById("logo-preview-image")

    logoInput.addEventListener("change", function () {
        const file = this.files[0]
        if (file) {
            const reader = new FileReader()
            reader.onload = (e) => {
                logoPreview.style.backgroundImage = `url(${e.target.result})`
            }
            reader.readAsDataURL(file)
        }
    })

    // Open add company modal
    addCompanyBtn.addEventListener("click", () => {
        modalTitle.textContent = "Nueva Empresa"
        companyForm.reset()
        logoPreview.style.backgroundImage = "url('https://via.placeholder.com/80')"
        companyModal.classList.add("active")
        document.body.style.overflow = "hidden"

        // Set current company ID to null to indicate we're adding a new company
        companyModal.setAttribute("data-company-id", "")
    })

    // Close company modal
    function closeCompanyModal() {
        companyModal.classList.remove("active")
        document.body.style.overflow = ""
    }

    modalClose.addEventListener("click", closeCompanyModal)
    cancelCompanyBtn.addEventListener("click", closeCompanyModal)

    // Close details modal
    function closeDetailsModal() {
        companyDetailsModal.classList.remove("active")
        document.body.style.overflow = ""
    }

    detailsModalClose.addEventListener("click", closeDetailsModal)
    closeDetailsBtn.addEventListener("click", closeDetailsModal)

    // Edit from details
    editFromDetailsBtn.addEventListener("click", () => {
        const companyId = companyDetailsModal.getAttribute("data-company-id")
        closeDetailsModal()
        openEditModal(companyId)
    })

    // Close modals when clicking outside
    window.addEventListener("click", (e) => {
        if (e.target.classList.contains("modal-backdrop")) {
            closeCompanyModal()
            closeDetailsModal()
        }
    })

    // Close modals when pressing Escape key
    document.addEventListener("keydown", (e) => {
        if (e.key === "Escape") {
            closeCompanyModal()
            closeDetailsModal()
        }
    })

    // View company details
    const viewCompanyBtns = document.querySelectorAll(".view-company-btn")

    viewCompanyBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            // Get the company card or row
            const companyElement = this.closest(".company-card") || this.closest(".table-row")
            const companyId = companyElement.getAttribute("data-id") || generateId()

            // Store the company ID in the modal for reference
            companyDetailsModal.setAttribute("data-company-id", companyId)

            // Populate details modal with company information
            populateDetailsModal(companyElement)

            // Show the details modal
            companyDetailsModal.classList.add("active")
            document.body.style.overflow = "hidden"
        })
    })

    // Function to populate details modal
    function populateDetailsModal(companyElement) {
        // Get company data
        let companyName,
            companyIndustry,
            companyStatus,
            companyDescription,
            companyLocation,
            companyWebsite,
            companyEmployees,
            companyFounded,
            companyMarketValue,
            companyRating,
            companyLogo

        if (companyElement.classList.contains("company-card")) {
            // Grid view
            companyName = companyElement.querySelector("h3").textContent
            companyIndustry = companyElement.querySelector(".company-industry").textContent
            companyStatus = companyElement.querySelector(".company-status span").textContent
            companyDescription = companyElement.querySelector(".company-description").textContent

            const metaItems = companyElement.querySelectorAll(".meta-item")
            companyLocation = metaItems[0].querySelector("span").textContent
            companyEmployees = metaItems[1].querySelector("span").textContent
            companyFounded = metaItems[2].querySelector("span").textContent
            companyWebsite = metaItems[3].querySelector("span").textContent

            const statItems = companyElement.querySelectorAll(".stat-item")
            companyMarketValue = statItems[0].querySelector(".stat-value").textContent
            const projects = statItems[1].querySelector(".stat-value").textContent
            companyRating = statItems[2].querySelector(".stat-value").textContent

            companyLogo = companyElement.querySelector(".company-logo img").getAttribute("src")

            // Set details in modal
            document.getElementById("details-name").textContent = companyName
            document.getElementById("details-industry").textContent = companyIndustry
            document.getElementById("details-industry").className =
                "company-industry " + companyElement.querySelector(".company-industry").classList[1]
            document.getElementById("details-status").textContent = companyStatus
            document.getElementById("details-status").className =
                "company-status " + companyElement.querySelector(".company-status").classList[1]
            document.getElementById("details-description").textContent = companyDescription
            document.getElementById("details-location").textContent = companyLocation
            document.getElementById("details-website").textContent = companyWebsite
            document.getElementById("details-employees").textContent = companyEmployees
            document.getElementById("details-founded").textContent = companyFounded
            document.getElementById("details-market-value").textContent = companyMarketValue
            document.getElementById("details-projects").textContent = projects
            document.getElementById("details-rating").textContent = companyRating

            // Set logo
            document.getElementById("details-logo").innerHTML = `<img src="${companyLogo}" alt="${companyName}">`
            document.getElementById("details-logo").className =
                "company-details-logo " + companyElement.querySelector(".company-logo").classList[1]
        } else {
            // List view
            companyName = companyElement.querySelector(".company-cell span").textContent
            companyIndustry = companyElement.querySelector(".industry-badge").textContent
            companyStatus = companyElement.querySelector(".status-badge").textContent

            const cells = companyElement.querySelectorAll(".table-cell")
            companyLocation = cells[2].textContent
            companyEmployees = cells[3].textContent
            companyFounded = cells[4].textContent

            companyLogo = companyElement.querySelector(".company-logo-small img").getAttribute("src")

            // For list view, we need to find the corresponding card to get more details
            const correspondingCard = findCorrespondingCard(companyName)
            if (correspondingCard) {
                companyDescription = correspondingCard.querySelector(".company-description").textContent
                companyWebsite = correspondingCard.querySelectorAll(".meta-item")[3].querySelector("span").textContent

                const statItems = correspondingCard.querySelectorAll(".stat-item")
                companyMarketValue = statItems[0].querySelector(".stat-value").textContent
                const projects = statItems[1].querySelector(".stat-value").textContent
                companyRating = statItems[2].querySelector(".stat-value").textContent

                // Set details in modal
                document.getElementById("details-name").textContent = companyName
                document.getElementById("details-industry").textContent = companyIndustry
                document.getElementById("details-industry").className =
                    "company-industry " + companyElement.querySelector(".industry-badge").classList[1]
                document.getElementById("details-status").textContent = companyStatus
                document.getElementById("details-status").className =
                    "company-status " + (companyStatus.toLowerCase() === "activa" ? "active" : "inactive")
                document.getElementById("details-description").textContent = companyDescription
                document.getElementById("details-location").textContent = companyLocation
                document.getElementById("details-website").textContent = companyWebsite
                document.getElementById("details-employees").textContent = companyEmployees
                document.getElementById("details-founded").textContent = companyFounded
                document.getElementById("details-market-value").textContent = companyMarketValue
                document.getElementById("details-projects").textContent = projects
                document.getElementById("details-rating").textContent = companyRating

                // Set logo
                document.getElementById("details-logo").innerHTML = `<img src="${companyLogo}" alt="${companyName}">`
                document.getElementById("details-logo").className =
                    "company-details-logo " + companyElement.querySelector(".company-logo-small").classList[1]
            }
        }
    }

    // Function to find corresponding card by company name
    function findCorrespondingCard(companyName) {
        let foundCard = null
        companyCards.forEach((card) => {
            const cardName = card.querySelector("h3").textContent
            if (cardName === companyName) {
                foundCard = card
            }
        })
        return foundCard
    }

    // Edit company
    const editCompanyBtns = document.querySelectorAll(".edit-company-btn")

    editCompanyBtns.forEach((btn) => {
        btn.addEventListener("click", function () {
            // Get the company card or row
            const companyElement = this.closest(".company-card") || this.closest(".table-row")
            const companyId = companyElement.getAttribute("data-id") || generateId()

            openEditModal(companyId, companyElement)
        })
    })

    // Function to open edit modal
    function openEditModal(companyId, companyElement) {
        if (!companyElement) {
            // If companyElement is not provided, find it by ID
            companyElement =
                document.querySelector(`.company-card[data-id="${companyId}"]`) ||
                document.querySelector(`.table-row[data-id="${companyId}"]`)

            // If still not found, try to get it from the details modal
            if (!companyElement) {
                const detailsName = document.getElementById("details-name").textContent
                companyCards.forEach((card) => {
                    if (card.querySelector("h3").textContent === detailsName) {
                        companyElement = card
                    }
                })
            }
        }

        if (!companyElement) return

        modalTitle.textContent = "Editar Empresa"

        // Store the company ID in the modal for reference
        companyModal.setAttribute("data-company-id", companyId)

        // Populate form with company data
        populateEditForm(companyElement)

        // Show the modal
        companyModal.classList.add("active")
        document.body.style.overflow = "hidden"
    }

    // Function to populate edit form
    function populateEditForm(companyElement) {
        let companyName,
            companyIndustry,
            companyStatus,
            companyDescription,
            companyLocation,
            companyWebsite,
            companyEmployees,
            companyFounded,
            companyMarketValue,
            companyRating,
            companyLogo

        if (companyElement.classList.contains("company-card")) {
            // Grid view
            companyName = companyElement.querySelector("h3").textContent
            companyIndustry = companyElement.getAttribute("data-industry")
            companyStatus = companyElement.getAttribute("data-status")
            companyDescription = companyElement.querySelector(".company-description").textContent

            const metaItems = companyElement.querySelectorAll(".meta-item")
            companyLocation = metaItems[0].querySelector("span").textContent
            companyEmployees = metaItems[1].querySelector("span").textContent.replace(" empleados", "")
            companyFounded = metaItems[2].querySelector("span").textContent.replace("Fundada en ", "")
            companyWebsite = metaItems[3].querySelector("span").textContent

            const statItems = companyElement.querySelectorAll(".stat-item")
            companyMarketValue = statItems[0].querySelector(".stat-value").textContent
            companyRating = statItems[2].querySelector(".stat-value").textContent

            companyLogo = companyElement.querySelector(".company-logo img").getAttribute("src")
        } else {
            // List view
            companyName = companyElement.querySelector(".company-cell span").textContent
            companyIndustry = companyElement.getAttribute("data-industry")
            companyStatus = companyElement.getAttribute("data-status")

            const cells = companyElement.querySelectorAll(".table-cell")
            companyLocation = cells[2].textContent
            companyEmployees = cells[3].textContent
            companyFounded = cells[4].textContent

            companyLogo = companyElement.querySelector(".company-logo-small img").getAttribute("src")

            // For list view, we need to find the corresponding card to get more details
            const correspondingCard = findCorrespondingCard(companyName)
            if (correspondingCard) {
                companyDescription = correspondingCard.querySelector(".company-description").textContent
                companyWebsite = correspondingCard.querySelectorAll(".meta-item")[3].querySelector("span").textContent

                const statItems = correspondingCard.querySelectorAll(".stat-item")
                companyMarketValue = statItems[0].querySelector(".stat-value").textContent
                companyRating = statItems[2].querySelector(".stat-value").textContent
            }
        }

        // Set form values
        document.getElementById("company-name").value = companyName
        document.getElementById("company-industry").value = companyIndustry
        document.getElementById("company-status").value = companyStatus
        document.getElementById("company-description").value = companyDescription
        document.getElementById("company-location").value = companyLocation
        document.getElementById("company-website").value = companyWebsite
        document.getElementById("company-employees").value = companyEmployees.replace(/,/g, "")
        document.getElementById("company-founded").value = companyFounded
        document.getElementById("company-market-value").value = companyMarketValue
        document.getElementById("company-rating").value = companyRating

        // Set logo preview
        logoPreview.style.backgroundImage = `url(${companyLogo})`
    }

    // Save company
    saveCompanyBtn.addEventListener("click", () => {
        // Validate form
        if (!companyForm.checkValidity()) {
            companyForm.reportValidity()
            return
        }

        // Get form values
        const companyName = document.getElementById("company-name").value
        const companyIndustry = document.getElementById("company-industry").value
        const companyStatus = document.getElementById("company-status").value
        const companyDescription = document.getElementById("company-description").value
        const companyLocation = document.getElementById("company-location").value
        const companyWebsite = document.getElementById("company-website").value
        const companyEmployees = document.getElementById("company-employees").value
        const companyFounded = document.getElementById("company-founded").value
        const companyMarketValue = document.getElementById("company-market-value").value
        const companyRating = document.getElementById("company-rating").value

        // Get company ID from modal
        const companyId = companyModal.getAttribute("data-company-id")

        if (companyId) {
            // Edit existing company
            updateCompany(companyId, {
                name: companyName,
                industry: companyIndustry,
                status: companyStatus,
                description: companyDescription,
                location: companyLocation,
                website: companyWebsite,
                employees: companyEmployees,
                founded: companyFounded,
                marketValue: companyMarketValue,
                rating: companyRating,
                logo: logoPreview.style.backgroundImage.replace('url("', "").replace('")', ""),
            })
        } else {
            // Add new company
            addNewCompany({
                name: companyName,
                industry: companyIndustry,
                status: companyStatus,
                description: companyDescription,
                location: companyLocation,
                website: companyWebsite,
                employees: companyEmployees,
                founded: companyFounded,
                marketValue: companyMarketValue,
                rating: companyRating,
                logo: logoPreview.style.backgroundImage.replace('url("', "").replace('")', ""),
            })
        }

        // Close modal
        closeCompanyModal()

        // Show success message
        showNotification(companyId ? "Empresa actualizada correctamente" : "Empresa añadida correctamente")
    })

    // Function to update company
    function updateCompany(companyId, companyData) {
        // Find company elements by ID
        const companyCard = document.querySelector(`.company-card[data-id="${companyId}"]`)
        const companyRow = document.querySelector(`.table-row[data-id="${companyId}"]`)

        if (!companyCard && !companyRow) {
            // If elements not found by ID, try to find by name
            companyCards.forEach((card) => {
                if (card.querySelector("h3").textContent === companyData.name) {
                    card.setAttribute("data-id", companyId)
                    updateCompanyCard(card, companyData)
                }
            })

            companyRows.forEach((row) => {
                if (row.querySelector(".company-cell span").textContent === companyData.name) {
                    row.setAttribute("data-id", companyId)
                    updateCompanyRow(row, companyData)
                }
            })
        } else {
            // Update found elements
            if (companyCard) {
                updateCompanyCard(companyCard, companyData)
            }

            if (companyRow) {
                updateCompanyRow(companyRow, companyData)
            }
        }
    }

    // Function to update company card
    function updateCompanyCard(card, data) {
        // Update data attributes
        card.setAttribute("data-industry", data.industry)
        card.setAttribute("data-status", data.status)

        // Update name and description
        card.querySelector("h3").textContent = data.name
        card.querySelector(".company-description").textContent = data.description

        // Update industry
        const industrySpan = card.querySelector(".company-industry")
        industrySpan.textContent = getIndustryName(data.industry)
        industrySpan.className = `company-industry ${data.industry}`

        // Update logo
        const logoDiv = card.querySelector(".company-logo")
        logoDiv.className = `company-logo ${data.industry}`
        if (data.logo && data.logo !== "url('https://via.placeholder.com/80')") {
            logoDiv.querySelector("img").setAttribute("src", data.logo)
        }

        // Update meta items
        const metaItems = card.querySelectorAll(".meta-item")
        metaItems[0].querySelector("span").textContent = data.location
        metaItems[1].querySelector("span").textContent = formatNumber(data.employees) + " empleados"
        metaItems[2].querySelector("span").textContent = "Fundada en " + data.founded
        metaItems[3].querySelector("span").textContent = data.website

        // Update stats
        const statItems = card.querySelectorAll(".stat-item")
        statItems[0].querySelector(".stat-value").textContent = data.marketValue
        statItems[2].querySelector(".stat-value").textContent = data.rating

        // Update status
        const statusDiv = card.querySelector(".company-status")
        statusDiv.className = `company-status ${data.status}`
        statusDiv.querySelector("span").textContent = data.status === "active" ? "Activa" : "Inactiva"
    }

    // Function to update company row
    function updateCompanyRow(row, data) {
        // Update data attributes
        row.setAttribute("data-industry", data.industry)
        row.setAttribute("data-status", data.status)

        // Update cells
        const cells = row.querySelectorAll(".table-cell")

        // Company name and logo
        cells[0].querySelector("span").textContent = data.name
        const logoSmall = cells[0].querySelector(".company-logo-small")
        logoSmall.className = `company-logo-small ${data.industry}`
        if (data.logo && data.logo !== "url('https://via.placeholder.com/80')") {
            logoSmall.querySelector("img").setAttribute("src", data.logo)
        }

        // Industry
        const industryBadge = cells[1].querySelector(".industry-badge")
        industryBadge.textContent = getIndustryName(data.industry)
        industryBadge.className = `industry-badge ${data.industry}`

        // Other cells
        cells[2].textContent = data.location
        cells[3].textContent = formatNumber(data.employees)
        cells[4].textContent = data.founded

        // Status
        const statusBadge = cells[5].querySelector(".status-badge")
        statusBadge.textContent = data.status === "active" ? "Activa" : "Inactiva"
        statusBadge.className = `status-badge ${data.status}`
    }

    // Function to add new company
    function addNewCompany(companyData) {
        // Generate ID for new company
        const companyId = generateId()

        // Create new company card
        const newCard = createCompanyCard(companyId, companyData)
        companiesGrid.appendChild(newCard)

        // Create new company row
        const newRow = createCompanyRow(companyId, companyData)
        document.querySelector(".companies-table").appendChild(newRow)

        // Add event listeners to new elements
        addEventListenersToNewCompany(newCard, newRow)

        // Apply current filters
        filterCompanies()
    }

    // Function to create company card
    function createCompanyCard(id, data) {
        const card = document.createElement("div")
        card.className = "company-card"
        card.setAttribute("data-id", id)
        card.setAttribute("data-industry", data.industry)
        card.setAttribute("data-status", data.status)

        const industryName = getIndustryName(data.industry)
        const statusText = data.status === "active" ? "Activa" : "Inactiva"

        card.innerHTML = `
        <div class="company-card-header">
          <div class="company-logo ${data.industry}">
            <img src="${data.logo || "https://via.placeholder.com/80"}" alt="${data.name}">
          </div>
          <div class="company-actions">
            <button class="btn-icon edit-company-btn" title="Editar">
              <i class="fas fa-pen"></i>
            </button>
            <button class="btn-icon view-company-btn" title="Ver detalles">
              <i class="fas fa-eye"></i>
            </button>
          </div>
        </div>
        <div class="company-info">
          <h3>${data.name}</h3>
          <span class="company-industry ${data.industry}">${industryName}</span>
          <p class="company-description">${data.description}</p>
        </div>
        <div class="company-meta">
          <div class="meta-item">
            <i class="fas fa-map-marker-alt"></i>
            <span>${data.location}</span>
          </div>
          <div class="meta-item">
            <i class="fas fa-users"></i>
            <span>${formatNumber(data.employees)} empleados</span>
          </div>
          <div class="meta-item">
            <i class="fas fa-calendar"></i>
            <span>Fundada en ${data.founded}</span>
          </div>
          <div class="meta-item">
            <i class="fas fa-globe"></i>
            <span>${data.website}</span>
          </div>
        </div>
        <div class="company-stats">
          <div class="stat-item">
            <span class="stat-value">${data.marketValue}</span>
            <span class="stat-label">Valor mercado</span>
          </div>
          <div class="stat-item">
            <span class="stat-value">0</span>
            <span class="stat-label">Proyectos</span>
          </div>
          <div class="stat-item">
            <span class="stat-value">${data.rating}</span>
            <span class="stat-label">Rating</span>
          </div>
        </div>
        <div class="company-status ${data.status}">
          <span>${statusText}</span>
        </div>
      `

        return card
    }

    // Function to create company row
    function createCompanyRow(id, data) {
        const row = document.createElement("div")
        row.className = "table-row"
        row.setAttribute("data-id", id)
        row.setAttribute("data-industry", data.industry)
        row.setAttribute("data-status", data.status)

        const industryName = getIndustryName(data.industry)
        const statusText = data.status === "active" ? "Activa" : "Inactiva"

        row.innerHTML = `
        <div class="table-cell company-cell">
          <div class="company-logo-small ${data.industry}">
            <img src="${data.logo || "https://via.placeholder.com/80"}" alt="${data.name}">
          </div>
          <span>${data.name}</span>
        </div>
        <div class="table-cell"><span class="industry-badge ${data.industry}">${industryName}</span></div>
        <div class="table-cell">${data.location}</div>
        <div class="table-cell">${formatNumber(data.employees)}</div>
        <div class="table-cell">${data.founded}</div>
        <div class="table-cell"><span class="status-badge ${data.status}">${statusText}</span></div>
        <div class="table-cell actions-cell">
          <button class="btn-icon edit-company-btn" title="Editar">
            <i class="fas fa-pen"></i>
          </button>
          <button class="btn-icon view-company-btn" title="Ver detalles">
            <i class="fas fa-eye"></i>
          </button>
        </div>
      `

        return row
    }

    // Function to add event listeners to new company elements
    function addEventListenersToNewCompany(card, row) {
        // View buttons
        card.querySelector(".view-company-btn").addEventListener("click", () => {
            const companyId = card.getAttribute("data-id")
            companyDetailsModal.setAttribute("data-company-id", companyId)
            populateDetailsModal(card)
            companyDetailsModal.classList.add("active")
            document.body.style.overflow = "hidden"
        })

        row.querySelector(".view-company-btn").addEventListener("click", () => {
            const companyId = row.getAttribute("data-id")
            companyDetailsModal.setAttribute("data-company-id", companyId)
            populateDetailsModal(row)
            companyDetailsModal.classList.add("active")
            document.body.style.overflow = "hidden"
        })

        // Edit buttons
        card.querySelector(".edit-company-btn").addEventListener("click", () => {
            const companyId = card.getAttribute("data-id")
            openEditModal(companyId, card)
        })

        row.querySelector(".edit-company-btn").addEventListener("click", () => {
            const companyId = row.getAttribute("data-id")
            openEditModal(companyId, row)
        })
    }

    // Helper functions
    function generateId() {
        return "company_" + Math.random().toString(36).substr(2, 9)
    }

    function getIndustryName(industry) {
        const industries = {
            tech: "Tecnología",
            finance: "Finanzas",
            retail: "Retail",
            health: "Salud",
            other: "Otra",
        }
        return industries[industry] || "Otra"
    }

    function formatNumber(num) {
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }

    function showNotification(message) {
        const notification = document.createElement("div")
        notification.className = "notification"
        notification.textContent = message

        document.body.appendChild(notification)

        setTimeout(() => {
            notification.classList.add("show")
        }, 10)

        setTimeout(() => {
            notification.classList.remove("show")
            setTimeout(() => {
                document.body.removeChild(notification)
            }, 300)
        }, 3000)
    }

    // Add notification styles if not already present
    if (!document.getElementById("notification-styles")) {
        const style = document.createElement("style")
        style.id = "notification-styles"
        style.textContent = `
        .notification {
          position: fixed;
          bottom: 20px;
          right: 20px;
          padding: 12px 20px;
          background-color: var(--primary-color, #007aff);
          color: white;
          border-radius: 8px;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
          z-index: 1100;
          transform: translateY(100px);
          opacity: 0;
          transition: all 0.3s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }
        
        .notification.show {
          transform: translateY(0);
          opacity: 1;
        }
      `
        document.head.appendChild(style)
    }

    // Initialize the page
    filterCompanies()
})
