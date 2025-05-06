<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresas</title>
    <link rel="stylesheet" href="Estilos_Menu">
    <link rel="stylesheet" href="Estilos_Empresas">
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
                    <span class="current">Empresas</span>
                </div>
            </div>

            <!-- Companies Content -->
            <div class="dashboard-content">
                <div class="section-header">
                    <h1>Empresas</h1>
                    <div class="header-actions">
                        <button id="add-company-btn" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            <span>Nueva Empresa</span>
                        </button>
                    </div>
                </div>

                <!-- Companies Filters and Actions -->
                <div class="companies-actions">
                    <div class="search-filter">
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" placeholder="Buscar empresas..." id="company-search">
                            <button class="clear-search" id="clear-search" title="Clear search">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="view-actions">
                        <div class="filter-chips">
                            <div class="filter-chip" data-filter="all">
                                <span>Todas</span>
                            </div>
                            <div class="filter-chip" data-filter="tech">
                                <span>Tecnología</span>
                            </div>
                            <div class="filter-chip" data-filter="finance">
                                <span>Finanzas</span>
                            </div>
                            <div class="filter-chip" data-filter="retail">
                                <span>Retail</span>
                            </div>
                            <div class="filter-chip" data-filter="health">
                                <span>Salud</span>
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

                <!-- Companies Grid View (Default) -->
                <div class="companies-grid" id="companies-grid">
                    <!-- Company Card -->
                    <div class="company-card" data-industry="tech" data-status="active">
                        <div class="company-card-header">
                            <div class="company-logo tech">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple Inc.">
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
                            <h3>Apple Inc.</h3>
                            <span class="company-industry tech">Tecnología</span>
                            <p class="company-description">Empresa líder en tecnología, fabricante de iPhone, Mac y servicios digitales.</p>
                        </div>
                        <div class="company-meta">
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Cupertino, California</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-users"></i>
                                <span>147,000 empleados</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Fundada en 1976</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-globe"></i>
                                <span>apple.com</span>
                            </div>
                        </div>
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-value">$2.4T</span>
                                <span class="stat-label">Valor mercado</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">42</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">A+</span>
                                <span class="stat-label">Rating</span>
                            </div>
                        </div>
                        <div class="company-status active">
                            <span>Activa</span>
                        </div>
                    </div>

                    <!-- Company Card -->
                    <div class="company-card" data-industry="tech" data-status="active">
                        <div class="company-card-header">
                            <div class="company-logo tech">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft">
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
                            <h3>Microsoft</h3>
                            <span class="company-industry tech">Tecnología</span>
                            <p class="company-description">Empresa global de software y hardware, creadora de Windows y Office.</p>
                        </div>
                        <div class="company-meta">
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Redmond, Washington</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-users"></i>
                                <span>181,000 empleados</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Fundada en 1975</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-globe"></i>
                                <span>microsoft.com</span>
                            </div>
                        </div>
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-value">$2.1T</span>
                                <span class="stat-label">Valor mercado</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">38</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">A</span>
                                <span class="stat-label">Rating</span>
                            </div>
                        </div>
                        <div class="company-status active">
                            <span>Activa</span>
                        </div>
                    </div>

                    <!-- Company Card -->
                    <div class="company-card" data-industry="tech" data-status="active">
                        <div class="company-card-header">
                            <div class="company-logo tech">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google">
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
                            <h3>Google</h3>
                            <span class="company-industry tech">Tecnología</span>
                            <p class="company-description">Líder en búsqueda web, publicidad online y servicios en la nube.</p>
                        </div>
                        <div class="company-meta">
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Mountain View, California</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-users"></i>
                                <span>156,000 empleados</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Fundada en 1998</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-globe"></i>
                                <span>google.com</span>
                            </div>
                        </div>
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-value">$1.7T</span>
                                <span class="stat-label">Valor mercado</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">45</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">A+</span>
                                <span class="stat-label">Rating</span>
                            </div>
                        </div>
                        <div class="company-status active">
                            <span>Activa</span>
                        </div>
                    </div>

                    <!-- Company Card -->
                    <div class="company-card" data-industry="retail" data-status="active">
                        <div class="company-card-header">
                            <div class="company-logo retail">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon">
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
                            <h3>Amazon</h3>
                            <span class="company-industry retail">Retail</span>
                            <p class="company-description">Líder mundial en comercio electrónico y servicios en la nube (AWS).</p>
                        </div>
                        <div class="company-meta">
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Seattle, Washington</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-users"></i>
                                <span>1,541,000 empleados</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Fundada en 1994</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-globe"></i>
                                <span>amazon.com</span>
                            </div>
                        </div>
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-value">$1.3T</span>
                                <span class="stat-label">Valor mercado</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">52</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">A</span>
                                <span class="stat-label">Rating</span>
                            </div>
                        </div>
                        <div class="company-status active">
                            <span>Activa</span>
                        </div>
                    </div>

                    <!-- Company Card -->
                    <div class="company-card" data-industry="finance" data-status="active">
                        <div class="company-card-header">
                            <div class="company-logo finance">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/f/ff/JPMorgan_Chase_Logo_2008_1.svg" alt="JPMorgan Chase">
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
                            <h3>JPMorgan Chase</h3>
                            <span class="company-industry finance">Finanzas</span>
                            <p class="company-description">Banco multinacional y empresa de servicios financieros.</p>
                        </div>
                        <div class="company-meta">
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Nueva York, NY</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-users"></i>
                                <span>255,000 empleados</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Fundada en 2000</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-globe"></i>
                                <span>jpmorganchase.com</span>
                            </div>
                        </div>
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-value">$432B</span>
                                <span class="stat-label">Valor mercado</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">28</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">A-</span>
                                <span class="stat-label">Rating</span>
                            </div>
                        </div>
                        <div class="company-status active">
                            <span>Activa</span>
                        </div>
                    </div>

                    <!-- Company Card -->
                    <div class="company-card" data-industry="health" data-status="active">
                        <div class="company-card-header">
                            <div class="company-logo health">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/e/e1/Johnson_and_Johnson_Logo.svg" alt="Johnson & Johnson">
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
                            <h3>Johnson & Johnson</h3>
                            <span class="company-industry health">Salud</span>
                            <p class="company-description">Empresa multinacional de dispositivos médicos, farmacéuticos y productos de consumo.</p>
                        </div>
                        <div class="company-meta">
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>New Brunswick, NJ</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-users"></i>
                                <span>134,500 empleados</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Fundada en 1886</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-globe"></i>
                                <span>jnj.com</span>
                            </div>
                        </div>
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-value">$380B</span>
                                <span class="stat-label">Valor mercado</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">32</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">A</span>
                                <span class="stat-label">Rating</span>
                            </div>
                        </div>
                        <div class="company-status active">
                            <span>Activa</span>
                        </div>
                    </div>

                    <!-- Company Card -->
                    <div class="company-card" data-industry="finance" data-status="inactive">
                        <div class="company-card-header">
                            <div class="company-logo finance">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Visa_2021.svg" alt="Visa Inc.">
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
                            <h3>Visa Inc.</h3>
                            <span class="company-industry finance">Finanzas</span>
                            <p class="company-description">Corporación multinacional de servicios financieros y pagos electrónicos.</p>
                        </div>
                        <div class="company-meta">
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>San Francisco, CA</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-users"></i>
                                <span>21,500 empleados</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Fundada en 1958</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-globe"></i>
                                <span>visa.com</span>
                            </div>
                        </div>
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-value">$420B</span>
                                <span class="stat-label">Valor mercado</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">15</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">B+</span>
                                <span class="stat-label">Rating</span>
                            </div>
                        </div>
                        <div class="company-status inactive">
                            <span>Inactiva</span>
                        </div>
                    </div>

                    <!-- Company Card -->
                    <div class="company-card" data-industry="retail" data-status="active">
                        <div class="company-card-header">
                            <div class="company-logo retail">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/Walmart_logo.svg" alt="Walmart">
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
                            <h3>Walmart</h3>
                            <span class="company-industry retail">Retail</span>
                            <p class="company-description">Corporación multinacional de tiendas de venta al por menor.</p>
                        </div>
                        <div class="company-meta">
                            <div class="meta-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Bentonville, AR</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-users"></i>
                                <span>2,300,000 empleados</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-calendar"></i>
                                <span>Fundada en 1962</span>
                            </div>
                            <div class="meta-item">
                                <i class="fas fa-globe"></i>
                                <span>walmart.com</span>
                            </div>
                        </div>
                        <div class="company-stats">
                            <div class="stat-item">
                                <span class="stat-value">$395B</span>
                                <span class="stat-label">Valor mercado</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">24</span>
                                <span class="stat-label">Proyectos</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-value">B</span>
                                <span class="stat-label">Rating</span>
                            </div>
                        </div>
                        <div class="company-status active">
                            <span>Activa</span>
                        </div>
                    </div>
                </div>

                <!-- Companies List View (Hidden by default) -->
                <div class="companies-list" id="companies-list">
                    <div class="companies-table">
                        <div class="table-header">
                            <div class="table-cell">Empresa</div>
                            <div class="table-cell">Industria</div>
                            <div class="table-cell">Ubicación</div>
                            <div class="table-cell">Empleados</div>
                            <div class="table-cell">Fundación</div>
                            <div class="table-cell">Estado</div>
                            <div class="table-cell">Acciones</div>
                        </div>
                        
                        <!-- Company Row -->
                        <div class="table-row" data-industry="tech" data-status="active">
                            <div class="table-cell company-cell">
                                <div class="company-logo-small tech">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple Inc.">
                                </div>
                                <span>Apple Inc.</span>
                            </div>
                            <div class="table-cell"><span class="industry-badge tech">Tecnología</span></div>
                            <div class="table-cell">Cupertino, CA</div>
                            <div class="table-cell">147,000</div>
                            <div class="table-cell">1976</div>
                            <div class="table-cell"><span class="status-badge active">Activa</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-company-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-company-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Company Row -->
                        <div class="table-row" data-industry="tech" data-status="active">
                            <div class="table-cell company-cell">
                                <div class="company-logo-small tech">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft">
                                </div>
                                <span>Microsoft</span>
                            </div>
                            <div class="table-cell"><span class="industry-badge tech">Tecnología</span></div>
                            <div class="table-cell">Redmond, WA</div>
                            <div class="table-cell">181,000</div>
                            <div class="table-cell">1975</div>
                            <div class="table-cell"><span class="status-badge active">Activa</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-company-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-company-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Company Row -->
                        <div class="table-row" data-industry="tech" data-status="active">
                            <div class="table-cell company-cell">
                                <div class="company-logo-small tech">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google">
                                </div>
                                <span>Google</span>
                            </div>
                            <div class="table-cell"><span class="industry-badge tech">Tecnología</span></div>
                            <div class="table-cell">Mountain View, CA</div>
                            <div class="table-cell">156,000</div>
                            <div class="table-cell">1998</div>
                            <div class="table-cell"><span class="status-badge active">Activa</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-company-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-company-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Company Row -->
                        <div class="table-row" data-industry="retail" data-status="active">
                            <div class="table-cell company-cell">
                                <div class="company-logo-small retail">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon">
                                </div>
                                <span>Amazon</span>
                            </div>
                            <div class="table-cell"><span class="industry-badge retail">Retail</span></div>
                            <div class="table-cell">Seattle, WA</div>
                            <div class="table-cell">1,541,000</div>
                            <div class="table-cell">1994</div>
                            <div class="table-cell"><span class="status-badge active">Activa</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-company-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-company-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Company Row -->
                        <div class="table-row" data-industry="finance" data-status="active">
                            <div class="table-cell company-cell">
                                <div class="company-logo-small finance">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/f/ff/JPMorgan_Chase_Logo_2008_1.svg" alt="JPMorgan Chase">
                                </div>
                                <span>JPMorgan Chase</span>
                            </div>
                            <div class="table-cell"><span class="industry-badge finance">Finanzas</span></div>
                            <div class="table-cell">Nueva York, NY</div>
                            <div class="table-cell">255,000</div>
                            <div class="table-cell">2000</div>
                            <div class="table-cell"><span class="status-badge active">Activa</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-company-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-company-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Company Row -->
                        <div class="table-row" data-industry="health" data-status="active">
                            <div class="table-cell company-cell">
                                <div class="company-logo-small health">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/e/e1/Johnson_and_Johnson_Logo.svg" alt="Johnson & Johnson">
                                </div>
                                <span>Johnson & Johnson</span>
                            </div>
                            <div class="table-cell"><span class="industry-badge health">Salud</span></div>
                            <div class="table-cell">New Brunswick, NJ</div>
                            <div class="table-cell">134,500</div>
                            <div class="table-cell">1886</div>
                            <div class="table-cell"><span class="status-badge active">Activa</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-company-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-company-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Company Row -->
                        <div class="table-row" data-industry="finance" data-status="inactive">
                            <div class="table-cell company-cell">
                                <div class="company-logo-small finance">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/cc/Visa_2021.svg" alt="Visa Inc.">
                                </div>
                                <span>Visa Inc.</span>
                            </div>
                            <div class="table-cell"><span class="industry-badge finance">Finanzas</span></div>
                            <div class="table-cell">San Francisco, CA</div>
                            <div class="table-cell">21,500</div>
                            <div class="table-cell">1958</div>
                            <div class="table-cell"><span class="status-badge inactive">Inactiva</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-company-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-company-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Company Row -->
                        <div class="table-row" data-industry="retail" data-status="active">
                            <div class="table-cell company-cell">
                                <div class="company-logo-small retail">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/Walmart_logo.svg" alt="Walmart">
                                </div>
                                <span>Walmart</span>
                            </div>
                            <div class="table-cell"><span class="industry-badge retail">Retail</span></div>
                            <div class="table-cell">Bentonville, AR</div>
                            <div class="table-cell">2,300,000</div>
                            <div class="table-cell">1962</div>
                            <div class="table-cell"><span class="status-badge active">Activa</span></div>
                            <div class="table-cell actions-cell">
                                <button class="btn-icon edit-company-btn" title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                                <button class="btn-icon view-company-btn" title="Ver detalles">
                                    <i class="fas fa-eye"></i>
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

    <!-- Modal para añadir/editar empresa -->
    <div class="modal" id="company-modal">
        <div class="modal-backdrop"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h2 id="modal-title">Nueva Empresa</h2>
                <button class="modal-close" id="modal-close" title="Cerrar modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="company-form">
                    <div class="form-group">
                        <label for="company-name">Nombre de la empresa</label>
                        <input type="text" id="company-name" class="form-input" placeholder="Nombre de la empresa" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="company-industry">Industria</label>
                            <select id="company-industry" class="form-select" required>
                                <option value="">Seleccionar industria</option>
                                <option value="tech">Tecnología</option>
                                <option value="finance">Finanzas</option>
                                <option value="retail">Retail</option>
                                <option value="health">Salud</option>
                                <option value="other">Otra</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="company-status">Estado</label>
                            <select id="company-status" class="form-select" required>
                                <option value="">Seleccionar estado</option>
                                <option value="active">Activa</option>
                                <option value="inactive">Inactiva</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="company-description">Descripción</label>
                        <textarea id="company-description" class="form-textarea" placeholder="Descripción breve de la empresa" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="company-logo">Logo</label>
                        <div class="avatar-upload">
                            <div class="avatar-preview">
                                <div id="logo-preview-image"></div>
                            </div>
                            <label for="company-logo-input" class="avatar-upload-btn">
                                <i class="fas fa-camera"></i>
                                <span>Subir logo</span>
                            </label>
                            <input type="file" id="company-logo-input" accept="image/*" hidden>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="company-location">Ubicación</label>
                            <input type="text" id="company-location" class="form-input" placeholder="Ciudad, País" required>
                        </div>
                        <div class="form-group">
                            <label for="company-website">Sitio web</label>
                            <input type="url" id="company-website" class="form-input" placeholder="www.ejemplo.com">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="company-employees">Número de empleados</label>
                            <input type="number" id="company-employees" class="form-input" placeholder="Ej: 1000">
                        </div>
                        <div class="form-group">
                            <label for="company-founded">Año de fundación</label>
                            <input type="number" id="company-founded" class="form-input" placeholder="Ej: 2010">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="company-market-value">Valor de mercado</label>
                            <input type="text" id="company-market-value" class="form-input" placeholder="Ej: $1.2B">
                        </div>
                        <div class="form-group">
                            <label for="company-rating">Rating</label>
                            <select id="company-rating" class="form-select">
                                <option value="">Seleccionar rating</option>
                                <option value="A+">A+</option>
                                <option value="A">A</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B">B</option>
                                <option value="B-">B-</option>
                                <option value="C+">C+</option>
                                <option value="C">C</option>
                                <option value="C-">C-</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" id="cancel-company">Cancelar</button>
                <button class="btn btn-primary" id="save-company">Guardar</button>
            </div>
        </div>
    </div>

    <!-- Modal para ver detalles de la empresa -->
    <div class="modal" id="company-details-modal">
        <div class="modal-backdrop"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h2 id="details-modal-title">Detalles de la Empresa</h2>
                <button class="modal-close" id="details-modal-close" title="Cerrar detalles">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="company-details-header">
                    <div class="company-details-logo" id="details-logo">
                        <!-- Logo se cargará dinámicamente -->
                    </div>
                    <div class="company-details-info">
                        <h3 id="details-name">Nombre de la Empresa</h3>
                        <span class="company-industry" id="details-industry">Industria</span>
                        <div class="company-status" id="details-status">Estado</div>
                    </div>
                </div>
                <div class="company-details-section">
                    <h4>Descripción</h4>
                    <p id="details-description">Descripción de la empresa...</p>
                </div>
                <div class="company-details-section">
                    <h4>Información General</h4>
                    <div class="details-grid">
                        <div class="details-item">
                            <span class="details-label">Ubicación</span>
                            <span class="details-value" id="details-location">Ciudad, País</span>
                        </div>
                        <div class="details-item">
                            <span class="details-label">Sitio Web</span>
                            <span class="details-value" id="details-website">website.com</span>
                        </div>
                        <div class="details-item">
                            <span class="details-label">Empleados</span>
                            <span class="details-value" id="details-employees">1000</span>
                        </div>
                        <div class="details-item">
                            <span class="details-label">Fundación</span>
                            <span class="details-value" id="details-founded">2010</span>
                        </div>
                    </div>
                </div>
                <div class="company-details-section">
                    <h4>Estadísticas</h4>
                    <div class="details-stats">
                        <div class="details-stat-item">
                            <span class="details-stat-value" id="details-market-value">$1.2B</span>
                            <span class="details-stat-label">Valor de mercado</span>
                        </div>
                        <div class="details-stat-item">
                            <span class="details-stat-value" id="details-projects">42</span>
                            <span class="details-stat-label">Proyectos</span>
                        </div>
                        <div class="details-stat-item">
                            <span class="details-stat-value" id="details-rating">A+</span>
                            <span class="details-stat-label">Rating</span>
                        </div>
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
    <script src="Funcion_Empresa"></script>
    <script src="Funcion_Sincronizacion"></script>
</body>
</html>
