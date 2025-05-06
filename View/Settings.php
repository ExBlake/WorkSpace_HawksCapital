<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <link rel="stylesheet" href="Estilos_Menu">
    <link rel="stylesheet" href="Estilos_Configuracion">
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
        <div class="overlay" id="overlay"></div>

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
                    <span class="current">Configuración</span>
                </div>
            </div>

            <!-- Settings Content -->
            <div class="dashboard-content">
                <div class="section-header">
                    <h1>Settings</h1>
                </div>

                <!-- Settings Navigation -->
                <div class="settings-container">
                    <div class="settings-sidebar">
                        <ul class="settings-nav">
                            <li class="active" data-tab="profile">
                                <i class="fas fa-user"></i>
                                <span>Profile</span>
                            </li>
                            <li data-tab="appearance">
                                <i class="fas fa-palette"></i>
                                <span>Appearance</span>
                            </li>
                            <li data-tab="notifications">
                                <i class="fas fa-bell"></i>
                                <span>Notifications</span>
                            </li>
                            <li data-tab="security">
                                <i class="fas fa-shield"></i>
                                <span>Security</span>
                            </li>
                            <li data-tab="dashboard">
                                <i class="fas fa-gauge"></i>
                                <span>Dashboard</span>
                            </li>
                            <li data-tab="companies">
                                <i class="fas fa-building"></i>
                                <span>Companies</span>
                            </li>
                        </ul>
                    </div>

                    <div class="settings-content">
                        <!-- Profile Settings -->
                        <div class="settings-tab active" id="profile-tab">
                            <div class="settings-header">
                                <h2>Profile Settings</h2>
                                <p>Manage your account information and preferences</p>
                            </div>

                            <div class="profile-section">
                                <div class="profile-avatar">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User Profile">
                                    <div class="avatar-overlay">
                                        <i class="fas fa-camera"></i>
                                    </div>
                                </div>
                                <div class="profile-info">
                                    <h3>John Appleseed</h3>
                                    <p>Administrator</p>
                                </div>
                            </div>

                            <div class="settings-form">
                                <div class="form-group">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" id="fullname" value="John Appleseed" class="settings-input">
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" value="john.appleseed@example.com" class="settings-input">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="tel" id="phone" value="+1 (555) 123-4567" class="settings-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="bio">Bio</label>
                                    <textarea id="bio" class="settings-input" rows="4">Product manager with 5+ years of experience in SaaS companies. Passionate about creating intuitive user experiences.</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" id="location" value="San Francisco, CA" class="settings-input">
                                </div>
                                <div class="form-group">
                                    <label for="timezone">Timezone</label>
                                    <select id="timezone" class="settings-input">
                                        <option value="pst">Pacific Standard Time (PST)</option>
                                        <option value="est">Eastern Standard Time (EST)</option>
                                        <option value="cet">Central European Time (CET)</option>
                                        <option value="jst">Japan Standard Time (JST)</option>
                                    </select>
                                </div>
                                <div class="form-actions">
                                    <button class="btn btn-secondary">Cancel</button>
                                    <button class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>

                        <!-- Appearance Settings -->
                        <div class="settings-tab" id="appearance-tab">
                            <div class="settings-header">
                                <h2>Appearance Settings</h2>
                                <p>Customize the look and feel of your dashboard</p>
                            </div>

                            <div class="settings-section">
                                <h3>Theme</h3>
                                <div class="theme-options">
                                    <div class="theme-option">
                                        <div class="theme-preview light-theme"></div>
                                        <div class="theme-info">
                                            <span>Light</span>
                                        </div>
                                    </div>
                                    <div class="theme-option">
                                        <div class="theme-preview dark-theme"></div>
                                        <div class="theme-info">
                                            <span>Dark</span>
                                        </div>
                                    </div>
                                    <div class="theme-option">
                                        <div class="theme-preview system-theme"></div>
                                        <div class="theme-info">
                                            <span>System</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="settings-section">
                                <h3>Accent Color</h3>
                                <div class="color-options">
                                    <div class="color-option active" style="--color: #007AFF;">
                                        <div class="color-circle"></div>
                                        <span>Blue</span>
                                    </div>
                                    <div class="color-option" style="--color: #FF2D55;">
                                        <div class="color-circle"></div>
                                        <span>Red</span>
                                    </div>
                                    <div class="color-option" style="--color: #5856D6;">
                                        <div class="color-circle"></div>
                                        <span>Purple</span>
                                    </div>
                                    <div class="color-option" style="--color: #FF9500;">
                                        <div class="color-circle"></div>
                                        <span>Orange</span>
                                    </div>
                                    <div class="color-option" style="--color: #34C759;">
                                        <div class="color-circle"></div>
                                        <span>Green</span>
                                    </div>
                                    <div class="color-option" style="--color: #00C7BE;">
                                        <div class="color-circle"></div>
                                        <span>Teal</span>
                                    </div>
                                    <div class="color-option" style="--color: #AF52DE;">
                                        <div class="color-circle"></div>
                                        <span>Violet</span>
                                    </div>
                                    <div class="color-option" style="--color: #FF6B22;">
                                        <div class="color-circle"></div>
                                        <span>Coral</span>
                                    </div>
                                    <div class="color-option" style="--color: #32ADE6;">
                                        <div class="color-circle"></div>
                                        <span>Sky</span>
                                    </div>
                                    <div class="color-option" style="--color: #8E8E93;">
                                        <div class="color-circle"></div>
                                        <span>Gray</span>
                                    </div>
                                </div>
                            </div>

                            <!-- NUEVO: Tipografía -->
                            <div class="settings-section typography-section">
                                <h3>Tipografía</h3>
                                <p class="section-description">Personaliza la fuente y el estilo de texto</p>
                                
                                <div class="form-group">
                                    <label for="font-family-select">Familia de fuente</label>
                                    <select id="font-family-select" class="settings-input">
                                        <option value='"SF Pro Display", -apple-system, BlinkMacSystemFont, sans-serif'>SF Pro (Default)</option>
                                        <option value='"Poppins", sans-serif'>Poppins</option>
                                        <option value='"Georgia", serif'>Georgia</option>
                                        <option value='"Roboto Mono", monospace'>Roboto Mono</option>
                                        <option value='"Arial", sans-serif'>Arial</option>
                                        <option value='"Helvetica Neue", Helvetica, sans-serif'>Helvetica</option>
                                        <option value='"Century Gothic", "CenturyGothic", "AppleGothic", sans-serif'>Century Gothic</option>
                                        <option value='"Montserrat", sans-serif'>Montserrat</option>
                                        <option value='"Playfair Display", serif'>Playfair Display</option>
                                        <option value='"Roboto", sans-serif'>Roboto</option>
                                        <option value='"Lato", sans-serif'>Lato</option>
                                        <option value='"Merriweather", serif'>Merriweather</option>
                                        <option value='"Source Sans Pro", sans-serif'>Source Sans Pro</option>
                                        <option value='"Nunito", sans-serif'>Nunito</option>
                                        <option value='"Raleway", sans-serif'>Raleway</option>
                                        <option value='"Oswald", sans-serif'>Oswald</option>
                                        <option value='"Open Sans", sans-serif'>Open Sans</option>
                                        <option value='"Times New Roman", Times, serif'>Times New Roman</option>
                                        <option value='"Verdana", Geneva, sans-serif'>Verdana</option>
                                        <option value='"Courier New", Courier, monospace'>Courier New</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="font-weight-select">Peso de fuente</label>
                                    <select id="font-weight-select" class="settings-input">
                                        <option value="300">Light</option>
                                        <option value="400" selected>Regular</option>
                                        <option value="500">Medium</option>
                                        <option value="600">Bold</option>
                                    </select>
                                </div>
                                
                                <div class="font-preview">
                                    <h4>Vista previa de tipografía</h4>
                                    <p class="font-preview-text">Este es un ejemplo de texto con la tipografía seleccionada. La buena tipografía mejora la legibilidad y la experiencia del usuario.</p>
                                    
                                    <div class="font-weights">
                                        <div class="font-weight-sample light">Light</div>
                                        <div class="font-weight-sample regular">Regular</div>
                                        <div class="font-weight-sample medium">Medium</div>
                                        <div class="font-weight-sample bold">Bold</div>
                                    </div>
                                </div>
                            </div>

                            <!-- NUEVO: Color personalizado mejorado -->
                            <div class="settings-section">
                                <h3>Color Personalizado</h3>
                                <p class="section-description">Selecciona cualquier color que desees para personalizar tu experiencia</p>
                                <div class="custom-color-picker">
                                    <div class="color-preview" id="color-preview"></div>
                                    <div class="color-inputs">
                                        <div class="form-group">
                                            <label for="custom-color">Selecciona un color:</label>
                                            <input type="color" id="custom-color" class="color-input" value="#007AFF">
                                        </div>
                                        <div class="form-group">
                                            <label for="color-hex">Código Hex:</label>
                                            <div class="hex-input-container">
                                                <input type="text" id="color-hex" class="settings-input" value="#007AFF">
                                                <button class="btn btn-small" id="copy-hex" title="Copy Hex Code">
                                                    <i class="fas fa-copy"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary" id="apply-custom-color">Aplicar Color Personalizado</button>
                            </div>

                            <!-- NUEVO: Animaciones -->
                            <div class="settings-section">
                                <h3>Animaciones</h3>
                                <div class="notification-option">
                                    <div class="notification-info">
                                        <h4>Activar Animaciones</h4>
                                        <p>Habilita transiciones y animaciones en la interfaz</p>
                                    </div>
                                    <label class="switch">
                                        <label for="animations-toggle" class="sr-only">Enable Animations</label>
                                        <input type="checkbox" id="animations-toggle" checked title="Enable Animations">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="animation-speed" id="animation-speed-container">
                                    <label for="animation-speed">Velocidad de Animación:</label>
                                    <div class="toggle-options">
                                        <div class="toggle-option" data-speed="slow">
                                            <span>Lenta</span>
                                        </div>
                                        <div class="toggle-option active" data-speed="normal">
                                            <span>Normal</span>
                                        </div>
                                        <div class="toggle-option" data-speed="fast">
                                            <span>Rápida</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- NUEVO: Modo de contraste -->
                            <div class="settings-section">
                                <h3>Modo de Contraste (BETA)</h3>
                                <div class="notification-option">
                                    <div class="notification-info">
                                        <h4>Alto Contraste</h4>
                                        <p>Mejora la legibilidad con mayor contraste entre elementos</p>
                                    </div>
                                    <label class="switch">
                                        <label for="high-contrast-toggle" class="sr-only">Enable High Contrast Mode</label>
                                        <input type="checkbox" id="high-contrast-toggle" title="Enable High Contrast Mode">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <!-- NUEVO: Presets de apariencia mejorados -->
                            <div class="settings-section">
                                <h3>Presets de Apariencia</h3>
                                <p class="section-description">Selecciona un preset para aplicar un conjunto de configuraciones predefinidas</p>
                                <div class="presets-container">
                                    <div class="preset-option" data-preset="default">
                                        <div class="preset-preview default-preset"></div>
                                        <span>Por defecto</span>
                                    </div>
                                    <div class="preset-option" data-preset="modern">
                                        <div class="preset-preview modern-preset"></div>
                                        <span>Moderno</span>
                                    </div>
                                    <div class="preset-option" data-preset="classic">
                                        <div class="preset-preview classic-preset"></div>
                                        <span>Clásico</span>
                                    </div>
                                    <div class="preset-option" data-preset="minimal">
                                        <div class="preset-preview minimal-preset"></div>
                                        <span>Minimalista</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button class="btn btn-secondary">Reset to Default</button>
                                <button class="btn btn-primary">Apply Changes</button>
                            </div>
                        </div>

                        <!-- Notifications Settings -->
                        <div class="settings-tab" id="notifications-tab">
                            <div class="settings-header">
                                <h2>Notification Settings</h2>
                                <p>Manage how and when you receive notifications</p>
                            </div>

                            <div class="settings-section">
                                <h3>Email Notifications</h3>
                                <div class="notification-option">
                                    <div class="notification-info">
                                        <h4>Daily Summary</h4>
                                        <p>Receive a daily email with a summary of your dashboard activity</p>
                                    </div>
                                    <label class="switch">
                                        <label for="daily-summary-checkbox" class="sr-only">Enable Daily Summary</label>
                                        <input type="checkbox" id="daily-summary-checkbox" checked title="Enable Daily Summary">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="notification-option">
                                    <div class="notification-info">
                                        <h4>New Comments</h4>
                                        <p>Get notified when someone comments on your content</p>
                                    </div>
                                    <label class="switch">
                                        <label for="likes-checkbox" class="sr-only">Enable Likes Notifications</label>
                                        <input type="checkbox" id="likes-checkbox" checked title="Enable Likes Notifications">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="notification-option">
                                    <div class="notification-info">
                                        <h4>Likes and Shares</h4>
                                        <p>Get notified when someone likes or shares your content</p>
                                    </div>
                                    <label class="switch">
                                        <label>
                                            <input type="checkbox" title="Enable Likes and Shares Notifications">
                                        </label>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="notification-option">
                                    <div class="notification-info">
                                        <h4>Marketing Updates</h4>
                                        <p>Receive updates about new features and promotions</p>
                                    </div>
                                    <label class="switch">
                                        <label>
                                            <input type="checkbox" title="Enable Marketing Updates">
                                        </label>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="settings-section">
                                <h3>Push Notifications</h3>
                                <div class="notification-option">
                                    <div class="notification-info">
                                        <h4>Real-time Alerts</h4>
                                        <p>Receive real-time notifications in your browser</p>
                                    </div>
                                    <label class="switch">
                                        <label>
                                            <input type="checkbox" checked title="Enable Real-time Alerts">
                                        </label>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="notification-option">
                                    <div class="notification-info">
                                        <h4>Sound Alerts</h4>
                                        <p>Play a sound when you receive a notification</p>
                                    </div>
                                    <label class="switch">
                                        <label>
                                            <input type="checkbox" title="Enable Sound Alerts">
                                        </label>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button class="btn btn-secondary">Reset to Default</button>
                                <button class="btn btn-primary">Save Preferences</button>
                            </div>
                        </div>

                        <!-- Security Settings -->
                        <div class="settings-tab" id="security-tab">
                            <div class="settings-header">
                                <h2>Security Settings</h2>
                                <p>Manage your account security and privacy</p>
                            </div>

                            <div class="settings-section">
                                <h3>Password</h3>
                                <div class="form-group">
                                    <label for="current-password">Current Password</label>
                                    <input type="password" id="current-password" placeholder="Enter current password" class="settings-input">
                                </div>
                                <div class="form-group">
                                    <label for="new-password">New Password</label>
                                    <input type="password" id="new-password" placeholder="Enter new password" class="settings-input">
                                </div>
                                <div class="form-group">
                                    <label for="confirm-password">Confirm New Password</label>
                                    <input type="password" id="confirm-password" placeholder="Confirm new password" class="settings-input">
                                </div>
                                <button class="btn btn-primary">Update Password</button>
                            </div>

                            <div class="settings-section">
                                <h3>Two-Factor Authentication</h3>
                                <div class="notification-option">
                                    <div class="notification-info">
                                        <h4>Enable Two-Factor Authentication</h4>
                                        <p>Add an extra layer of security to your account</p>
                                    </div>
                                    <label class="switch">
                                        <label>
                                            <input type="checkbox" title="Enable this option">
                                        </label>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="settings-section">
                                <h3>Login Sessions</h3>
                                <div class="session-list">
                                    <div class="session-item">
                                        <div class="session-info">
                                            <i class="fas fa-laptop"></i>
                                            <div>
                                                <h4>MacBook Pro - Chrome</h4>
                                                <p>San Francisco, CA - Current Session</p>
                                            </div>
                                        </div>
                                        <span class="session-active">Active Now</span>
                                    </div>
                                    <div class="session-item">
                                        <div class="session-info">
                                            <i class="fas fa-mobile-alt"></i>
                                            <div>
                                                <h4>iPhone 14 Pro - Safari</h4>
                                                <p>San Francisco, CA - Last active 2 hours ago</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-small">Logout</button>
                                    </div>
                                    <div class="session-item">
                                        <div class="session-info">
                                            <i class="fas fa-tablet-alt"></i>
                                            <div>
                                                <h4>iPad Air - Safari</h4>
                                                <p>New York, NY - Last active 2 days ago</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-small">Logout</button>
                                    </div>
                                </div>
                                <button class="btn btn-danger">Logout of All Devices</button>
                            </div>
                        </div>

                        <!-- Dashboard Settings -->
                        <div class="settings-tab" id="dashboard-tab">
                            <div class="settings-header">
                                <h2>Dashboard Settings</h2>
                                <p>Customize your dashboard layout and widgets</p>
                            </div>

                            <div class="settings-section">
                                <h3>Layout</h3>
                                <div class="layout-options">
                                    <div class="layout-option active">
                                        <div class="layout-preview grid-layout"></div>
                                        <span>Grid</span>
                                    </div>
                                    <div class="layout-option">
                                        <div class="layout-preview list-layout"></div>
                                        <span>List</span>
                                    </div>
                                    <div class="layout-option">
                                        <div class="layout-preview compact-layout"></div>
                                        <span>Compact</span>
                                    </div>
                                </div>
                            </div>

                            <div class="settings-section">
                                <h3>Widgets</h3>
                                <p class="section-description">Select which widgets to display on your dashboard</p>
                                <div class="widget-options">
                                    <div class="widget-option">
                                        <div class="widget-info">
                                            <h4>Statistics Cards</h4>
                                            <p>Show summary statistics at the top of your dashboard</p>
                                        </div>
                                        <label class="switch">
                                            <label>
                                                <input type="checkbox" checked title="Enable Company Statistics">
                                            </label>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="widget-option">
                                        <div class="widget-info">
                                            <h4>Recent Activity</h4>
                                            <p>Show recent user activity and interactions</p>
                                        </div>
                                        <label class="switch">
                                            <label>
                                                <input type="checkbox" checked title="Enable Company Statistics">
                                            </label>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="widget-option">
                                        <div class="widget-info">
                                            <h4>Performance Graph</h4>
                                            <p>Show performance metrics over time</p>
                                        </div>
                                        <label class="switch">
                                            <label>
                                                <input type="checkbox" checked title="Enable this option">
                                            </label>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="widget-option">
                                        <div class="widget-info">
                                            <h4>Calendar</h4>
                                            <p>Show upcoming events and deadlines</p>
                                        </div>
                                        <label class="switch">
                                            <label>
                                                <input type="checkbox" title="Enable this option">
                                                <span class="sr-only">Enable this option</span>
                                            </label>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="widget-option">
                                        <div class="widget-info">
                                            <h4>Quick Actions</h4>
                                            <p>Show shortcuts to common actions</p>
                                        </div>
                                        <label class="switch">
                                            <label>
                                                <input type="checkbox" checked title="Enable this option">
                                                <span class="sr-only">Enable this option</span>
                                            </label>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="settings-section">
                                <h3>Default View</h3>
                                <div class="form-group">
                                    <label for="default-view">When you open the dashboard, show:</label>
                                    <select id="default-view" class="settings-input">
                                        <option value="overview">Overview</option>
                                        <option value="analytics">Analytics</option>
                                        <option value="content">Content</option>
                                        <option value="companies">Companies</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button class="btn btn-secondary">Reset to Default</button>
                                <button class="btn btn-primary">Save Layout</button>
                            </div>
                        </div>

                        <!-- Companies Settings -->
                        <div class="settings-tab" id="companies-tab">
                            <div class="settings-header">
                                <h2>Companies Settings</h2>
                                <p>Manage company information and preferences</p>
                            </div>

                            <div class="settings-section">
                                <div class="section-header-with-action">
                                    <h3>Companies</h3>
                                    <button class="btn btn-small btn-primary">
                                        <i class="fas fa-plus"></i> Add Company
                                    </button>
                                </div>
                                
                                <div class="companies-list">
                                    <div class="company-item">
                                        <div class="company-info">
                                            <div class="company-logo apple">
                                                <i class="fab fa-apple"></i>
                                            </div>
                                            <div>
                                                <h4>Apple Inc.</h4>
                                                <p>Technology</p>
                                            </div>
                                        </div>
                                        <div class="company-actions">
                                            <button class="btn btn-icon" title="Edit Company">
                                                <i class="fas fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-icon" title="Delete Company">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="company-item">
                                        <div class="company-info">
                                            <div class="company-logo microsoft">
                                                <i class="fab fa-microsoft"></i>
                                            </div>
                                            <div>
                                                <h4>Microsoft</h4>
                                                <p>Technology</p>
                                            </div>
                                        </div>
                                        <div class="company-actions">
                                            <button class="btn btn-icon" title="Edit Company">
                                                <i class="fas fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-icon" title="Delete Company">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="company-item">
                                        <div class="company-info">
                                            <div class="company-logo google">
                                                <i class="fab fa-google"></i>
                                            </div>
                                            <div>
                                                <h4>Google</h4>
                                                <p>Technology</p>
                                            </div>
                                        </div>
                                        <div class="company-actions">
                                            <button class="btn btn-icon" title="Edit Company">
                                                <i class="fas fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-icon" title="Delete Company">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="company-item">
                                        <div class="company-info">
                                            <div class="company-logo amazon">
                                                <i class="fab fa-amazon"></i>
                                            </div>
                                            <div>
                                                <h4>Amazon</h4>
                                                <p>E-commerce</p>
                                            </div>
                                        </div>
                                        <div class="company-actions">
                                            <button class="btn btn-icon" title="Edit or Delete">
                                                <i class="fas fa-pen-to-square"></i>
                                            </button>
                                            <button class="btn btn-icon" title="Delete Company">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="settings-section">
                                <h3>Display Options</h3>
                                <div class="form-group">
                                    <label for="company-sort">Sort Companies By:</label>
                                    <select id="company-sort" class="settings-input">
                                        <option value="name">Name (A-Z)</option>
                                        <option value="name-desc">Name (Z-A)</option>
                                        <option value="type">Type</option>
                                        <option value="recent">Recently Added</option>
                                    </select>
                                </div>
                                <div class="notification-option">
                                    <div class="notification-info">
                                        <h4>Show Company Statistics</h4>
                                        <p>Display detailed statistics for each company</p>
                                    </div>
                                    <label class="switch">
                                        <label for="company-statistics-checkbox" class="sr-only">Show Company Statistics</label>
                                        <input type="checkbox" id="company-statistics-checkbox" checked title="Show Company Statistics">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <div class="notification-option">
                                    <div class="notification-info">
                                        <h4>Company Categories</h4>
                                        <p>Group companies by category</p>
                                    </div>
                                    <label class="switch">
                                        <label for="company-categories-checkbox" class="sr-only">Enable Company Categories</label>
                                        <input type="checkbox" id="company-categories-checkbox" checked title="Enable Company Categories">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button class="btn btn-secondary">Reset to Default</button>
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="Funcion_Menu"></script>
    <script src="Funcion_Configuracion"></script>
</body>
</html>
