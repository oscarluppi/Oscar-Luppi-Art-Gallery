<html lang="it">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Benvenuto nel mio sito web! Scopri tutti i quadri di Oscar Luppi.">
	<title>Quadro salvato</title>
	<link rel="icon" href="/painting.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
</head>
<body>	
	
<?php

	$nome = $_POST['titolo'];
	$tecnica = $_POST['tecnica'];
	$anno = $_POST['anno'];
	$supporto = $_POST['supporto'];
	$dimensioni = $_POST['dimensioni'];

?>

	<div class="container p-3 text-center">
		<ul class="list-group text-center w-auto">
			<li class="list-group-item">Titolo: <b><?= $_POST['titolo']; ?></b></li>
			<li class="list-group-item">Tecnica: <b><?= $_POST['tecnica']; ?></b></li>
			<li class="list-group-item">Anno: <b><?= $_POST['anno']; ?></b></li>
			<li class="list-group-item">Supporto: <b><?= $_POST['supporto']; ?></b></li>
			<li class="list-group-item">Dimensioni: <b><?= $_POST['dimensioni']; ?></b></li>
		</ul>
		<?php
			$nomeFile = basename($_FILES["foto"]["name"]);
			$cartellaDestinazione = "img/";
			$percorsoFile = $cartellaDestinazione . $nomeFile;

			if (move_uploaded_file($_FILES["foto"]["tmp_name"], $percorsoFile)) {
				echo "<p>File caricato con successo: " . htmlspecialchars($nomeFile) . "</p>";
			} else {
				echo "<p>Errore nel caricamento del file.</p>";
			}
			?>
		<img src="<?= $percorsoFile ?>" class="img-thumbnail" alt="foto non valida">
	</div>

	<?php
            
		//credenziali collegamento
		$server = "localhost";
		$username = "root";
		$password = "root";
		$database = "my_oscargallery";
				
		//connessione al database
	    $conn = new mysqli($server, $username, $password, $database);
			
	    //controllo connessione
	    if ($conn->connect_error) {
			die ("connessione fallita: ". $conn->connect_error);
	    }
        
        $percorsoFile = "/" . $percorsoFile;
		
	    $sql = "INSERT INTO quadri (nome, tecnica, anno, foto, supporto, dimensioni) VALUE ('$nome','$tecnica',$anno,'$percorsoFile','$supporto','$dimensioni')";
		
	    if ($conn->query($sql) === true) {
			echo "<center>Quadro inserito correttamente nel sito</center>"; 
	    } else {
			echo "<center> errore" . $conn->error . "</center>";
	    }
	
	?>

	<div class="container p-3">
		<a href="/staff/nuovo"><button class="btn btn-success w-100">torna a inserimento dati</button></a>
	</div>

</body>
<html>