<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<div class="form-wrapper p-4 rounded-4 shadow-lg">
				<h2 class="form-title mb-4 text-center">
					<i class="bi bi-plus-circle-fill me-2"></i>Aggiungi Nuovo Quadro
				</h2>
				<p class="text-center text-secondary mb-4">Compila tutti i campi per aggiungere un'opera alla galleria</p>

				<form action="/save.php" method="POST" enctype="multipart/form-data">
					<!-- Titolo -->
					<div class="mb-4">
						<label for="titolo" class="form-label">
							<i class="bi bi-brush-fill me-2 label-icon"></i>Titolo del Quadro
						</label>
						<input type="text"
							class="form-control custom-input"
							name="titolo"
							id="titolo"
							placeholder="Es: Tramonto sul mare"
							required>
					</div>

					<!-- Anno -->
					<div class="mb-4">
						<label for="anno" class="form-label">
							<i class="bi bi-calendar-event me-2 label-icon"></i>Anno di Realizzazione
						</label>
						<select class="form-select custom-select" name="anno" id="anno" required>
							<option value="" selected disabled>Seleziona l'anno</option>
							<option value="2002">2002</option>
							<option value="2004">2004</option>
							<option value="2005">2005</option>
							<option value="2006">2006</option>
							<option value="2007">2007</option>
							<option value="2008">2008</option>
							<option value="2009">2009</option>
							<option value="2010">2010</option>
							<option value="2011">2011</option>
							<option value="2012">2012</option>
							<option value="2013">2013</option>
							<option value="2014">2014</option>
							<option value="2015">2015</option>
							<option value="2016">2016</option>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
						</select>
					</div>

					<!-- Tecnica -->
					<div class="mb-4">
						<label for="tecnica" class="form-label">
							<i class="bi bi-palette-fill me-2 label-icon"></i>Tecnica
						</label>
						<input type="text"
							class="form-control custom-input"
							name="tecnica"
							id="tecnica"
							placeholder="Es: Acrilico, Olio su tela, Acquerello..."
							required>
					</div>

					<!-- Supporto -->
					<div class="mb-4">
						<label for="supporto" class="form-label">
							<i class="bi bi-easel me-2 label-icon"></i>Supporto
						</label>
						<input type="text"
							class="form-control custom-input"
							name="supporto"
							id="supporto"
							placeholder="Es: Tela, Legno, Cartone..."
							required>
					</div>

					<!-- Dimensioni -->
					<div class="mb-4">
						<label for="dimensioni" class="form-label">
							<i class="bi bi-arrows-angle-expand me-2 label-icon"></i>Dimensioni
						</label>
						<input type="text"
							class="form-control custom-input"
							name="dimensioni"
							id="dimensioni"
							placeholder="Es: 50x70 cm, 100x120 cm..."
							required>
					</div>

					<!-- Foto -->
					<div class="mb-4">
						<label for="foto" class="form-label">
							<i class="bi bi-image-fill me-2 label-icon"></i>Foto del Quadro
						</label>
						<div class="file-upload-wrapper">
							<input type="file"
								class="form-control custom-file-input"
								name="foto"
								id="foto"
								accept=".jpg, .jpeg, .png, .webp"
								required>
							<div class="file-upload-info">
								<i class="bi bi-cloud-upload me-2"></i>
								<span>Formati supportati: JPG, PNG, WEBP</span>
							</div>
						</div>
					</div>

					<!-- Pulsante Submit -->
					<div class="d-grid gap-2 mt-4">
						<button type="submit" class="btn btn-submit py-3 shadow-lg">
							<i class="bi bi-check-circle-fill me-2"></i>Aggiungi Quadro alla Galleria
						</button>
						<a href="/" class="btn btn-cancel">
							<i class="bi bi-x-circle me-2"></i>Annulla
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

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

	.form-wrapper {
		background: linear-gradient(135deg, var(--bg-secondary), var(--bg-tertiary));
		border: 1px solid var(--border-color);
		position: relative;
		overflow: hidden;
	}

	.form-wrapper::before {
		content: '';
		position: absolute;
		top: 0;
		left: 0;
		right: 0;
		height: 4px;
		background: linear-gradient(90deg, var(--accent-cyan), var(--accent-blue), var(--accent-cyan));
		background-size: 200% 100%;
		animation: shimmer 3s linear infinite;
	}

	@keyframes shimmer {
		0% {
			background-position: -200% 0;
		}

		100% {
			background-position: 200% 0;
		}
	}

	.form-title {
		color: var(--accent-cyan);
		font-weight: 700;
		text-shadow: 0 0 15px rgba(38, 198, 218, 0.4);
	}

	.form-label {
		color: var(--text-secondary);
		font-weight: 600;
		margin-bottom: 0.75rem;
		display: flex;
		align-items: center;
	}

	.label-icon {
		color: var(--accent-cyan);
		font-size: 1.1rem;
	}

	.custom-input,
	.custom-select,
	.custom-file-input {
		background-color: var(--bg-primary);
		border: 2px solid var(--border-color);
		color: var(--text-primary);
		padding: 0.75rem 1rem;
		border-radius: 8px;
		transition: all 0.3s ease;
	}

	.custom-input:focus,
	.custom-select:focus,
	.custom-file-input:focus {
		background-color: var(--bg-primary);
		border-color: var(--accent-cyan);
		color: var(--text-primary);
		box-shadow: 0 0 0 0.25rem rgba(38, 198, 218, 0.25);
		outline: none;
	}

	.custom-input::placeholder {
		color: var(--text-secondary);
		opacity: 0.6;
	}

	.custom-select {
		background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%2390caf9' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e");
	}

	.custom-select option {
		background-color: var(--bg-primary);
		color: var(--text-primary);
	}

	.file-upload-wrapper {
		position: relative;
	}

	.file-upload-info {
		margin-top: 0.5rem;
		color: var(--text-secondary);
		font-size: 0.875rem;
		display: flex;
		align-items: center;
		opacity: 0.8;
	}

	.custom-file-input::file-selector-button {
		background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
		border: none;
		color: white;
		padding: 0.5rem 1rem;
		border-radius: 6px;
		margin-right: 1rem;
		font-weight: 600;
		cursor: pointer;
		transition: all 0.3s ease;
	}

	.custom-file-input::file-selector-button:hover {
		background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
		transform: translateY(-2px);
		box-shadow: 0 4px 8px rgba(38, 198, 218, 0.3);
	}

	.btn-submit {
		background: linear-gradient(135deg, var(--accent-blue), var(--accent-cyan));
		border: none;
		color: white;
		font-weight: 700;
		font-size: 1.1rem;
		border-radius: 10px;
		transition: all 0.3s ease;
	}

	.btn-submit:hover {
		background: linear-gradient(135deg, var(--accent-cyan), var(--accent-blue));
		transform: translateY(-3px);
		box-shadow: 0 8px 20px rgba(38, 198, 218, 0.5);
		color: white;
	}

	.btn-submit:active {
		transform: translateY(-1px);
	}

	.btn-cancel {
		background-color: transparent;
		border: 2px solid var(--border-color);
		color: var(--text-secondary);
		font-weight: 600;
		border-radius: 8px;
		transition: all 0.3s ease;
	}

	.btn-cancel:hover {
		background-color: var(--bg-primary);
		border-color: var(--text-secondary);
		color: var(--text-primary);
		transform: translateY(-2px);
	}

	/* Validazione form */
	.custom-input:invalid:not(:placeholder-shown),
	.custom-select:invalid {
		border-color: #ff5252;
	}

	.custom-input:valid,
	.custom-select:valid {
		border-color: #4caf50;
	}
</style>