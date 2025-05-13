document.addEventListener('DOMContentLoaded', function() {
    // Referencias a elementos del DOM
    const pqrGrid = document.getElementById('pqr-grid');
    const pqrList = document.getElementById('pqr-list');
    const viewOptions = document.querySelectorAll('.view-option');
    const filterChips = document.querySelectorAll('.filter-chip');
    const searchInput = document.getElementById('pqr-search');
    const clearSearchBtn = document.getElementById('clear-search');
    const addPqrBtn = document.getElementById('add-pqr-btn');
    const pqrModal = document.getElementById('pqr-modal');
    const modalClose = document.getElementById('modal-close');
    const cancelPqrBtn = document.getElementById('cancel-pqr');
    const savePqrBtn = document.getElementById('save-pqr');
    const pqrForm = document.getElementById('pqr-form');
    const viewPqrBtns = document.querySelectorAll('.view-pqr-btn');
    const editPqrBtns = document.querySelectorAll('.edit-pqr-btn');
    const pqrDetailsModal = document.getElementById('pqr-details-modal');
    const detailsModalClose = document.getElementById('details-modal-close');
    const closeDetailsBtn = document.getElementById('close-details');
    const editFromDetailsBtn = document.getElementById('edit-from-details');
    const fileInput = document.getElementById('pqr-attachments-input');
    const fileList = document.getElementById('file-list');
    const responseForm = document.getElementById('response-form');

    // Cambiar entre vista de cuadrícula y lista
    viewOptions.forEach(option => {
        option.addEventListener('click', function() {
            const view = this.getAttribute('data-view');
            
            viewOptions.forEach(opt => opt.classList.remove('active'));
            this.classList.add('active');
            
            if (view === 'grid') {
                pqrGrid.style.display = 'grid';
                pqrList.style.display = 'none';
            } else {
                pqrGrid.style.display = 'none';
                pqrList.style.display = 'block';
            }
        });
    });

    // Filtrar PQRs por tipo
    filterChips.forEach(chip => {
        chip.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            filterChips.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            
            const pqrCards = document.querySelectorAll('.pqr-card');
            const pqrRows = document.querySelectorAll('.table-row');
            
            if (filter === 'all') {
                pqrCards.forEach(card => card.style.display = 'flex');
                pqrRows.forEach(row => row.style.display = 'flex');
            } else {
                pqrCards.forEach(card => {
                    if (card.getAttribute('data-type') === filter) {
                        card.style.display = 'flex';
                    } else {
                        card.style.display = 'none';
                    }
                });
                
                pqrRows.forEach(row => {
                    if (row.getAttribute('data-type') === filter) {
                        row.style.display = 'flex';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }
        });
    });

    // Búsqueda de PQRs
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        
        const pqrCards = document.querySelectorAll('.pqr-card');
        const pqrRows = document.querySelectorAll('.table-row');
        
        pqrCards.forEach(card => {
            const title = card.querySelector('h3').textContent.toLowerCase();
            const description = card.querySelector('.pqr-description').textContent.toLowerCase();
            
            if (title.includes(searchTerm) || description.includes(searchTerm)) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
        
        pqrRows.forEach(row => {
            const title = row.querySelector('.pqr-cell span').textContent.toLowerCase();
            
            if (title.includes(searchTerm)) {
                row.style.display = 'flex';
            } else {
                row.style.display = 'none';
            }
        });
    });

    // Limpiar búsqueda
    clearSearchBtn.addEventListener('click', function() {
        searchInput.value = '';
        const event = new Event('input');
        searchInput.dispatchEvent(event);
    });

    // Abrir modal para añadir PQR
    addPqrBtn.addEventListener('click', function() {
        pqrForm.reset();
        document.getElementById('modal-title').textContent = 'Nuevo PQR';
        pqrModal.classList.add('active');
    });

    // Cerrar modal
    modalClose.addEventListener('click', function() {
        pqrModal.classList.remove('active');
    });

    cancelPqrBtn.addEventListener('click', function() {
        pqrModal.classList.remove('active');
    });

    // Guardar PQR
    savePqrBtn.addEventListener('click', function() {
        // Aquí iría la lógica para guardar el PQR
        // Por ahora solo cerramos el modal
        pqrModal.classList.remove('active');
    });

    // Ver detalles del PQR
    viewPqrBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Aquí cargaríamos los detalles del PQR específico
            pqrDetailsModal.classList.add('active');
        });
    });

    // Cerrar modal de detalles
    detailsModalClose.addEventListener('click', function() {
        pqrDetailsModal.classList.remove('active');
    });

    closeDetailsBtn.addEventListener('click', function() {
        pqrDetailsModal.classList.remove('active');
    });

    // Editar desde detalles
    editFromDetailsBtn.addEventListener('click', function() {
        pqrDetailsModal.classList.remove('active');
        // Aquí cargaríamos los datos del PQR en el formulario
        document.getElementById('modal-title').textContent = 'Editar PQR';
        pqrModal.classList.add('active');
    });

    // Editar PQR
    editPqrBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Aquí cargaríamos los datos del PQR en el formulario
            document.getElementById('modal-title').textContent = 'Editar PQR';
            pqrModal.classList.add('active');
        });
    });

    // Manejo de archivos adjuntos
    if (fileInput) {
        fileInput.addEventListener('change', function() {
            fileList.innerHTML = '';
            
            for (const file of this.files) {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                
                let icon = 'fa-file';
                if (file.type.startsWith('image/')) {
                    icon = 'fa-file-image';
                } else if (file.type === 'application/pdf') {
                    icon = 'fa-file-pdf';
                } else if (file.type.includes('word')) {
                    icon = 'fa-file-word';
                } else if (file.type.includes('excel') || file.type.includes('sheet')) {
                    icon = 'fa-file-excel';
                }
                
                fileItem.innerHTML = `
                    <i class="fas ${icon}"></i>
                    <span>${file.name}</span>
                    <span class="file-remove" data-name="${file.name}">
                        <i class="fas fa-times"></i>
                    </span>
                `;
                
                fileList.appendChild(fileItem);
            }
            
            // Agregar evento para eliminar archivos
            document.querySelectorAll('.file-remove').forEach(btn => {
                btn.addEventListener('click', function() {
                    const fileName = this.getAttribute('data-name');
                    // Aquí habría que implementar la lógica para eliminar el archivo del input
                    this.closest('.file-item').remove();
                });
            });
        });
    }

    // Enviar respuesta
    if (responseForm) {
        responseForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const responseText = document.getElementById('response-text').value;
            
            if (responseText.trim() !== '') {
                const responsesList = document.getElementById('details-responses');
                
                const responseItem = document.createElement('div');
                responseItem.className = 'response-item';
                
                const currentDate = new Date();
                const formattedDate = `${currentDate.getDate()}/${currentDate.getMonth() + 1}/${currentDate.getFullYear()} ${currentDate.getHours()}:${currentDate.getMinutes()}`;
                
                responseItem.innerHTML = `
                    <div class="response-header">
                        <div class="response-user">
                            <div class="user-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="user-info">
                                <span class="user-name">Usuario Actual</span>
                                <span class="response-date">${formattedDate}</span>
                            </div>
                        </div>
                    </div>
                    <div class="response-content">
                        <p>${responseText}</p>
                    </div>
                `;
                
                responsesList.appendChild(responseItem);
                document.getElementById('response-text').value = '';
            }
        });
    }

    // Cerrar modales al hacer clic fuera de ellos
    window.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal-backdrop')) {
            pqrModal.classList.remove('active');
            pqrDetailsModal.classList.remove('active');
        }
    });
});