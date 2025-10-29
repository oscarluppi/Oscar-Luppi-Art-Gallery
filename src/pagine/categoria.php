<?php
// Configurazione database
$server = "localhost";
$username = "root";
$password = "root";
$database = "my_oscargallery";

// Connessione
$conn = new mysqli($server, $username, $password, $database);
if ($conn->connect_error) {
    die("<div class='alert alert-danger text-center mt-5'>Connessione fallita: {$conn->connect_error}</div>");
}

// Ottieni parametro categoria dall'URI
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$pathParts = explode('/', trim($path, '/'));
$categoria = end($pathParts); // Ultima parte dell'URI

// Configurazione titolo e query basata sulla categoria
$titolo = "Tutti i Quadri";
$sql = "SELECT * FROM quadri ORDER BY anno ASC";

switch ($categoria) {
    case '06-09':
        $titolo = "Quadri degli Anni 2002–2009";
        $sql = "SELECT * FROM quadri WHERE anno BETWEEN 2002 AND 2009 ORDER BY anno ASC";
        break;
    case '10-19':
        $titolo = "Quadri degli Anni 2010–2019";
        $sql = "SELECT * FROM quadri WHERE anno BETWEEN 2010 AND 2019 ORDER BY anno ASC";
        break;
    case '20-25':
        $titolo = "Quadri degli Anni 2020–2025";
        $sql = "SELECT * FROM quadri WHERE anno BETWEEN 2020 AND 2025 ORDER BY anno ASC";
        break;
    case 'all':
    default:
        $titolo = "Tutti i Quadri";
        break;
}

$result = $conn->query($sql);
?>

<div class="container py-4">
    <!-- Header -->
    <div class="gallery-header mb-5">
        <h1 class="gallery-title">
            <i class="bi bi-collection-fill me-3"></i><?= htmlspecialchars($titolo) ?>
        </h1>
        <p class="gallery-subtitle">
            <i class="bi bi-paint-bucket me-2"></i>
            <?= $result->num_rows ?> <?= $result->num_rows === 1 ? 'opera' : 'opere' ?> nella collezione
        </p>
    </div>

    <!-- Griglia quadri -->
    <div class="row g-4">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                    <div class="painting-card h-100">
                        <div class="painting-image-container">
                            <img src="<?= htmlspecialchars($row['foto']) ?>"
                                class="painting-image"
                                alt="<?= htmlspecialchars($row['nome']) ?>"
                                loading="lazy">
                            <div class="painting-overlay">
                                <span class="year-badge">
                                    <i class="bi bi-calendar-event me-1"></i><?= htmlspecialchars($row['anno']) ?>
                                </span>
                            </div>
                        </div>
                        <div class="painting-body">
                            <h5 class="painting-title"><?= htmlspecialchars($row['nome']) ?></h5>
                            <div class="painting-info">
                                <p class="info-item">
                                    <i class="bi bi-palette me-2"></i>
                                    <span><?= htmlspecialchars($row['tecnica']) ?></span>
                                </p>
                                <p class="info-item">
                                    <i class="bi bi-easel me-2"></i>
                                    <span><?= htmlspecialchars($row['supporto']) ?></span>
                                </p>
                                <p class="info-item">
                                    <i class="bi bi-arrows-angle-expand me-2"></i>
                                    <span><?= htmlspecialchars($row['dimensioni']) ?></span>
                                </p>
                            </div>
                            <form action="/page" method="post" class="mt-auto">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">
                                <button type="submit" class="btn-view-painting">
                                    <i class="bi bi-eye-fill me-2"></i>Vedi Dettagli
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <div class="col-12">
                <div class="empty-gallery">
                    <i class="bi bi-inbox"></i>
                    <h3>Nessun quadro trovato</h3>
                    <p>Non ci sono opere in questa categoria</p>
                    <a href="/categorie/all" class="btn-back-home">
                        <i class="bi bi-grid-3x3-gap me-2"></i>Vedi Tutti i Quadri
                    </a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php $conn->close(); ?>

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

    .gallery-header {
        text-align: center;
        padding: 2rem 0;
        background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
        border-radius: 16px;
        border: 1px solid var(--border-color);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .gallery-title {
        color: var(--accent-cyan);
        font-weight: 700;
        font-size: 2rem;
        text-shadow: 0 0 15px rgba(38, 198, 218, 0.4);
        margin-bottom: 0.5rem;
    }

    .gallery-subtitle {
        color: var(--text-secondary);
        font-size: 1.1rem;
        margin: 0;
        opacity: 0.9;
    }

    .painting-card {
        background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
        border-radius: 12px;
        overflow: hidden;
        border: 1px solid var(--border-color);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .painting-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(38, 198, 218, 0.3);
        border-color: var(--accent-cyan);
    }

    .painting-image-container {
        position: relative;
        width: 100%;
        padding-top: 133.33%;
        /* Ratio 3:4 */
        overflow: hidden;
        background-color: var(--bg-primary);
    }

    .painting-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .painting-card:hover .painting-image {
        transform: scale(1.05);
    }

    .painting-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7) 0%, transparent 40%, transparent 60%, rgba(0, 0, 0, 0.7) 100%);
        opacity: 0;
        transition: opacity 0.3s ease;
        display: flex;
        align-items: flex-start;
        justify-content: flex-end;
        padding: 0.75rem;
    }

    .painting-card:hover .painting-overlay {
        opacity: 1;
    }

    .year-badge {
        background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
        color: white;
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    .painting-body {
        padding: 1.25rem;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .painting-title {
        color: var(--text-primary);
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.3;
        min-height: 2.6rem;
    }

    .painting-info {
        margin-bottom: 1rem;
        flex-grow: 1;
    }

    .info-item {
        color: var(--text-secondary);
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        line-height: 1.4;
    }

    .info-item i {
        color: var(--accent-cyan);
        flex-shrink: 0;
    }

    .info-item span {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
    }

    .btn-view-painting {
        width: 100%;
        background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
        border: none;
        color: white;
        font-weight: 600;
        padding: 0.75rem;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-view-painting:hover {
        background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(38, 198, 218, 0.4);
    }

    .empty-gallery {
        text-align: center;
        padding: 5rem 2rem;
        background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
        border-radius: 16px;
        border: 1px solid var(--border-color);
    }

    .empty-gallery i {
        font-size: 5rem;
        color: var(--accent-cyan);
        opacity: 0.5;
        margin-bottom: 1.5rem;
    }

    .empty-gallery h3 {
        color: var(--text-primary);
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .empty-gallery p {
        color: var(--text-secondary);
        margin-bottom: 2rem;
    }

    .btn-back-home {
        background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
        border: none;
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        text-decoration: none;
        display: inline-block;
        transition: all 0.3s ease;
    }

    .btn-back-home:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 12px rgba(38, 198, 218, 0.4);
        color: white;
    }

    @media (max-width: 576px) {
        .gallery-title {
            font-size: 1.5rem;
        }

        .painting-body {
            padding: 1rem;
        }
    }
</style>