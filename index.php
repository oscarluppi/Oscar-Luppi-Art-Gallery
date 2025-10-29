<?php
include_once 'src/root/router.php';

// Normalizza e ottieni il percorso richiesto
$path = parse_url(strtolower($_SERVER["REQUEST_URI"]), PHP_URL_PATH);

// Recupera i dettagli della pagina dal router
$pageDetails = getPageDetails($path);

// Estrai i dettagli
$page = $pageDetails["page"] ?? "404.php";
$tit  = htmlspecialchars($pageDetails["tit"] ?? "Errore 404", ENT_QUOTES, 'UTF-8');
$nav  = $pageDetails["nav"] ?? "src/nav/empty.php";

// Evita path traversal o inclusioni non sicure
$page = file_exists($page) ? $page : "404.php";
$nav  = file_exists($nav)  ? $nav  : "src/nav/empty.php";
?>
<!doctype html>
<html lang="it">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Benvenuto nel mio sito web! Scopri tutti i quadri di Oscar Luppi.">
	<title><?= $tit ?></title>
	<link rel="icon" href="/public/painting.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
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

		body {
			background-color: var(--bg-primary);
			color: var(--text-primary);
		}

		.container {
			background-color: var(--bg-secondary);
			border-radius: 8px;
			box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
		}

		main {
			background-color: var(--bg-tertiary);
			border-radius: 6px;
			padding: 1.5rem;
			min-height: 400px;
		}

		.footer {
			background-color: var(--bg-secondary) !important;
			border-top: 2px solid var(--accent-cyan) !important;
			color: var(--text-secondary);
		}

		.text-muted {
			color: var(--text-secondary) !important;
		}

		/* Stili per link */
		a {
			color: var(--accent-cyan);
			text-decoration: none;
			transition: color 0.3s ease;
		}

		a:hover {
			color: var(--accent-blue);
		}

		/* Stili per navbar (se presente) */
		.navbar,
		.nav {
			background-color: var(--bg-tertiary) !important;
		}

		.nav-link {
			color: var(--text-secondary) !important;
		}

		.nav-link:hover {
			color: var(--accent-cyan) !important;
		}

		/* Stili per card e componenti Bootstrap */
		.card {
			background-color: var(--bg-tertiary);
			border-color: var(--border-color);
			color: var(--text-primary);
		}

		.btn-primary {
			background-color: var(--accent-blue);
			border-color: var(--accent-blue);
		}

		.btn-primary:hover {
			background-color: var(--accent-cyan);
			border-color: var(--accent-cyan);
		}
	</style>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</head>

<body class="pt-5 pb-4">
	<div class="container pb-4">

		<!-- Navbar -->
		<?php include $nav; ?>

		<!-- Pagina principale -->
		<main class="mt-4">
			<?php include $page; ?>
		</main>

	</div>

	<footer class="footer py-4 text-center mt-4">
		<div class="container">
			<small class="text-muted d-block mb-2">
				&copy; 2010–<?= date("Y") ?> Luppi Oscar
			</small>
			<small class="text-muted">
				Tutte le fotografie e i materiali di questo sito sono protetti da copyright.<br>
				Contattaci per ottenere il permesso di utilizzo.
			</small>
		</div>
	</footer>

</body>

</html>