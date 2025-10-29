<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow-lg">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold brand-gradient" href="#">
            <i class="bi bi-palette-fill me-2"></i>OscarLuppi
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">
                        <i class="bi bi-house-fill me-1"></i>Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/link">
                        <i class="bi bi-envelope-fill me-1"></i>Contatti
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/staff/list">
                        <i class="bi bi-arrow-clockwise me-1"></i>Ricarica
                    </a>
                </li>
            </ul>
            <!-- <form class="d-flex" role="search">
                <input class="form-control form-control-dark me-2" type="search" placeholder="Cerca quadri..." aria-label="Search">
                <button class="btn btn-search" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form> -->
        </div>
    </div>
</nav>

<style>
    :root {
        --bg-primary: #0a1929;
        --bg-secondary: #132f4c;
        --bg-tertiary: #1e3a5f;
        --text-primary: #e3f2fd;
        --text-secondary: #90caf9;
        --accent-blue: #42a5f5;
        --accent-cyan: #26c6da;
        --border-color: #1e4976;
    }

    .navbar {
        background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
        border-bottom: 2px solid var(--accent-cyan);
        backdrop-filter: blur(10px);
    }

    .navbar-brand {
        color: var(--text-primary) !important;
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }

    .brand-gradient {
        background: linear-gradient(90deg, var(--accent-cyan), var(--accent-blue));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .navbar-brand:hover {
        transform: scale(1.05);
        filter: drop-shadow(0 0 8px rgba(38, 198, 218, 0.6));
    }

    .nav-link {
        color: var(--text-secondary) !important;
        transition: all 0.3s ease;
        position: relative;
        padding: 0.5rem 1rem !important;
    }

    .nav-link:hover {
        color: var(--accent-cyan) !important;
    }

    .nav-link.active {
        color: var(--accent-cyan) !important;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: var(--accent-cyan);
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover::after,
    .nav-link.active::after {
        width: 80%;
    }

    .dropdown-menu.dropdown-dark {
        background-color: var(--bg-tertiary);
        border: 1px solid var(--border-color);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
    }

    .dropdown-item {
        color: var(--text-secondary);
        transition: all 0.3s ease;
    }

    .dropdown-item:hover {
        background-color: var(--bg-secondary);
        color: var(--accent-cyan);
        padding-left: 1.5rem;
    }

    .dropdown-item.disabled {
        color: rgba(144, 202, 249, 0.4);
    }

    .dropdown-divider {
        border-color: var(--border-color);
    }

    .navbar-toggler {
        border-color: var(--accent-cyan);
    }

    .navbar-toggler-icon {
        filter: invert(1) sepia(1) saturate(5) hue-rotate(175deg);
    }

    /* Stili per la ricerca (commentata ma pronta all'uso) */
    .form-control-dark {
        background-color: var(--bg-primary);
        border: 1px solid var(--border-color);
        color: var(--text-primary);
    }

    .form-control-dark:focus {
        background-color: var(--bg-primary);
        border-color: var(--accent-cyan);
        color: var(--text-primary);
        box-shadow: 0 0 0 0.25rem rgba(38, 198, 218, 0.25);
    }

    .form-control-dark::placeholder {
        color: var(--text-secondary);
        opacity: 0.6;
    }

    .btn-search {
        background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
        border: none;
        color: white;
        transition: all 0.3s ease;
    }

    .btn-search:hover {
        background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(38, 198, 218, 0.4);
    }
</style>