<?php
function getPageDetails($path) {
    $page = null;
    $tit = null;
    $nav = null;

    // Divide l'URL in segmenti
    $segments = explode('/', $path);

    // Controlla il primo segmento per determinare la pagina
    $firstSegment = isset($segments[1]) ? $segments[1] : '';

    // Gestisci le pagine in base al primo segmento
    switch ($firstSegment) {
        case 'categorie':
            switch ($segments[2]) {
                case 'all':
                    $page = "src/categorie/cat0.php";
					$nav = "src/nav/default.php";
                    $tit = "All categories";
                    break;
                case '06-09':
                    $page = "src/categorie/cat1.php";
					$nav = "src/nav/default.php";
                    $tit = "Anni 2002-2009";
                    break;
                case '10-19':
                    $page = "src/categorie/cat2.php";
					$nav = "src/nav/default.php";
                    $tit = "Anni 2010-2019";
                    break;
                case '20-25':
                    $page = "src/categorie/cat3.php";
					$nav = "src/nav/default.php";
                    $tit = "Anni 2020-2025";
                    break;
                    
            }
            
        case 'staff':
            switch ($segments[2]) {
                case 'nuovo':
                    $page = "src/add/insert.php";
					$nav = "src/nav/staff.php";
					$tit = "Nuovo quadro";
                    break;
                case 'salva':
                    $page = "src/add/save.php";
					$nav = "src/nav/empty.php";
                    $tit = "Quadro salvato";
                    break;
				case 'list':
					$page = "src/add/lista.php";
					$nav = "src/nav/staff.php";
					$tit = "Lista quadri";
					break;
                    
            }

        case 'altro':
            // Aggiungi qui la logica per altre pagine, se necessario
            break;

        case "":
            $page = "src/pagine/home.php";
			$nav = "src/nav/default.php";
            $tit = "Oscar Luppi Art Gallery";
            break;

        case "page":
            $page = "src/pagine/page.php";
			$nav = "src/nav/default.php";
            $tit = "Pagina del quadro";
            break;

        case "link":
            $page = "src/pagine/contatti.php";
			$nav = "src/nav/default.php";
            $tit = "Social Links";
            break;

        default:
            // Se il primo segmento non corrisponde a nessuna pagina, mostra errore 404
            $page = "404.php";
			$nav = "src/nav/empty.php";
            $tit = "error 404";
            break;
    }

    return array("page" => $page, "tit" => $tit, "nav" => $nav);
}
?>