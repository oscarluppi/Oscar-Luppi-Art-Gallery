<?php
// Configurazione connessione
$server   = "localhost";
$username = "root";
$password = "root";
$database = "my_oscargallery";

// Connessione al database con controllo errori
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("<div class='alert alert-danger text-center mt-5'>Connessione fallita: {$conn->connect_error}</div>");
}

// Verifica presenza parametro POST
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo "<div class='alert alert-warning text-center mt-5'>Nessun ID valido fornito.</div>";
    $conn->close();
    exit;
}

$id = intval($_POST['id']);

// Query sicura con prepared statement
$stmt = $conn->prepare("SELECT id, foto, nome, tecnica, anno, supporto, dimensioni FROM quadri WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

// Controllo risultati
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
?>
    <div class="container py-5">
        <div class="row g-4 align-items-start">

            <!-- Immagine -->
            <div class="col-md-6">
                <div class="painting-image-wrapper">
                    <img src="<?= htmlspecialchars($row['foto']) ?>"
                        alt="<?= htmlspecialchars($row['nome']) ?>"
                        class="img-fluid rounded-3 painting-image">
                </div>
            </div>

            <!-- Dettagli -->
            <div class="col-md-6">
                <h2 class="mb-4 detail-title">
                    <i class="bi bi-info-circle-fill me-2"></i>Descrizione del Quadro
                </h2>
                <ul class="list-group detail-list shadow-lg">
                    <li class="list-group-item detail-item">
                        <i class="bi bi-brush-fill me-2 item-icon"></i>
                        <span class="item-label">Titolo:</span>
                        <strong class="item-value"><?= htmlspecialchars($row['nome']) ?></strong>
                    </li>
                    <li class="list-group-item detail-item">
                        <i class="bi bi-palette-fill me-2 item-icon"></i>
                        <span class="item-label">Tecnica:</span>
                        <span class="item-value"><?= htmlspecialchars($row['tecnica']) ?></span>
                    </li>
                    <li class="list-group-item detail-item">
                        <i class="bi bi-calendar-event me-2 item-icon"></i>
                        <span class="item-label">Anno:</span>
                        <span class="item-value"><?= htmlspecialchars($row['anno']) ?></span>
                    </li>
                    <li class="list-group-item detail-item">
                        <i class="bi bi-easel me-2 item-icon"></i>
                        <span class="item-label">Supporto:</span>
                        <span class="item-value"><?= htmlspecialchars($row['supporto']) ?></span>
                    </li>
                    <li class="list-group-item detail-item">
                        <i class="bi bi-arrows-angle-expand me-2 item-icon"></i>
                        <span class="item-label">Dimensioni:</span>
                        <span class="item-value"><?= htmlspecialchars($row['dimensioni']) ?></span>
                    </li>
                    <li class="list-group-item detail-item">
                        <i class="bi bi-hash me-2 item-icon"></i>
                        <span class="item-label">Codice:</span>
                        <span class="item-value"><?= htmlspecialchars($row['id']) ?></span>
                    </li>
                </ul>
                <a href="javascript:history.back()" class="btn btn-back mt-4 shadow">
                    <i class="bi bi-arrow-left-circle-fill me-2"></i> Torna indietro
                </a>
            </div>

        </div>
    </div>
<?php
} else {
    echo "<div class='alert alert-info text-center mt-5 custom-alert'>
            <i class='bi bi-exclamation-circle me-2'></i>Nessun quadro trovato per l'ID specificato.
          </div>";
}

// Cleanup
$stmt->close();
$conn->close();
?>

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

    .detail-title {
        color: var(--accent-cyan);
        font-weight: 700;
        text-shadow: 0 0 10px rgba(38, 198, 218, 0.3);
    }

    .painting-image-wrapper {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
        border: 2px solid var(--border-color);
        transition: all 0.3s ease;
    }

    .painting-image-wrapper:hover {
        box-shadow: 0 12px 32px rgba(38, 198, 218, 0.3);
        border-color: var(--accent-cyan);
    }

    .painting-image {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s ease;
    }

    .painting-image:hover {
        transform: scale(1.02);
    }

    .detail-list {
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid var(--border-color);
    }

    .detail-item {
        background-color: var(--bg-tertiary);
        border-color: var(--border-color);
        color: var(--text-primary);
        padding: 1rem 1.25rem;
        transition: all 0.3s ease;
    }

    .detail-item:hover {
        background-color: var(--bg-secondary);
        padding-left: 1.5rem;
    }

    .item-icon {
        color: var(--accent-cyan);
        font-size: 1.1rem;
    }

    .item-label {
        color: var(--text-secondary);
        margin-right: 0.5rem;
    }

    .item-value {
        color: var(--text-primary);
    }

    .btn-back {
        background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
        border: none;
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        transition: all 0.3s ease;
        border-radius: 8px;
    }

    .btn-back:hover {
        background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(38, 198, 218, 0.4);
        color: white;
    }

    .btn-back:active {
        transform: translateY(0);
    }

    .custom-alert {
        background-color: var(--bg-tertiary);
        border: 1px solid var(--accent-cyan);
        color: var(--text-primary);
        border-radius: 8px;
    }
</style>