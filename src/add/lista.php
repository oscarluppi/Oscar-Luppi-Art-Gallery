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
$messageType = "";
$focusID = "";

// Gestione modifica ID
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['old_id'])) {
  $old_id = $_POST['old_id'];
  $new_id = $_POST['new_id'];

  // Validazione
  if (!is_numeric($new_id) || $new_id <= 0) {
    $message = "ID non valido. Inserisci un numero positivo.";
    $messageType = "error";
  } else {
    // Query di aggiornamento SOLO per ID
    $sqlUpdate = "UPDATE quadri SET id=? WHERE id=?";
    $stmt = $conn->prepare($sqlUpdate);

    if ($stmt === false) {
      $message = "Errore nella preparazione della query: " . $conn->error;
      $messageType = "error";
    } else {
      $stmt->bind_param("ii", $new_id, $old_id);

      if ($stmt->execute()) {
        $message = "ID aggiornato correttamente da <strong>$old_id</strong> a <strong>$new_id</strong>.";
        $messageType = "success";
        $focusID = $new_id;
      } else {
        $message = "Errore durante l'aggiornamento: " . $stmt->error;
        $messageType = "error";
      }
      $stmt->close();
    }
  }
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
  <title>Gestione Quadri - Oscar Luppi Gallery</title>
  <link rel="icon" href="/painting.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
      padding: 2rem 0;
    }

    .page-header {
      background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
      border-radius: 16px;
      padding: 2rem;
      margin-bottom: 2rem;
      border: 1px solid var(--border-color);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .page-title {
      color: var(--accent-cyan);
      font-weight: 700;
      text-shadow: 0 0 15px rgba(38, 198, 218, 0.4);
      margin: 0;
    }

    .alert-custom {
      border-radius: 12px;
      border: 2px solid;
      padding: 1rem 1.5rem;
      margin-bottom: 1.5rem;
      display: flex;
      align-items: center;
      font-weight: 600;
      animation: slideDown 0.3s ease-out;
    }

    @keyframes slideDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
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

    .table-wrapper {
      background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
      border-radius: 16px;
      padding: 1.5rem;
      border: 1px solid var(--border-color);
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
      overflow-x: auto;
    }

    .table-custom {
      margin: 0;
      width: 100%;
    }

    .table-custom thead th {
      background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
      color: white;
      font-weight: 700;
      padding: 1rem;
      text-transform: uppercase;
      font-size: 0.875rem;
      letter-spacing: 0.5px;
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .table-custom tbody tr {
      background-color: var(--bg-tertiary);
      transition: all 0.3s ease;
    }

    .table-custom tbody tr:hover {
      background-color: var(--bg-secondary);
      box-shadow: 0 4px 12px rgba(38, 198, 218, 0.2);
    }

    .table-custom tbody tr.highlight {
      animation: highlightRow 2s ease-in-out;
    }

    @keyframes highlightRow {

      0%,
      100% {
        background-color: var(--bg-tertiary);
      }

      50% {
        background-color: rgba(38, 198, 218, 0.2);
      }
    }

    .table-custom tbody td {
      padding: 0.875rem;
      border-top: 1px solid var(--border-color);
      color: var(--text-primary);
      vertical-align: middle;
    }

    .form-control-custom {
      background-color: var(--bg-primary);
      border: 1px solid var(--border-color);
      color: var(--text-primary);
      border-radius: 6px;
      padding: 0.5rem;
      width: 100%;
      transition: border-color 0.2s ease;
    }

    .form-control-custom:focus {
      border-color: var(--accent-cyan);
      box-shadow: 0 0 0 3px rgba(38, 198, 218, 0.15);
      outline: none;
    }

    .btn-view,
    .btn-save {
      border: none;
      color: white;
      font-weight: 600;
      padding: 0.375rem 0.75rem;
      border-radius: 6px;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
      cursor: pointer;
    }

    .btn-view {
      background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
      text-decoration: none;
      display: inline-block;
    }

    .btn-view:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(38, 198, 218, 0.3);
      color: white;
    }

    .btn-save {
      background: linear-gradient(135deg, var(--success-color), #66bb6a);
    }

    .btn-save:hover {
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(76, 175, 80, 0.3);
    }

    .btn-back {
      background: transparent;
      border: 2px solid var(--accent-cyan);
      color: var(--accent-cyan);
      font-weight: 600;
      padding: 0.75rem 1.5rem;
      border-radius: 8px;
      transition: all 0.2s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-back:hover {
      background-color: var(--accent-cyan);
      color: var(--bg-primary);
      transform: translateY(-2px);
    }

    .empty-state {
      text-align: center;
      padding: 3rem;
      color: var(--text-secondary);
    }

    .empty-state i {
      font-size: 4rem;
      color: var(--accent-cyan);
      margin-bottom: 1rem;
      opacity: 0.5;
    }

    @media (max-width: 768px) {
      .page-header {
        padding: 1.5rem;
      }

      .table-wrapper {
        padding: 1rem;
      }

      .table-custom {
        font-size: 0.875rem;
      }

      .table-custom thead th,
      .table-custom tbody td {
        padding: 0.625rem 0.5rem;
      }

      .btn-back {
        padding: 0.625rem 1rem;
        font-size: 0.875rem;
        margin-top: 0.5rem;
      }
    }

    /* Performance: will-change per animazioni frequenti */
    .table-custom tbody tr,
    .btn-view,
    .btn-save,
    .btn-back {
      will-change: transform;
    }
  </style>
</head>

<body onload="scrollToRow()">
  <div class="container">
    <div class="page-header">
      <h1 class="page-title">
        <i class="bi bi-gear-fill me-2"></i>Gestione Quadri
      </h1>
      <p class="text-secondary mb-0 mt-2">
        <i class="bi bi-info-circle me-2"></i>Modifica gli ID dei quadri nella galleria
      </p>
    </div>

    <?php if (!empty($message)): ?>
      <div class="alert-custom <?= $messageType === 'success' ? 'alert-success-custom' : 'alert-error-custom' ?>">
        <i class="bi <?= $messageType === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill' ?> alert-icon"></i>
        <span><?= $message ?></span>
      </div>
    <?php endif; ?>

    <div class="table-wrapper">
      <table class="table table-custom">
        <thead>
          <tr>
            <th><i class="bi bi-image me-2"></i>Foto</th>
            <th style="width: 100px"><i class="bi bi-hash me-1"></i>ID</th>
            <th><i class="bi bi-brush-fill me-2"></i>Titolo</th>
            <th><i class="bi bi-palette-fill me-2"></i>Tecnica</th>
            <th><i class="bi bi-calendar-event me-2"></i>Anno</th>
            <th><i class="bi bi-easel me-2"></i>Supporto</th>
            <th><i class="bi bi-arrows-angle-expand me-2"></i>Dimensioni</th>
            <th><i class="bi bi-tools me-2"></i>Azioni</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
              <tr id="row-<?= htmlspecialchars($row['id']) ?>" class="<?= $focusID == $row['id'] ? 'highlight' : '' ?>">
                <td style="background-color: #153150;">
                  <a href="<?= htmlspecialchars($row['foto']) ?>" target="_blank" class="btn-view btn-sm">
                    <i class="bi bi-eye-fill me-1"></i>Apri
                  </a>
                </td>
                <form method="POST" action="/staff/list#row-<?= htmlspecialchars($row['id']) ?>">
                  <td style="background-color: #153150;">
                    <input type="number"
                      name="new_id"
                      class="form-control form-control-custom"
                      value="<?= htmlspecialchars($row['id']) ?>"
                      min="1"
                      required>
                  </td>
                  <td style="background-color: #153150;"><?= htmlspecialchars($row['nome']) ?></td>
                  <td style="background-color: #153150;"><?= htmlspecialchars($row['tecnica']) ?></td>
                  <td style="background-color: #153150;"><?= htmlspecialchars($row['anno']) ?></td>
                  <td style="background-color: #153150;"><?= htmlspecialchars($row['supporto']) ?></td>
                  <td style="background-color: #153150;"><?= htmlspecialchars($row['dimensioni']) ?></td>
                  <td style="background-color: #153150;">
                    <input type="hidden" name="old_id" value="<?= htmlspecialchars($row['id']) ?>">
                    <button type="submit" class="btn-save btn-sm">
                      <i class="bi bi-check-lg me-1"></i>Salva
                    </button>
                  </td>
                </form>
              </tr>
            <?php endwhile; ?>
          <?php else: ?>
            <tr>
              <td colspan="8">
                <div class="empty-state">
                  <i class="bi bi-inbox"></i>
                  <p class="mb-0">Nessun quadro trovato nel database</p>
                </div>
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div class="text-center mt-4">
      <a href="/staff/nuovo" class="btn-back">
        <i class="bi bi-plus-circle-fill me-2"></i>Aggiungi Nuovo Quadro
      </a>
      <a href="/" class="btn-back ms-2">
        <i class="bi bi-house-fill me-2"></i>Torna alla Home
      </a>
    </div>
  </div>

  <script>
    function scrollToRow() {
      let rowID = "<?= $focusID ?>";
      if (rowID) {
        let rowElement = document.getElementById("row-" + rowID);
        if (rowElement) {
          rowElement.scrollIntoView({
            behavior: "smooth",
            block: "center"
          });
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