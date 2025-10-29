<nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">OscarLuppi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorie
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/categorie/all">Tutti i quadri</a></li>
						<li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="/categorie/06-09">Anno 2006 -2009</a></li>
                        <li><a class="dropdown-item" href="/categorie/10-19">Anno 2010 - 2019</a></li>
                        <li><a class="dropdown-item" href="/categorie/20-25">Anno 2020 - 2025</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item disabled" href="/categorie/all">Altre categorie</a></li>
                    </ul>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="/link">Contatti</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>