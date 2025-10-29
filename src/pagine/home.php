<header class="jumbotron jumbotron-fluid bg-info text-white">
  <div class="container p-5">
    <h1>Benvenuti sul nostro sito!</h1>
    <p>
        Benvenuti nel nostro spazio digitale dedicato all'arte visiva, 
        dove ogni tela racconta una storia unica. Esplora la bellezza e 
        l'espressione artistica attraverso i nostri quadri selezionati con cura.
    </p>
    <a href="/categorie/all"><button class="btn btn-primary btn-lg">Esplora i quadri</button></a>
  </div>
</header>

<section class="container p-3">
  <div class="row">

    <div class="col-md-8">
        <h2>Ultimi Quadri</h2>
        <div class="card-columns">

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
        $sql = "SELECT * FROM quadri ORDER BY `quadri`.`anno` DESC LIMIT 3";
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

            echo "<div class=\"card\">\n";
            echo "    <img src=\"$foto\" class=\"card-img-top\">\n";
            echo "    <div class=\"card-body\">\n";
            echo "        <h5 class=\"card-title\">Titolo: $nome</h5>\n";
            echo "        <p class=\"card-text\">Tecnica: <br> $tecnica</p>\n";
            echo "        <p class=\"card-text\">Anno: <br> $anno</p>\n";
            echo "        <p class=\"card-text\">Supporto: <br> $supporto</p>\n";
            echo "        <p class=\"card-text\">Dimensioni: <br> $dimensioni</p>\n";
            echo "        <form action='/page' method='post'>\n"; 
            echo "           <input type=\"hidden\" name=\"id\" value=\"$id\">\n"; 
            echo "           <button type='submit' class='btn btn-primary mt-auto'>Pagina del quadro</button>\n"; 
            echo "        </form>\n"; 
            echo "    </div>\n";
            echo "</div>\n";
          }
        } else {
          echo "<p>Nessun risultato<p>";
        }

        $conn->close();

    ?>

        </div>
    </div>

    <aside class="col-md-4">
      <h3>Categorie</h3>
      <div class="list-group">
        <a href="/categorie/06-09" class="list-group-item">Anni 2002-2009</a>
        <a href="/categorie/10-19" class="list-group-item">Anni 2010-2019</a>
        <a href="/categorie/20-25" class="list-group-item">Anni 2020-2025</a>
      </div>
    </aside>

  </div>
</section>