<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Analytics</title>
    <link rel="stylesheet" href="Estilos_Menu">
    <link rel="stylesheet" href="Estilos_PowerBI">
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
                    <span class="current">Settings</span>
                </div>
            </div>

            <!-- Power BI Content -->
            <div class="dashboard-content">
                <div class="section-header">
                    <h1>Dashboard Analytics</h1>
                    <div class="header-actions">
                        <div class="date-range-selector">
                            <button class="btn btn-outline">
                                <i class="fas fa-calendar"></i>
                                <span>Últimos 30 días</span>
                                <i class="fas fa-chevron-down"></i>
                            </button>
                        </div>
                        <button class="btn btn-primary">
                            <i class="fas fa-download"></i>
                            <span>Exportar</span>
                        </button>
                    </div>
                </div>

                <!-- Power BI Container -->
                <div class="powerbi-container">
                    <div class="powerbi-header">
                        <h2>Análisis de Rendimiento</h2>
                        <div class="powerbi-actions">
                            <button class="btn-icon" title="Refrescar datos">
                                <i class="fas fa-rotate"></i>
                            </button>
                            <button class="btn-icon" title="Expandir">
                                <i class="fas fa-expand"></i>
                            </button>
                            <button class="btn-icon" title="Más opciones">
                                <i class="fas fa-ellipsis-vertical"></i>
                            </button>
                        </div>
                    </div>
                    <div class="powerbi-content">
                        <!-- Aquí se insertará el iframe de Power BI -->
                        <div class="powerbi-placeholder">
                            <div class="placeholder-icon">
                                <i class="fas fa-chart-pie"></i>
                            </div>
                            <p>Cargando dashboard de Power BI...</p>
                            <!-- Descomentar y reemplazar con tu iframe de Power BI -->
                            <!--
                            <iframe 
                                title="Reporte Power BI" 
                                width="100%" 
                                height="100%" 
                                src="TU_URL_DE_POWER_BI_AQUI" 
                                frameborder="0" 
                                allowFullScreen="true">
                            </iframe>
                            -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="Funcion_Menu"></script>
    <script src="Funcion_PowerBI"></script>
    <script src="Funcion_Sincronizacion"></script>
</body>
</html>