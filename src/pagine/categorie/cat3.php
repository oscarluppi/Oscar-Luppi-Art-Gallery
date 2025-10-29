<div class="container">
  <div class="row">
    <div class="col-12">
      <h1>Quadri degli anni 2020-2025</h1>
    </div>
  </div>
  <div class="row">
            
    <?php
            
    //credenziali collegamento
    $server = "localhost";
    $username = "root";
    $password = "root";
    $database = "my_oscargallery";

    //connessione al database
    $conn = new mysqli($server, $username, $password, $database);

    //controllo connessione
    if ($conn->connect_error) {
      die ("connessione fallita: ". $conn->connect_error);
    }

    //preparazione della query
    $sql = "SELECT * FROM quadri WHERE anno = '2020' OR anno = '2021' OR anno = '2022' OR anno = '2023' OR anno = '2024' OR anno = '2025' OR anno = '2026' OR anno = '2027' OR anno = '2028' OR anno = '2029'  ORDER BY `quadri`.`anno` ASC";
    $result = $conn->query($sql);
            
    //risultati 
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $foto = $row['foto'];
        $nome = $row['nome'];
        $tecnica = $row['tecnica'];
        $anno = $row['anno'];
        $supporto = $row['supporto'];
        $dimensioni = $row['dimensioni'];

        echo "<div class=\"col-12 col-sm-4 col-lg-3 col-xl-2 p-3\">\n";
        echo "  <div class=\"card w-100\">\n";
        echo "      <img src=\"$foto\" class=\"card-img-top\" alt=\"Foto quadro\">\n";
        echo "      <div class=\"card-body\">\n";
        echo "          <h5 class=\"card-title\">Titolo: <br> $nome</h5>\n";
        echo "          <p class=\"card-text\">Tecnica: <br> $tecnica</p>\n";
        echo "          <p class=\"card-text\">Anno: <br> $anno</p>\n";
        echo "          <p class=\"card-text\">Supporto: <br> $supporto</p>\n";
        echo "          <p class=\"card-text\">Dimensioni: <br> $dimensioni</p>\n";
        echo "          <form action='/page' method='post'>\n"; 
        echo "             <input type=\"hidden\" name=\"id\" value=\"$id\">\n"; 
        echo "             <button type='submit' class='btn btn-primary mt-auto'>Pagina del quadro</button>\n"; 
        echo "          </form>\n"; 
        echo "      </div>\n";
        echo "  </div>\n";
        echo "</div>\n";

      }
    } else {
      echo "<p>Nessun risultato<p>";
    }
            
    $conn->close();
            
    ?>
            
  </div>
</div>