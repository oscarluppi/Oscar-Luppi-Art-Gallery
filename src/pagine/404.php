<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
  </symbol>
</svg>

<div class="container d-flex align-items-center justify-content-center" style="min-height: 70vh;">
  <div class="text-center p-4 rounded-3 error-box animate__animated animate__fadeIn">
    <svg class="bi mb-3 error-icon" width="3.5em" height="3.5em" role="img" aria-label="Errore">
      <use xlink:href="#exclamation-triangle-fill" />
    </svg>
    <h1 class="display-5 fw-bold error-title mb-2">Errore 404</h1>
    <p class="fs-6 error-description mb-3">La pagina che cerchi non è stata trovata.</p>
    <a href="/" class="btn btn-home px-4">
      <i class="bi bi-house-door-fill me-2"></i> Torna alla Home
    </a>
  </div>
</div>

<!-- opzionale: aggiungi questa libreria per animazione -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

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
    --error-color: #ff5252;
    --error-glow: rgba(255, 82, 82, 0.3);
  }

  .error-box {
    background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
    border: 1px solid var(--error-color);
    box-shadow: 0 4px 12px rgba(255, 82, 82, 0.2);
    max-width: 500px;
    position: relative;
    z-index: 10;
  }

  .error-icon {
    color: var(--error-color);
    filter: drop-shadow(0 0 10px var(--error-glow));
    position: relative;
    z-index: 1;
  }

  .error-title {
    background: linear-gradient(90deg, var(--error-color), #ff8a80);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-shadow: 0 0 30px var(--error-glow);
    position: relative;
    z-index: 1;
  }

  .error-description {
    color: var(--text-secondary);
    position: relative;
    z-index: 1;
  }

  .btn-home {
    background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
    border: none;
    color: white;
    font-weight: 600;
    transition: all 0.3s ease;
    position: relative;
    z-index: 100;
    pointer-events: auto;
    cursor: pointer;
  }

  .btn-home:hover {
    background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(38, 198, 218, 0.4);
    color: white;
  }

  .btn-home:active {
    transform: translateY(0);
  }

  /* Effetto particelle di sfondo ridotto */
  .container::before {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image:
      radial-gradient(1px 1px at 20% 30%, var(--accent-cyan), transparent),
      radial-gradient(1px 1px at 60% 70%, var(--accent-blue), transparent),
      radial-gradient(1px 1px at 50% 50%, var(--text-secondary), transparent);
    background-size: 200% 200%;
    opacity: 0.2;
    z-index: 0;
    pointer-events: none;
  }
</style>