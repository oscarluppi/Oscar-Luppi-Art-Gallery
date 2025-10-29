<!DOCTYPE html>
<html lang="it">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Benvenuto nel mio sito web! Scopri tutti i quadri di Oscar Luppi.">
	<title>Salvataggio Quadro</title>
	<link rel="icon" href="/painting.png">
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
			--success-color: #4caf50;
			--error-color: #ff5252;
		}

		body {
			background-color: var(--bg-primary);
			color: var(--text-primary);
			min-height: 100vh;
			padding-top: 3rem;
			padding-bottom: 3rem;
		}

		.result-wrapper {
			background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
			border: 1px solid var(--border-color);
			border-radius: 16px;
			padding: 2rem;
			box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
			max-width: 800px;
			margin: 0 auto;
		}

		.page-title {
			color: var(--accent-cyan);
			font-weight: 700;
			text-shadow: 0 0 15px rgba(38, 198, 218, 0.4);
			margin-bottom: 2rem;
		}

		.alert-custom {
			border-radius: 12px;
			border: 2px solid;
			padding: 1rem 1.5rem;
			margin-bottom: 1.5rem;
			display: flex;
			align-items: center;
			font-weight: 600;
		}

		.alert-success-custom {
			background-color: rgba(76, 175, 80, 0.15);
			border-color: var(--success-color);
			color: var(--success-color);
		}

		.alert-error-custom {
			background-color: rgba(255, 82, 82, 0.15);
			border-color: var(--error-color);
			color: var(--error-color);
		}

		.alert-icon {
			font-size: 1.5rem;
			margin-right: 1rem;
		}

		.data-list {
			background-color: var(--bg-tertiary);
			border-radius: 12px;
			overflow: hidden;
			border: 1px solid var(--border-color);
			margin-bottom: 1.5rem;
		}

		.data-item {
			background-color: var(--bg-tertiary);
			border-color: var(--border-color);
			color: var(--text-primary);
			padding: 1rem 1.25rem;
			transition: all 0.3s ease;
		}

		.data-item:hover {
			background-color: var(--bg-secondary);
			padding-left: 1.5rem;
		}

		.data-label {
			color: var(--text-secondary);
			margin-right: 0.5rem;
		}

		.data-value {
			color: var(--text-primary);
			font-weight: 600;
		}

		.image-preview {
			border-radius: 12px;
			border: 2px solid var(--border-color);
			box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
			max-width: 100%;
			height: auto;
			transition: all 0.3s ease;
		}

		.image-preview:hover {
			border-color: var(--accent-cyan);
			box-shadow: 0 12px 24px rgba(38, 198, 218, 0.3);
		}

		.image-wrapper {
			text-align: center;
			margin: 1.5rem 0;
		}

		.btn-action {
			background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
			border: none;
			color: white;
			font-weight: 600;
			padding: 0.75rem 1.5rem;
			border-radius: 10px;
			transition: all 0.3s ease;
			text-decoration: none;
			display: inline-block;
		}

		.btn-action:hover {
			background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
			transform: translateY(-2px);
			box-shadow: 0 6px 16px rgba(38, 198, 218, 0.4);
			color: white;
		}

		.divider {
			height: 2px;
			background: linear-gradient(90deg, transparent, var(--accent-cyan), transparent);
			margin: 2rem 0;
		}
	</style>
</head>

<body>

	<?php
	// Array per raccogliere messaggi di errore
	$errors = [];
	$uploadSuccess = false;
	$dbSuccess = false;

	// Validazione input
	if (empty($_POST['titolo'])) {
		$errors[] = "Il titolo è obbligatorio";
	}
	if (empty($_POST['tecnica'])) {
		$errors[] = "La tecnica è obbligatoria";
	}
	if (empty($_POST['anno']) || !is_numeric($_POST['anno'])) {
		$errors[] = "L'anno deve essere un numero valido";
	}
	if (empty($_POST['supporto'])) {
		$errors[] = "Il supporto è obbligatorio";
	}
	if (empty($_POST['dimensioni'])) {
		$errors[] = "Le dimensioni sono obbligatorie";
	}

	// Sanitizzazione dati
	$nome = htmlspecialchars($_POST['titolo'] ?? '', ENT_QUOTES, 'UTF-8');
	$tecnica = htmlspecialchars($_POST['tecnica'] ?? '', ENT_QUOTES, 'UTF-8');
	$anno = intval($_POST['anno'] ?? 0);
	$supporto = htmlspecialchars($_POST['supporto'] ?? '', ENT_QUOTES, 'UTF-8');
	$dimensioni = htmlspecialchars($_POST['dimensioni'] ?? '', ENT_QUOTES, 'UTF-8');
	?>

	<div class="container">
		<div class="result-wrapper">
			<h1 class="page-title text-center">
				<i class="bi bi-cloud-upload-fill me-2"></i>Risultato Caricamento
			</h1>

			<?php if (!empty($errors)): ?>
				<div class="alert-custom alert-error-custom">
					<i class="bi bi-exclamation-triangle-fill alert-icon"></i>
					<div>
						<strong>Errori rilevati:</strong>
						<ul class="mb-0 mt-2">
							<?php foreach ($errors as $error): ?>
								<li><?= $error ?></li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
			<?php endif; ?>

			<?php if (empty($errors)): ?>
				<h3 class="text-center mb-3" style="color: var(--text-secondary);">
					<i class="bi bi-list-check me-2"></i>Dati Inseriti
				</h3>
				<ul class="list-group data-list">
					<li class="list-group-item data-item">
						<i class="bi bi-brush-fill me-2" style="color: var(--accent-cyan);"></i>
						<span class="data-label">Titolo:</span>
						<span class="data-value"><?= $nome ?></span>
					</li>
					<li class="list-group-item data-item">
						<i class="bi bi-palette-fill me-2" style="color: var(--accent-cyan);"></i>
						<span class="data-label">Tecnica:</span>
						<span class="data-value"><?= $tecnica ?></span>
					</li>
					<li class="list-group-item data-item">
						<i class="bi bi-calendar-event me-2" style="color: var(--accent-cyan);"></i>
						<span class="data-label">Anno:</span>
						<span class="data-value"><?= $anno ?></span>
					</li>
					<li class="list-group-item data-item">
						<i class="bi bi-easel me-2" style="color: var(--accent-cyan);"></i>
						<span class="data-label">Supporto:</span>
						<span class="data-value"><?= $supporto ?></span>
					</li>
					<li class="list-group-item data-item">
						<i class="bi bi-arrows-angle-expand me-2" style="color: var(--accent-cyan);"></i>
						<span class="data-label">Dimensioni:</span>
						<span class="data-value"><?= $dimensioni ?></span>
					</li>
				</ul>

				<div class="divider"></div>

				<?php
				// Upload file
				if (isset($_FILES["foto"]) && $_FILES["foto"]["error"] == 0) {
					$nomeFile = basename($_FILES["foto"]["name"]);
					$cartellaDestinazione = "img/";
					$percorsoFile = $cartellaDestinazione . $nomeFile;

					// Validazione tipo file
					$allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
					$fileType = $_FILES["foto"]["type"];

					if (!in_array($fileType, $allowedTypes)) {
						$errors[] = "Formato file non supportato. Usa JPG, PNG o WEBP";
					} elseif ($_FILES["foto"]["size"] > 5000000) { // 5MB max
						$errors[] = "Il file è troppo grande. Dimensione massima: 5MB";
					} elseif (move_uploaded_file($_FILES["foto"]["tmp_name"], $percorsoFile)) {
						$uploadSuccess = true;
						echo '<div class="alert-custom alert-success-custom">
									<i class="bi bi-check-circle-fill alert-icon"></i>
									<span>File caricato con successo: <strong>' . htmlspecialchars($nomeFile) . '</strong></span>
								  </div>';
						echo '<div class="image-wrapper">
									<img src="' . htmlspecialchars($percorsoFile) . '" class="image-preview" alt="' . htmlspecialchars($nome) . '">
								  </div>';
					} else {
						$errors[] = "Errore nel caricamento del file. Verifica i permessi della cartella";
					}
				} else {
					$errors[] = "Nessun file caricato o errore nell'upload";
				}
				?>

				<?php if ($uploadSuccess): ?>
					<div class="divider"></div>
					<?php
					// Connessione database
					$server = "localhost";
					$username = "root";
					$password = "root";
					$database = "my_oscargallery";

					$conn = new mysqli($server, $username, $password, $database);

					if ($conn->connect_error) {
						$errors[] = "Connessione al database fallita: " . $conn->connect_error;
					} else {
						$percorsoFileDB = "/" . $percorsoFile;

						// Query preparata per prevenire SQL injection
						$stmt = $conn->prepare("INSERT INTO quadri (nome, tecnica, anno, foto, supporto, dimensioni) VALUES (?, ?, ?, ?, ?, ?)");
						$stmt->bind_param("ssisss", $nome, $tecnica, $anno, $percorsoFileDB, $supporto, $dimensioni);

						if ($stmt->execute()) {
							$dbSuccess = true;
							echo '<div class="alert-custom alert-success-custom">
										<i class="bi bi-check-circle-fill alert-icon"></i>
										<span>Quadro inserito correttamente nel database!</span>
									  </div>';
						} else {
							$errors[] = "Errore database: " . $stmt->error;
						}

						$stmt->close();
						$conn->close();
					}
					?>
				<?php endif; ?>

				<?php if (!empty($errors)): ?>
					<div class="alert-custom alert-error-custom">
						<i class="bi bi-exclamation-triangle-fill alert-icon"></i>
						<div>
							<strong>Errori durante il processo:</strong>
							<ul class="mb-0 mt-2">
								<?php foreach ($errors as $error): ?>
									<li><?= $error ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>

			<div class="divider"></div>

			<div class="text-center">
				<a href="/staff/nuovo" class="btn-action">
					<i class="bi bi-plus-circle-fill me-2"></i>Inserisci Nuovo Quadro
				</a>
				<?php if ($dbSuccess): ?>
					<a href="/" class="btn-action ms-2">
						<i class="bi bi-house-fill me-2"></i>Torna alla Home
					</a>
				<?php endif; ?>
			</div>
		</div>
	</div>

</body>

</html>