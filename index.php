<?php
include 'src/root/router.php';

// Ottieni il percorso dalla richiesta
$path = strtolower($_SERVER["REQUEST_URI"]);

// Ottieni i dettagli della pagina usando la funzione dalla logica di routing inclusa
$pageDetails = getPageDetails($path);

// Estrai i dettagli della pagina
$page = $pageDetails["page"];
$tit = $pageDetails["tit"];
$nav = $pageDetails["nav"];

?>
<!doctype html>
<html lang="it">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Benvenuto nel mio sito web! Scopri tutti i quadri di Oscar Luppi.">
		<title><?= $tit ?></title>
		<link rel="icon" href="/painting.png">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
	</head>
  	<body class="pt-5 pb-4">
  	<p>&nbsp;

    <div class="pb-4">

		<?php include $nav; ?>

        <?php include $page; ?>

    </div>

	<footer class="footer py-4 bg-info text-center">
		<div class="container">
			<span class="text-muted">Copyright &copy; 2010 Luppi Oscar.<br> Tutte le fotografie e gli altri materiali di questo sito sono protetti da copyright, se volete usarli siete pregati di contattarci per avere il permesso.</span>
		</div>
	</footer>
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>