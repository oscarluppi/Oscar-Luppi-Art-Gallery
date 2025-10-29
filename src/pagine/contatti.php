<section class="container p-3">
  <div class="row g-4">

    <div class="col-md-8">
      <h2 class="fw-bold mb-4 section-title">
        <i class="bi bi-share-fill me-2"></i>Seguici sui Social
      </h2>
      <div class="row row-cols-1 g-4">
        <div class="col">
          <div class="card social-card h-100 border-0 rounded-3 overflow-hidden">
            <div class="card-body">
              <h5 class="card-title fw-semibold">
                <i class="bi bi-facebook social-icon-facebook me-2"></i>Facebook
              </h5>
              <p class="card-text text-secondary">Seguici su Facebook per rimanere aggiornato sulle ultime novità e mostre.</p>
              <a href="https://www.facebook.com/people/Oscar-Luppi/pfbid037urmZxwUjAXVso3AmaJqrynVkicJwuQu2xKDS2izUJeAWwmLKfKzNDmf8JKFyc8Zl/" target="_blank" class="btn btn-social btn-facebook w-100">
                <i class="bi bi-box-arrow-up-right me-2"></i>Visita la nostra pagina Facebook
              </a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card social-card h-100 border-0 rounded-3 overflow-hidden">
            <div class="card-body">
              <h5 class="card-title fw-semibold">
                <i class="bi bi-pinterest social-icon-pinterest me-2"></i>Pinterest
              </h5>
              <p class="card-text text-secondary">Scopri le nostre collezioni e ispirazioni artistiche su Pinterest.</p>
              <a href="https://pin.it/4vIpQungI" target="_blank" class="btn btn-social btn-pinterest w-100">
                <i class="bi bi-box-arrow-up-right me-2"></i>Visita la nostra pagina Pinterest
              </a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card social-card h-100 border-0 rounded-3 overflow-hidden">
            <div class="card-body">
              <h5 class="card-title fw-semibold">
                <i class="bi bi-envelope-fill social-icon-email me-2"></i>Gmail
              </h5>
              <p class="card-text text-secondary">Contattaci via email per qualsiasi informazione o richiesta.</p>
              <a href="mailto:oscar.luppi51@gmail.com" class="btn btn-social btn-email w-100">
                <i class="bi bi-send-fill me-2"></i>Invia una Email
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <aside class="col-md-4">
      <h3 class="fw-bold mb-3 section-title">
        <i class="bi bi-folder-fill me-2"></i>Categorie
      </h3>
      <div class="list-group shadow-lg rounded-3">
        <a href="/categorie/06-09" class="list-group-item list-group-item-action category-item">
          <i class="bi bi-images me-2"></i>Anni 2006–2009
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
    --facebook-color: #1877f2;
    --pinterest-color: #e60023;
    --email-color: #ea4335;
  }

  .section-title {
    color: var(--accent-cyan);
    text-shadow: 0 0 10px rgba(38, 198, 218, 0.3);
  }

  .social-card {
    background-color: var(--bg-tertiary);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
  }

  .social-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(38, 198, 218, 0.3);
  }

  .social-card .card-title {
    color: var(--text-primary);
    font-size: 1.25rem;
  }

  .social-card .card-text {
    color: var(--text-secondary) !important;
    opacity: 0.9;
  }

  .social-icon-facebook {
    color: var(--facebook-color);
    filter: drop-shadow(0 0 5px rgba(24, 119, 242, 0.5));
  }

  .social-icon-pinterest {
    color: var(--pinterest-color);
    filter: drop-shadow(0 0 5px rgba(230, 0, 35, 0.5));
  }

  .social-icon-email {
    color: var(--email-color);
    filter: drop-shadow(0 0 5px rgba(234, 67, 53, 0.5));
  }

  .btn-social {
    border: none;
    color: white;
    font-weight: 600;
    transition: all 0.3s ease;
    padding: 0.75rem 1rem;
  }

  .btn-facebook {
    background: linear-gradient(135deg, #1877f2, #4267b2);
  }

  .btn-facebook:hover {
    background: linear-gradient(135deg, #4267b2, #1877f2);
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(24, 119, 242, 0.4);
  }

  .btn-pinterest {
    background: linear-gradient(135deg, #e60023, #c8102e);
  }

  .btn-pinterest:hover {
    background: linear-gradient(135deg, #c8102e, #e60023);
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(230, 0, 35, 0.4);
  }

  .btn-email {
    background: linear-gradient(135deg, #ea4335, #d93025);
  }

  .btn-email:hover {
    background: linear-gradient(135deg, #d93025, #ea4335);
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(234, 67, 53, 0.4);
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