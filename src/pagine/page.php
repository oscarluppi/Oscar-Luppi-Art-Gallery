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

    // Controlla se è stato inviato un valore ID tramite POST
    if(isset($_POST['id'])) {
        // Recupera l'ID dal POST
        $id = $_POST['id'];
        // Query per cercare l'elemento nel database in base all'ID
        $sql = "SELECT * FROM quadri WHERE id = $id";
        // Esegui la query
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output dei dati trovati
            while($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $foto = $row['foto'];
                $nome = $row['nome'];
                $tecnica = $row['tecnica'];
                $anno = $row['anno'];
                $supporto = $row['supporto'];
                $dimensioni = $row['dimensioni'];

                echo "<p>&nbsp;";
                echo "<div class=\"container pb-5\">";
                echo "  <div class=\"row\">";
                echo "    <!-- Lato sinistro - Quadro -->";
                echo "    <div class=\"col-md-6\">";
                echo "      <img src=\"$foto\" alt=\"Quadro\" class=\"quadro img-fluid\">";
                echo "    </div>";
                echo "    <!-- Lato destro - Descrizione -->";
                echo "    <div class=\"col-md-6 descrizione\">";
                echo "      <h2>Descrizione del Quadro</h2>";
                echo "      <ul class=\"list-group\">";
                echo "        <li class=\"list-group-item\">Titolo: <b>$nome</b></li>";
                echo "        <li class=\"list-group-item\">Tecnica: $tecnica</li>";
                echo "        <li class=\"list-group-item\">Anno: $anno</li>";
                echo "        <li class=\"list-group-item\">Supporto: $supporto</li>";
                echo "        <li class=\"list-group-item\">Dimensioni: $dimensioni</li>";
                echo "        <li class=\"list-group-item\">Codice: $id</li>";
				echo "        <a href=\"javascript:history.back()\" class=\"list-group-item list-group-item-action active\" aria-current=\"true\">Back</a>";
                echo "      </ul>";
                echo "    </div>";
                echo "  </div>";
                echo "</div>";
            }
        } else {
            echo "<p>Nessun risultato trovato.</p>";
        }
    } else {
        echo "<p>Nessun risultato. (id)<p>";
    }
            
    $conn->close();
            
?>