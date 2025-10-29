<div class="container">
	<form action="/save.php" method="POST" enctype="multipart/form-data">
		<div class="mb-3">
        	<label for="titolo" class="form-label">Titolo </label>
            <input type="text" class="form-control" name="titolo" id="titolo" placeholder="Inserisci il nome del quadro" value="">
        </div>
         <div class="mb-3">
        	<label for="anno" class="form-label">Anno</label>
            <select class="form-select" name="anno" id="anno">
            	<option selected>Scegli l'anno in qui hai realizzato il quadro</option>
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
        <div class="mb-3">
        	<label for="tecnica" class="form-label">Tecnica</label>
        	<input type="text" class="form-control" name="tecnica" id="tecnica" placeholder="Inserisci la tecnica del quadro" value="">
        </div>
        <div class="mb-3">
			<label for="supporto" class="form-label">Supporto</label>
			<input type="text" class="form-control" name="supporto" id="supporto" placeholder="Inserisci il supporto del quadro" value="">
		</div>
		<div class="mb-3">
			<label for="dimensioni" class="form-label">Dimensioni</label>
			<input type="text" class="form-control" name="dimensioni" id="dimensioni" placeholder="Inserisci le dimensioni del quadro" value="">
		</div>
		<div class="mb-3">
			<label for="foto" class="form-label">Foto</label>
			<input type="file" class="form-control" name="foto" id="foto" accept=".jpg, .jpeg, .png">
		</div>
        <button type="submit" class="btn btn-primary w-100">Inserisci</button>
	</form>
</div>