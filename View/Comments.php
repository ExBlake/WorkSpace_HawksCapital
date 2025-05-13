<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema PQR</title>
    <link rel="stylesheet" href="Estilos_Menu">
    <link rel="stylesheet" href="Estilos_PQRS">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=SF+Pro+Display:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@400;500&display=swap">
    <!-- Fuentes adicionales -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700&display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <?php include '../Controller/Token.php'; ?>

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
                    <span class="current">Sistema PQR</span>
                </div>
            </div>

            <!-- PQR Content -->
            <div class="dashboard-content">
                <div class="section-header">
                    <h1>Sistema PQR</h1>
                    <div class="header-actions">
                        <button id="add-pqr-btn" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            <span>Nuevo PQR</span>
                        </button>
                    </div>
                </div>

                <!-- PQR Filters and Actions -->
                <div class="pqr-actions">
                    <div class="search-filter">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Buscar PQRs..." id="pqr-search">
                            <button class="clear-search" id="clear-search" title="Limpiar búsqueda">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="view-actions">
                        <div class="filter-chips">
                            <div class="filter-chip active" data-filter="all">
                                <span>Todos</span>
                            </div>
                            <div class="filter-chip" data-filter="peticion">
                                <span>Peticiones</span>
                            </div>
                            <div class="filter-chip" data-filter="queja">
                                <span>Quejas</span>
                            </div>
                            <div class="filter-chip" data-filter="reclamo">
                                <span>Reclamos</span>
                            </div>
                            <div class="filter-chip" data-filter="sugerencia">
                                <span>Sugerencias</span>
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

                <!-- PQR Grid View (Default) -->
                <div class="pqr-grid" id="pqr-grid">
                    <!-- PQR Card -->
                    <div class="pqr-card" data-type="peticion" data-status="pendiente">
                        <div class="pqr-card-header">
                            <div class="pqr-icon peticion">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="pqr-actions">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="pqr-info">
                            <h3>Solicitud de información</h3>
                            <span class="pqr-type peticion">Petición</span>
                            <p class="pqr-description">Necesito información detallada sobre los servicios ofrecidos por la empresa.</p>
                        </div>
                        <div class="pqr-meta">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span>Juan Pérez</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-envelope"></i>
                                <span>juan.perez@email.com</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>15/05/2023</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-building"></i>
                                <span>Apple Inc.</span>
                            </div>
                        </div>
                        <div class="pqr-stats">
                            <div class="stat-item">
                                <span class="stat-value">3</span>
                                <span class="stat-label">Días</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">0</span>
                                <span class="stat-label">Respuestas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">Media</span>
                                <span class="stat-label">Prioridad</span>
                            </div>
                        </div>
                        <div class="pqr-status pendiente">
                            <span>Pendiente</span>
                        </div>
                    </div>

                    <!-- PQR Card -->
                    <div class="pqr-card" data-type="queja" data-status="en-proceso">
                        <div class="pqr-card-header">
                            <div class="pqr-icon queja">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="pqr-actions">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="pqr-info">
                            <h3>Servicio al cliente deficiente</h3>
                            <span class="pqr-type queja">Queja</span>
                            <p class="pqr-description">El representante de servicio al cliente no fue amable ni resolvió mi problema.</p>
                        </div>
                        <div class="pqr-meta">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span>María González</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-envelope"></i>
                                <span>maria.g@email.com</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>10/05/2023</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-building"></i>
                                <span>Microsoft</span>
                            </div>
                        </div>
                        <div class="pqr-stats">
                            <div class="stat-item">
                                <span class="stat-value">8</span>
                                <span class="stat-label">Días</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">1</span>
                                <span class="stat-label">Respuestas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">Alta</span>
                                <span class="stat-label">Prioridad</span>
                            </div>
                        </div>
                        <div class="pqr-status en-proceso">
                            <span>En proceso</span>
                        </div>
                    </div>

                    <!-- PQR Card -->
                    <div class="pqr-card" data-type="reclamo" data-status="pendiente">
                        <div class="pqr-card-header">
                            <div class="pqr-icon reclamo">
                                <i class="fas fa-gavel"></i>
                            </div>
                            <div class="pqr-actions">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="pqr-info">
                            <h3>Producto defectuoso</h3>
                            <span class="pqr-type reclamo">Reclamo</span>
                            <p class="pqr-description">El producto que recibí está defectuoso y solicito un reemplazo inmediato.</p>
                        </div>
                        <div class="pqr-meta">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span>Carlos Rodríguez</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-envelope"></i>
                                <span>carlos.r@email.com</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>12/05/2023</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-building"></i>
                                <span>Amazon</span>
                            </div>
                        </div>
                        <div class="pqr-stats">
                            <div class="stat-item">
                                <span class="stat-value">6</span>
                                <span class="stat-label">Días</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">0</span>
                                <span class="stat-label">Respuestas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">Alta</span>
                                <span class="stat-label">Prioridad</span>
                            </div>
                        </div>
                        <div class="pqr-status pendiente">
                            <span>Pendiente</span>
                        </div>
                    </div>

                    <!-- PQR Card -->
                    <div class="pqr-card" data-type="sugerencia" data-status="resuelto">
                        <div class="pqr-card-header">
                            <div class="pqr-icon sugerencia">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div class="pqr-actions">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="pqr-info">
                            <h3>Mejora en la aplicación móvil</h3>
                            <span class="pqr-type sugerencia">Sugerencia</span>
                            <p class="pqr-description">Sugiero añadir una función de búsqueda avanzada en la aplicación móvil.</p>
                        </div>
                        <div class="pqr-meta">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span>Ana Martínez</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-envelope"></i>
                                <span>ana.m@email.com</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>05/05/2023</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-building"></i>
                                <span>Google</span>
                            </div>
                        </div>
                        <div class="pqr-stats">
                            <div class="stat-item">
                                <span class="stat-value">13</span>
                                <span class="stat-label">Días</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">2</span>
                                <span class="stat-label">Respuestas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">Baja</span>
                                <span class="stat-label">Prioridad</span>
                            </div>
                        </div>
                        <div class="pqr-status resuelto">
                            <span>Resuelto</span>
                        </div>
                    </div>

                    <!-- PQR Card -->
                    <div class="pqr-card" data-type="peticion" data-status="en-proceso">
                        <div class="pqr-card-header">
                            <div class="pqr-icon peticion">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <div class="pqr-actions">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="pqr-info">
                            <h3>Solicitud de documentación</h3>
                            <span class="pqr-type peticion">Petición</span>
                            <p class="pqr-description">Necesito una copia de mi factura del mes de abril para fines fiscales.</p>
                        </div>
                        <div class="pqr-meta">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span>Roberto Sánchez</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-envelope"></i>
                                <span>roberto.s@email.com</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>08/05/2023</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-building"></i>
                                <span>JPMorgan Chase</span>
                            </div>
                        </div>
                        <div class="pqr-stats">
                            <div class="stat-item">
                                <span class="stat-value">10</span>
                                <span class="stat-label">Días</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">1</span>
                                <span class="stat-label">Respuestas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">Media</span>
                                <span class="stat-label">Prioridad</span>
                            </div>
                        </div>
                        <div class="pqr-status en-proceso">
                            <span>En proceso</span>
                        </div>
                    </div>

                    <!-- PQR Card -->
                    <div class="pqr-card" data-type="queja" data-status="resuelto">
                        <div class="pqr-card-header">
                            <div class="pqr-icon queja">
                                <i class="fas fa-exclamation-circle"></i>
                            </div>
                            <div class="pqr-actions">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                        <div class="pqr-info">
                            <h3>Demora en la entrega</h3>
                            <span class="pqr-type queja">Queja</span>
                            <p class="pqr-description">Mi pedido ha tardado más de lo prometido en ser entregado.</p>
                        </div>
                        <div class="pqr-meta">
                            <div class="meta-item">
                                <i class="fas fa-user"></i>
                                <span>Laura Torres</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-envelope"></i>
                                <span>laura.t@email.com</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>02/05/2023</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-building"></i>
                                <span>Walmart</span>
                            </div>
                        </div>
                        <div class="pqr-stats">
                            <div class="stat-item">
                                <span class="stat-value">16</span>
                                <span class="stat-label">Días</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">3</span>
                                <span class="stat-label">Respuestas</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">Media</span>
                                <span class="stat-label">Prioridad</span>
                            </div>
                        </div>
                        <div class="pqr-status resuelto">
                            <span>Resuelto</span>
                        </div>
                    </div>
                </div>

                <!-- PQR List View (Hidden by default) -->
                <div class="pqr-list" id="pqr-list">
                    <div class="pqr-table">
                        <div class="table-header">
                            <div class="table-cell">Asunto</div>
                            <div class="table-cell">Tipo</div>
                            <div class="table-cell">Solicitante</div>
                            <div class="table-cell">Empresa</div>
                            <div class="table-cell">Fecha</div>
                            <div class="table-cell">Estado</div>
                            <div class="table-cell">Acciones</div>
                        </div>

                        <!-- PQR Row -->
                        <div class="table-row" data-type="peticion" data-status="pendiente">
                            <div class="table-cell pqr-cell">
                                <div class="pqr-icon-small peticion">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <span>Solicitud de información</span>
                            </div>
                            <div class="table-cell"><span class="type-badge peticion">Petición</span></div>
                            <div class="table-cell">Juan Pérez</div>
                            <div class="table-cell">Apple Inc.</div>
                            <div class="table-cell">15/05/2023</div>
                            <div class="table-cell"><span class="status-badge pendiente">Pendiente</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- PQR Row -->
                        <div class="table-row" data-type="queja" data-status="en-proceso">
                            <div class="table-cell pqr-cell">
                                <div class="pqr-icon-small queja">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                                <span>Servicio al cliente deficiente</span>
                            </div>
                            <div class="table-cell"><span class="type-badge queja">Queja</span></div>
                            <div class="table-cell">María González</div>
                            <div class="table-cell">Microsoft</div>
                            <div class="table-cell">10/05/2023</div>
                            <div class="table-cell"><span class="status-badge en-proceso">En proceso</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- PQR Row -->
                        <div class="table-row" data-type="reclamo" data-status="pendiente">
                            <div class="table-cell pqr-cell">
                                <div class="pqr-icon-small reclamo">
                                    <i class="fas fa-gavel"></i>
                                </div>
                                <span>Producto defectuoso</span>
                            </div>
                            <div class="table-cell"><span class="type-badge reclamo">Reclamo</span></div>
                            <div class="table-cell">Carlos Rodríguez</div>
                            <div class="table-cell">Amazon</div>
                            <div class="table-cell">12/05/2023</div>
                            <div class="table-cell"><span class="status-badge pendiente">Pendiente</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- PQR Row -->
                        <div class="table-row" data-type="sugerencia" data-status="resuelto">
                            <div class="table-cell pqr-cell">
                                <div class="pqr-icon-small sugerencia">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <span>Mejora en la aplicación móvil</span>
                            </div>
                            <div class="table-cell"><span class="type-badge sugerencia">Sugerencia</span></div>
                            <div class="table-cell">Ana Martínez</div>
                            <div class="table-cell">Google</div>
                            <div class="table-cell">05/05/2023</div>
                            <div class="table-cell"><span class="status-badge resuelto">Resuelto</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- PQR Row -->
                        <div class="table-row" data-type="peticion" data-status="en-proceso">
                            <div class="table-cell pqr-cell">
                                <div class="pqr-icon-small peticion">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                                <span>Solicitud de documentación</span>
                            </div>
                            <div class="table-cell"><span class="type-badge peticion">Petición</span></div>
                            <div class="table-cell">Roberto Sánchez</div>
                            <div class="table-cell">JPMorgan Chase</div>
                            <div class="table-cell">08/05/2023</div>
                            <div class="table-cell"><span class="status-badge en-proceso">En proceso</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- PQR Row -->
                        <div class="table-row" data-type="queja" data-status="resuelto">
                            <div class="table-cell pqr-cell">
                                <div class="pqr-icon-small queja">
                                    <i class="fas fa-exclamation-circle"></i>
                                </div>
                                <span>Demora en la entrega</span>
                            </div>
                            <div class="table-cell"><span class="type-badge queja">Queja</span></div>
                            <div class="table-cell">Laura Torres</div>
                            <div class="table-cell">Walmart</div>
                            <div class="table-cell">02/05/2023</div>
                            <div class="table-cell"><span class="status-badge resuelto">Resuelto</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-pqr-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-pqr-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="pagination">
                    <button class="pagination-btn" disabled title="Página anterior">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="pagination-btn active">1</button>
                    <button class="pagination-btn">2</button>
                    <button class="pagination-btn">3</button>
                    <span class="pagination-ellipsis">...</span>
                    <button class="pagination-btn">10</button>
                    <button class="pagination-btn" title="Página siguiente">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para añadir/editar PQR -->
    <div class="modal" id="pqr-modal">
        <div class="modal-backdrop"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h2 id="modal-title">Nuevo PQR</h2>
                <button class="modal-close" id="modal-close" title="Cerrar modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="pqr-form" action="XZ" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="csrf_token" id="csrf_token_input"
                        value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pqr-type">Tipo de PQR</label>
                            <select name="TIPO" id="pqr-type" class="form-select" required>
                                <option value="">Seleccionar tipo</option>
                                <option value="peticion">Petición</option>
                                <option value="queja">Queja</option>
                                <option value="reclamo">Reclamo</option>
                                <option value="sugerencia">Sugerencia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pqr-priority">Prioridad</label>
                            <select name="PRIORIDAD" id="pqr-priority" class="form-select" required>
                                <option value="">Seleccionar prioridad</option>
                                <option value="baja">Baja</option>
                                <option value="media">Media</option>
                                <option value="alta">Alta</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pqr-subject">Asunto</label>
                        <input type="text" name="ASUNTO" id="pqr-subject" class="form-input" placeholder="Asunto del PQR" required>
                    </div>
                    <div class="form-group">
                        <label for="pqr-description">Descripción</label>
                        <textarea name="DESCRIPCION" id="pqr-description" class="form-textarea" placeholder="Descripción detallada del PQR" required></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pqr-name">Nombre completo</label>
                            <input type="text" name="NOMBRE" id="pqr-name" class="form-input" placeholder="Nombre del solicitante" required>
                        </div>
                        <div class="form-group">
                            <label for="pqr-email">Correo electrónico</label>
                            <input type="email" name="EMAIL" id="pqr-email" class="form-input" placeholder="correo@ejemplo.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="pqr-phone">Teléfono</label>
                            <input type="tel" name="TELEFONO" id="pqr-phone" class="form-input" placeholder="Número de teléfono">
                        </div>
                        <div class="form-group">
                            <label for="pqr-company">Empresa</label>
                            <select name="EMPRESA" id="pqr-company" class="form-select" required>
                                <option value="">Seleccionar empresa</option>
                                <option value="1">Apple Inc.</option>
                                <option value="2">Microsoft</option>
                                <option value="3">Google</option>
                                <option value="4">Amazon</option>
                                <option value="5">JPMorgan Chase</option>
                                <option value="6">Johnson & Johnson</option>
                                <option value="7">Visa Inc.</option>
                                <option value="8">Walmart</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pqr-attachments">Archivos adjuntos</label>
                        <div class="file-upload">
                            <label for="pqr-attachments-input" class="file-upload-btn">
                                <i class="fas fa-paperclip"></i>
                                <span>Adjuntar archivos</span>
                            </label>
                            <input type="file" name="ADJUNTOS[]" id="pqr-attachments-input" multiple hidden>
                            <div id="file-list" class="file-list"></div>
                        </div>
                    </div>
                    <input type="hidden" name="accionSavePQR" value="Registrar_PQR">
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancel-pqr">Cancelar</button>
                <button class="btn btn-primary" id="save-pqr">Guardar</button>
            </div>
        </div>
    </div>

    <!-- Modal para ver detalles del PQR -->
    <div class="modal" id="pqr-details-modal">
        <div class="modal-backdrop"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h2 id="details-modal-title">Detalles del PQR</h2>
                <button class="modal-close" id="details-modal-close" title="Cerrar detalles">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="pqr-details-header">
                    <div class="pqr-details-icon" id="details-icon">
                        <!-- Icono se cargará dinámicamente -->
                    </div>
                    <div class="pqr-details-info">
                        <h3 id="details-subject">Asunto del PQR</h3>
                        <span class="pqr-type" id="details-type">Tipo</span>
                        <div class="pqr-status" id="details-status">Estado</div>
                    </div>
                </div>
                <div class="pqr-details-section">
                    <h4>Descripción</h4>
                    <p id="details-description">Descripción del PQR...</p>
                </div>
                <div class="pqr-details-section">
                    <h4>Información del Solicitante</h4>
                    <div class="details-grid">
                        <div class="details-item">
                            <span class="details-label">Nombre</span>
                            <span class="details-value" id="details-name">Nombre completo</span>
                        </div>
                        <div class="details-item">
                            <span class="details-label">Correo</span>
                            <span class="details-value" id="details-email">correo@ejemplo.com</span>
                        </div>
                        <div class="details-item">
                            <span class="details-label">Teléfono</span>
                            <span class="details-value" id="details-phone">+1234567890</span>
                        </div>
                        <div class="details-item">
                            <span class="details-label">Empresa</span>
                            <span class="details-value" id="details-company">Nombre de la empresa</span>
                        </div>
                    </div>
                </div>
                <div class="pqr-details-section">
                    <h4>Archivos Adjuntos</h4>
                    <div class="attachments-list" id="details-attachments">
                        <div class="attachment-item">
                            <i class="fas fa-file-pdf"></i>
                            <span>documento.pdf</span>
                            <a href="#" class="attachment-download">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                        <div class="attachment-item">
                            <i class="fas fa-file-image"></i>
                            <span>imagen.jpg</span>
                            <a href="#" class="attachment-download">
                                <i class="fas fa-download"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="pqr-details-section">
                    <h4>Respuestas</h4>
                    <div class="responses-list" id="details-responses">
                        <div class="response-item">
                            <div class="response-header">
                                <div class="response-user">
                                    <div class="user-avatar">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div class="user-info">
                                        <span class="user-name">Administrador</span>
                                        <span class="response-date">12/05/2023 10:30</span>
                                    </div>
                                </div>
                            </div>
                            <div class="response-content">
                                <p>Estamos revisando su solicitud y nos pondremos en contacto con usted a la brevedad.</p>
                            </div>
                        </div>
                    </div>
                    <div class="add-response">
                        <h5>Añadir Respuesta</h5>
                        <form id="response-form">
                            <div class="form-group">
                                <textarea id="response-text" class="form-textarea" placeholder="Escriba su respuesta aquí..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Enviar Respuesta</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="close-details">Cerrar</button>
                <button class="btn btn-primary" id="edit-from-details">Editar</button>
            </div>
        </div>
    </div>

    <script src="Funcion_Menu"></script>
    <script src="Funcion_Sincronizacion"></script>
    <script src="Funcion_PQRS"></script>
</body>

</html>