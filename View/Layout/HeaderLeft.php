<div class="sidebar">
    <div class="sidebar-header">
        <div class="logo">
            <div class="logo-circle">
                <i class="fas fa-cube"></i>
            </div>
            <span class="logo-text">Workspace</span>
        </div>
        <button id="sidebar-toggle" class="sidebar-toggle" title="Toggle Sidebar">
            <i class="fas fa-chevron-left"></i>
        </button>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="Dashboard.html">
                    <i class="fas fa-house"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#content">
                    <i class="fas fa-layer-group"></i>
                    <span>Content</span>
                </a>
            </li>
            <li class="has-submenu">
                <a href="#companies">
                    <i class="fas fa-building"></i>
                    <span>Empresas</span>
                    <i class="fas fa-chevron-right submenu-arrow"></i>
                </a>
                <ul class="submenu">
                    <li><a href="PowerBI.html">Apple Inc.</a></li>
                    <li><a href="#empresa2">Microsoft</a></li>
                    <li><a href="#empresa3">Google</a></li>
                    <li><a href="#empresa4">Amazon</a></li>
                </ul>
            </li>
            <li class="has-submenu">
                <a href="#analytics">
                    <i class="fas fa-chart-simple"></i>
                    <span>Analytics</span>
                    <i class="fas fa-chevron-right submenu-arrow"></i>
                </a>
                <ul class="submenu">
                    <li><a href="#reports">Reportes</a></li>
                    <li><a href="#statistics">Estadísticas</a></li>
                    <li><a href="#performance">Rendimiento</a></li>
                </ul>
            </li>
            <li>
                <a href="#likes">
                    <i class="fas fa-heart"></i>
                    <span>Likes</span>
                </a>
            </li>
            <li>
                <a href="#comments">
                    <i class="fas fa-message"></i>
                    <span>Comments</span>
                </a>
            </li>
            <li>
                <a href="#share">
                    <i class="fas fa-arrow-up-from-bracket"></i>
                    <span>Share</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-footer">
        <a href="settings.html" class="active">
            <i class="fas fa-gear"></i>
            <span>Settings</span>
        </a>
        <a href="#logout">
            <i class="fas fa-arrow-right-from-bracket"></i>
            <span>Logout</span>
        </a>
    </div>
</div>
<!-- Botón flotante para mostrar el sidebar -->
<button id="show-sidebar-btn" class="show-sidebar-btn" title="Show Sidebar">
    <i class="fas fa-bars"></i>
</button>