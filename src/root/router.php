<?php
function getPageDetails($path) {
    $segments = explode('/', trim($path, '/'));
    $first = $segments[0] ?? '';
    $second = $segments[1] ?? '';

    // Percorsi e titoli di default
    $defaultNav = "src/nav/default.php";
    $emptyNav   = "src/nav/empty.php";
    $staffNav   = "src/nav/staff.php";

    switch ($first) {

        case 'categorie':
            $categorieMap = [
                'all'   => ['src/pagine/categoria.php', "All categories"],
                '06-09' => ['src/pagine/categoria.php', "Anni 2002-2009"],
                '10-19' => ['src/pagine/categoria.php', "Anni 2010-2019"],
                '20-25' => ['src/pagine/categoria.php', "Anni 2020-2025"],
            ];
            if (isset($categorieMap[$second])) {
                [$page, $tit] = $categorieMap[$second];
                return ["page" => $page, "tit" => $tit, "nav" => $defaultNav];
            }
            break;

        case 'staff':
            $staffMap = [
                'nuovo' => ['src/add/insert.php', "Nuovo quadro", $staffNav],
                'salva' => ['src/add/save.php', "Quadro salvato", $emptyNav],
                'list'  => ['src/add/lista.php', "Lista quadri", $staffNav],
            ];
            if (isset($staffMap[$second])) {
                [$page, $tit, $nav] = $staffMap[$second];
                return ["page" => $page, "tit" => $tit, "nav" => $nav];
            }
            break;

        case '':
            return [
                "page" => "src/pagine/home.php",
                "tit"  => "Oscar Luppi Art Gallery",
                "nav"  => $defaultNav
            ];

        case 'page':
            return [
                "page" => "src/pagine/page.php",
                "tit"  => "Pagina del quadro",
                "nav"  => $defaultNav
            ];

        case 'link':
            return [
                "page" => "src/pagine/contatti.php",
                "tit"  => "Social Links",
                "nav"  => $defaultNav
            ];

        default:
            return [
                "page" => "src/pagine/404.php",
                "tit"  => "Errore 404 - Pagina non trovata",
                "nav"  => $emptyNav
            ];
    }

    // Se nessun caso corrisponde
    return [
        "page" => "404.php",
        "tit"  => "Errore 404 - Pagina non trovata",
        "nav"  => $emptyNav
    ];
}
?>
