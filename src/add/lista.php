<?php
// Attivazione errori per debug
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connessione al database
$server   = "localhost";
$username = "root";
$password = "root";
$database = "my_oscargallery";

$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("Errore di connessione: " . $conn->connect_error);
}

// Messaggio di esito per operazioni CRUD
$message = "";
$focusID = "";

// Gestione modifica ID
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['old_id'])) {
    $old_id = $_POST['old_id'];  // ID originale
    $new_id = $_POST['new_id'];  // Nuovo ID

    // Query di aggiornamento SOLO per ID
    $sqlUpdate = "UPDATE quadri SET id=? WHERE id=?";
    $stmt = $conn->prepare($sqlUpdate);
    
    if ($stmt === false) {
        die("Errore nella preparazione della query: " . $conn->error);
    }

    // Associa parametri alla query
    $stmt->bind_param("ii", $new_id, $old_id);
    
    if ($stmt->execute()) {
        $message = "ID aggiornato correttamente.";
        $focusID = $new_id; // Salviamo il nuovo ID per tornare alla riga
    } else {
        $message = "Errore durante l'aggiornamento: " . $stmt->error;
    }
    $stmt->close();
}

// Recupero dati dalla tabella quadri
$sql = "SELECT * FROM quadri ORDER BY `quadri`.`id` ASC";
$result = $conn->query($sql);
if (!$result) {
    die("Errore nella query: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestione Quadri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body onload="scrollToRow()">
  <div class="container my-4">
    <h1 class="mb-4">Gestione Quadri</h1>

    <?php if (!empty($message)) : ?>
      <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <table class="table table-bordered align-middle text-center">
      <thead class="table-dark">
        <tr>
          <th>Foto</th>
          <th style="width: 100px">ID</th>
          <th>Titolo</th>
          <th>Tecnica</th>
          <th>Anno</th>
          <th>Supporto</th>
          <th>Dimensioni</th>
          <th>Azioni</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
          <?php while ($row = $result->fetch_assoc()): ?>
            <tr id="row-<?= htmlspecialchars($row['id']) ?>">
				<td><a href="<?= htmlspecialchars($row['foto']) ?>" target="blank"><button class="btn btn-sm btn-primary">Apri</button></a></td>
              	<form method="POST" action="/staff/list#row-<?= htmlspecialchars($row['id']) ?>">
                	<td>
    	              	<input type="number" name="new_id" class="form-control" value="<?= htmlspecialchars($row['id']) ?>" required>
	                </td>
        	        <td><?= htmlspecialchars($row['nome']) ?></td>
            	    <td><?= htmlspecialchars($row['tecnica']) ?></td>
                	<td><?= htmlspecialchars($row['anno']) ?></td>
	                <td><?= htmlspecialchars($row['supporto']) ?></td>
    	            <td><?= htmlspecialchars($row['dimensioni']) ?></td>
        	        <td>
            	    	<input type="hidden" name="old_id" value="<?= htmlspecialchars($row['id']) ?>">
	                  	<button type="submit" class="btn btn-sm btn-success">Salva</button>
    	            </td>
        		</form>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" class="text-center">Nessun record trovato</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <script>
    function scrollToRow() {
      let rowID = "<?= $focusID ?>";
      if (rowID) {
        let rowElement = document.getElementById("row-" + rowID);
        if (rowElement) {
          rowElement.scrollIntoView({ behavior: "smooth", block: "center" });
        }
      }
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$conn->close();
?>
