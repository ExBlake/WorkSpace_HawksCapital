<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="Estilos_Menu">
    <link rel="stylesheet" href="Estilos_Configuracion">
    <link rel="stylesheet" href="Estilos_Usuarios">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=SF+Pro+Display:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;500&display=swap">
    <!-- Fuentes adicionales -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="dashboard-container">
        <!-- Sidebar -->
        <?php include 'Layout/HeaderLeft.php'; ?>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Top Navigation Bar -->
            <?php include 'Layout/HeaderUp.php'; ?>

            <!-- Sub Navigation -->
            <div class="sub-navigation">
                <div class="breadcrumb">
                    <span>Inicio</span>
                    <i class="fas fa-chevron-right"></i>
                    <span class="current">Usuarios</span>
                </div>
            </div>

            <!-- Users Content -->
            <div class="dashboard-content">
                <div class="section-header">
                    <h1>Usuarios</h1>
                    <div class="header-actions">
                        <button id="add-user-btn" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            <span>Nuevo Usuario</span>
                        </button>
                    </div>
                </div>

                <!-- Users Filters and Actions -->
                <div class="users-actions">
                    <div class="search-filter">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Buscar usuarios..." id="user-search">
                            <button class="clear-search" id="clear-search" title="Clear Search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="view-actions">
                        <div class="filter-chips">
                            <div class="filter-chip" data-filter="all">
                                <span>Todos</span>
                            </div>
                            <div class="filter-chip" data-filter="admin">
                                <span>Administradores</span>
                            </div>
                            <div class="filter-chip" data-filter="editor">
                                <span>Editores</span>
                            </div>
                            <div class="filter-chip" data-filter="user">
                                <span>Usuarios</span>
                            </div>
                        </div>
                        <div class="view-toggle">
                            <button class="view-option active" data-view="grid" title="Vista de cuadrícula">
                                <i class="fas fa-grid-2"></i>
                            </button>
                            <button class="view-option" data-view="list" title="Vista de lista">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Users Grid View (Default) -->
                <div class="users-grid" id="users-grid">
                    <!-- User Card -->
                    <div class="user-card" data-role="admin" data-status="active">
                        <div class="user-card-header">
                            <div class="user-avatar">
                                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Appleseed">
                                <span class="status-indicator active"></span>
                            </div>
                            <div class="user-actions">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                        <div class="user-info">
                            <h3>John Appleseed</h3>
                            <p class="user-role admin">Administrador</p>
                            <p class="user-email">john.appleseed@example.com</p>
                        </div>
                        <div class="user-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Se unió el 12 Jun 2023</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>Activo hace 2 horas</span>
                            </div>
                        </div>
                        <div class="user-stats">
                            <div class="stat-item">
                                <span class="stat-value">12</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">48</span>
                                <span class="stat-label">Tareas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">75%</span>
                                <span class="stat-label">Completado</span>
                            </div>
                        </div>
                    </div>

                    <!-- User Card -->
                    <div class="user-card" data-role="editor" data-status="active">
                        <div class="user-card-header">
                            <div class="user-avatar">
                                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson">
                                <span class="status-indicator active"></span>
                            </div>
                            <div class="user-actions">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                        <div class="user-info">
                            <h3>Sarah Johnson</h3>
                            <p class="user-role editor">Editor</p>
                            <p class="user-email">sarah.johnson@example.com</p>
                        </div>
                        <div class="user-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Se unió el 3 Mar 2023</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>Activo hace 30 minutos</span>
                            </div>
                        </div>
                        <div class="user-stats">
                            <div class="stat-item">
                                <span class="stat-value">8</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">32</span>
                                <span class="stat-label">Tareas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">88%</span>
                                <span class="stat-label">Completado</span>
                            </div>
                        </div>
                    </div>

                    <!-- User Card -->
                    <div class="user-card" data-role="user" data-status="active">
                        <div class="user-card-header">
                            <div class="user-avatar">
                                <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Michael Chen">
                                <span class="status-indicator active"></span>
                            </div>
                            <div class="user-actions">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                        <div class="user-info">
                            <h3>Michael Chen</h3>
                            <p class="user-role user">Usuario</p>
                            <p class="user-email">michael.chen@example.com</p>
                        </div>
                        <div class="user-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Se unió el 15 Abr 2023</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>Activo hace 1 día</span>
                            </div>
                        </div>
                        <div class="user-stats">
                            <div class="stat-item">
                                <span class="stat-value">5</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">18</span>
                                <span class="stat-label">Tareas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">67%</span>
                                <span class="stat-label">Completado</span>
                            </div>
                        </div>
                    </div>

                    <!-- User Card -->
                    <div class="user-card" data-role="editor" data-status="active">
                        <div class="user-card-header">
                            <div class="user-avatar">
                                <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Emily Rodriguez">
                                <span class="status-indicator active"></span>
                            </div>
                            <div class="user-actions">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                        <div class="user-info">
                            <h3>Emily Rodriguez</h3>
                            <p class="user-role editor">Editor</p>
                            <p class="user-email">emily.rodriguez@example.com</p>
                        </div>
                        <div class="user-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Se unió el 22 Feb 2023</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>Activo hace 3 horas</span>
                            </div>
                        </div>
                        <div class="user-stats">
                            <div class="stat-item">
                                <span class="stat-value">7</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">29</span>
                                <span class="stat-label">Tareas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">76%</span>
                                <span class="stat-label">Completado</span>
                            </div>
                        </div>
                    </div>

                    <!-- User Card -->
                    <div class="user-card" data-role="user" data-status="inactive">
                        <div class="user-card-header">
                            <div class="user-avatar">
                                <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="David Wilson">
                                <span class="status-indicator inactive"></span>
                            </div>
                            <div class="user-actions">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                        <div class="user-info">
                            <h3>David Wilson</h3>
                            <p class="user-role user">Usuario</p>
                            <p class="user-email">david.wilson@example.com</p>
                        </div>
                        <div class="user-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Se unió el 5 Ene 2023</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>Inactivo desde hace 2 semanas</span>
                            </div>
                        </div>
                        <div class="user-stats">
                            <div class="stat-item">
                                <span class="stat-value">3</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">12</span>
                                <span class="stat-label">Tareas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">67%</span>
                                <span class="stat-label">Completado</span>
                            </div>
                        </div>
                    </div>

                    <!-- User Card -->
                    <div class="user-card" data-role="admin" data-status="active">
                        <div class="user-card-header">
                            <div class="user-avatar">
                                <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Olivia Taylor">
                                <span class="status-indicator active"></span>
                            </div>
                            <div class="user-actions">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                        <div class="user-info">
                            <h3>Olivia Taylor</h3>
                            <p class="user-role admin">Administrador</p>
                            <p class="user-email">olivia.taylor@example.com</p>
                        </div>
                        <div class="user-meta">
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Se unió el 10 Nov 2022</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-clock"></i>
                                <span>Activo ahora</span>
                            </div>
                        </div>
                        <div class="user-stats">
                            <div class="stat-item">
                                <span class="stat-value">15</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">52</span>
                                <span class="stat-label">Tareas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">92%</span>
                                <span class="stat-label">Completado</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Users List View (Hidden by default) -->
                <div class="users-list" id="users-list">
                    <div class="users-table">
                        <div class="table-header">
                            <div class="table-cell">Usuario</div>
                            <div class="table-cell">Email</div>
                            <div class="table-cell">Rol</div>
                            <div class="table-cell">Estado</div>
                            <div class="table-cell">Proyectos</div>
                            <div class="table-cell">Última actividad</div>
                            <div class="table-cell">Acciones</div>
                        </div>
                        
                        <!-- User Row -->
                        <div class="table-row" data-role="admin" data-status="active">
                            <div class="table-cell user-cell">
                                <div class="user-avatar-small">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Appleseed">
                                    <span class="status-indicator active"></span>
                                </div>
                                <span>John Appleseed</span>
                            </div>
                            <div class="table-cell">john.appleseed@example.com</div>
                            <div class="table-cell"><span class="role-badge admin">Administrador</span></div>
                            <div class="table-cell"><span class="status-badge active">Activo</span></div>
                            <div class="table-cell">12</div>
                            <div class="table-cell">Hace 2 horas</div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>

                        <!-- User Row -->
                        <div class="table-row" data-role="editor" data-status="active">
                            <div class="table-cell user-cell">
                                <div class="user-avatar-small">
                                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson">
                                    <span class="status-indicator active"></span>
                                </div>
                                <span>Sarah Johnson</span>
                            </div>
                            <div class="table-cell">sarah.johnson@example.com</div>
                            <div class="table-cell"><span class="role-badge editor">Editor</span></div>
                            <div class="table-cell"><span class="status-badge active">Activo</span></div>
                            <div class="table-cell">8</div>
                            <div class="table-cell">Hace 30 minutos</div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>

                        <!-- User Row -->
                        <div class="table-row" data-role="user" data-status="active">
                            <div class="table-cell user-cell">
                                <div class="user-avatar-small">
                                    <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Michael Chen">
                                    <span class="status-indicator active"></span>
                                </div>
                                <span>Michael Chen</span>
                            </div>
                            <div class="table-cell">michael.chen@example.com</div>
                            <div class="table-cell"><span class="role-badge user">Usuario</span></div>
                            <div class="table-cell"><span class="status-badge active">Activo</span></div>
                            <div class="table-cell">5</div>
                            <div class="table-cell">Hace 1 día</div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>

                        <!-- User Row -->
                        <div class="table-row" data-role="editor" data-status="active">
                            <div class="table-cell user-cell">
                                <div class="user-avatar-small">
                                    <img src="https://randomuser.me/api/portraits/women/28.jpg" alt="Emily Rodriguez">
                                    <span class="status-indicator active"></span>
                                </div>
                                <span>Emily Rodriguez</span>
                            </div>
                            <div class="table-cell">emily.rodriguez@example.com</div>
                            <div class="table-cell"><span class="role-badge editor">Editor</span></div>
                            <div class="table-cell"><span class="status-badge active">Activo</span></div>
                            <div class="table-cell">7</div>
                            <div class="table-cell">Hace 3 horas</div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>

                        <!-- User Row -->
                        <div class="table-row" data-role="user" data-status="inactive">
                            <div class="table-cell user-cell">
                                <div class="user-avatar-small">
                                    <img src="https://randomuser.me/api/portraits/men/41.jpg" alt="David Wilson">
                                    <span class="status-indicator inactive"></span>
                                </div>
                                <span>David Wilson</span>
                            </div>
                            <div class="table-cell">david.wilson@example.com</div>
                            <div class="table-cell"><span class="role-badge user">Usuario</span></div>
                            <div class="table-cell"><span class="status-badge inactive">Inactivo</span></div>
                            <div class="table-cell">3</div>
                            <div class="table-cell">Hace 2 semanas</div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>

                        <!-- User Row -->
                        <div class="table-row" data-role="admin" data-status="active">
                            <div class="table-cell user-cell">
                                <div class="user-avatar-small">
                                    <img src="https://randomuser.me/api/portraits/women/65.jpg" alt="Olivia Taylor">
                                    <span class="status-indicator active"></span>
                                </div>
                                <span>Olivia Taylor</span>
                            </div>
                            <div class="table-cell">olivia.taylor@example.com</div>
                            <div class="table-cell"><span class="role-badge admin">Administrador</span></div>
                            <div class="table-cell"><span class="status-badge active">Activo</span></div>
                            <div class="table-cell">15</div>
                            <div class="table-cell">Ahora</div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-user-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <button class="pagination-btn" disabled title="Previous Page">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <span class="pagination-ellipsis">...</span>
                    <button class="pagination-btn">10</button>
                    <button class="pagination-btn" title="Next Page">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para añadir/editar usuario -->
    <div class="modal" id="user-modal">
        <div class="modal-backdrop"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h2 id="modal-title">Nuevo Usuario</h2>
                <button class="modal-close" id="modal-close" title="Cerrar modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="user-form">
                    <div class="form-group">
                        <label for="user-name">Nombre completo</label>
                        <input type="text" id="user-name" class="form-input" placeholder="Nombre del usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="user-email">Email</label>
                        <input type="email" id="user-email" class="form-input" placeholder="correo@ejemplo.com" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="user-role">Rol</label>
                            <select id="user-role" class="form-select" required>
                                <option value="">Seleccionar rol</option>
                                <option value="admin">Administrador</option>
                                <option value="editor">Editor</option>
                                <option value="user">Usuario</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="user-status">Estado</label>
                            <select id="user-status" class="form-select" required>
                                <option value="">Seleccionar estado</option>
                                <option value="active">Activo</option>
                                <option value="inactive">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user-password">Contraseña</label>
                        <div class="password-input">
                            <input type="password" id="user-password" class="form-input" placeholder="Contraseña" required>
                            <button type="button" class="toggle-password" title="Mostrar/Ocultar contraseña">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user-avatar">Foto de perfil</label>
                        <div class="avatar-upload">
                            <div class="avatar-preview">
                                <div id="avatar-preview-image"></div>
                            </div>
                            <label for="user-avatar-input" class="avatar-upload-btn">
                                <i class="fas fa-camera"></i>
                                <span>Subir imagen</span>
                            </label>
                            <input type="file" id="user-avatar-input" accept="image/*" hidden>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user-bio">Biografía</label>
                        <textarea id="user-bio" class="form-textarea" placeholder="Información sobre el usuario"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Permisos</label>
                        <div class="permissions-grid">
                            <label class="permission-option">
                                <input type="checkbox" value="read">
                                <span>Lectura</span>
                            </label>
                            <label class="permission-option">
                                <input type="checkbox" value="write">
                                <span>Escritura</span>
                            </label>
                            <label class="permission-option">
                                <input type="checkbox" value="delete">
                                <span>Eliminación</span>
                            </label>
                            <label class="permission-option">
                                <input type="checkbox" value="admin">
                                <span>Administración</span>
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancel-user">Cancelar</button>
                <button class="btn btn-primary" id="save-user">Guardar</button>
            </div>
        </div>
    </div>

    <script src="Funcion_Menu"></script>

    <script src="Funcion_Sincronizacion"></script>
    <script src="Funcion_Usuarios"></script>
</body>
</html>
