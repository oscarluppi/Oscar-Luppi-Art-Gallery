<?php
$conn = new mysqli("localhost", "root", "root", "my_oscargallery");
if ($conn->connect_error) {
  die("<div class='alert alert-danger text-center mt-5'>Connessione fallita: {$conn->connect_error}</div>");
}
?>

<!-- HEADER -->
<header class="text-white text-center py-5 border-bottom">
  <div class="container py-5">
    <h1 class="display-4 fw-bold mb-3 text-gradient">Benvenuti nella Galleria di Oscar Luppi</h1>
    <p class="lead text-light opacity-75 mb-4">
      Esplora un mondo dove luce e colore si fondono: ogni quadro è una storia che prende vita.
    </p>
    <a href="/categorie/all" class="btn btn-primary btn-lg px-4 shadow-lg">
      <i class="bi bi-brush-fill me-2"></i> Esplora i Quadri
    </a>
  </div>
</header>

<!-- CONTENUTI -->
<section class="container py-5">
  <div class="row g-4">

    <!-- Ultimi Quadri -->
    <div class="col-lg-8">
      <h2 class="fw-bold mb-4 section-title">
        <i class="bi bi-palette-fill me-2"></i>Ultimi Quadri
      </h2>
      <div class="row row-cols-1 row-cols-md-2 g-4">

        <?php
        $sql = "SELECT id, foto, nome, tecnica, anno, supporto, dimensioni FROM quadri ORDER BY anno DESC LIMIT 4";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0):
          while ($row = $result->fetch_assoc()):
        ?>
            <div class="col">
              <div class="card h-100 painting-card border-0 rounded-4 overflow-hidden shadow">
                <img src="<?= htmlspecialchars($row['foto']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['nome']) ?>">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title fw-semibold text-light"><?= htmlspecialchars($row['nome']) ?></h5>
                  <p class="small card-info mb-1">
                    <i class="bi bi-palette me-1"></i> <?= htmlspecialchars($row['tecnica']) ?>
                  </p>
                  <p class="small card-info mb-1">
                    <i class="bi bi-calendar-event me-1"></i> <?= htmlspecialchars($row['anno']) ?>
                  </p>
                  <p class="small card-info mb-1">
                    <i class="bi bi-easel me-1"></i> <?= htmlspecialchars($row['supporto']) ?>
                  </p>
                  <p class="small card-info mb-3">
                    <i class="bi bi-arrows-angle-expand me-1"></i> <?= htmlspecialchars($row['dimensioni']) ?>
                  </p>
                  <form action="/page" method="post" class="mt-auto">
                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    <button type="submit" class="btn btn-details w-100">
                      <i class="bi bi-eye-fill me-1"></i> Vedi Dettagli
                    </button>
                  </form>
                </div>
              </div>
            </div>
        <?php
          endwhile;
        else:
          echo "<p class='text-muted'>Nessun risultato disponibile.</p>";
        endif;
        $conn->close();
        ?>
      </div>
    </div>

    <!-- Sidebar -->
    <aside class="col-lg-4">
      <h3 class="fw-bold mb-3 section-title">
        <i class="bi bi-folder-fill me-2"></i>Categorie
      </h3>
      <div class="list-group shadow-lg rounded-3">
        <a href="/categorie/06-09" class="list-group-item list-group-item-action category-item">
          <i class="bi bi-images me-2"></i>Anni 2002–2009
        </a>
        <a href="/categorie/10-19" class="list-group-item list-group-item-action category-item">
          <i class="bi bi-images me-2"></i>Anni 2010–2019
        </a>
        <a href="/categorie/20-25" class="list-group-item list-group-item-action category-item">
          <i class="bi bi-images me-2"></i>Anni 2020–2025
        </a>
      </div>
    </aside>

  </div>
</section>

<!-- STILI -->
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

  .header-gradient {
    background: linear-gradient(135deg, #0a1929 0%, #1e3a5f 50%, #0d47a1 100%);
    border-bottom: 2px solid var(--accent-cyan) !important;
  }

  .text-gradient {
    background: linear-gradient(90deg, var(--accent-cyan), var(--accent-blue));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .section-title {
    color: var(--accent-cyan);
    text-shadow: 0 0 10px rgba(38, 198, 218, 0.3);
  }

  .painting-card {
    background-color: var(--bg-tertiary);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .painting-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 24px rgba(38, 198, 218, 0.3);
  }

  .painting-card img {
    height: 250px;
    object-fit: cover;
    border-bottom: 2px solid var(--border-color);
  }

  .card-info {
    color: var(--text-secondary);
    opacity: 0.9;
  }

  .btn-primary {
    background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
    border: none;
    transition: all 0.3s ease;
  }

  .btn-primary:hover {
    background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(38, 198, 218, 0.4);
  }

  .btn-details {
    background-color: transparent;
    border: 2px solid var(--accent-cyan);
    color: var(--accent-cyan);
    transition: all 0.3s ease;
  }

  .btn-details:hover {
    background-color: var(--accent-cyan);
    color: var(--bg-primary);
    box-shadow: 0 4px 8px rgba(38, 198, 218, 0.4);
  }

  .category-item {
    background-color: var(--bg-tertiary);
    border-color: var(--border-color);
    color: var(--text-primary);
    transition: all 0.3s ease;
  }

  .category-item:hover {
    background-color: var(--bg-secondary);
    color: var(--accent-cyan);
    border-left: 4px solid var(--accent-cyan);
    transform: translateX(4px);
  }

  .list-group {
    border-radius: 8px;
    overflow: hidden;
  }
</style>