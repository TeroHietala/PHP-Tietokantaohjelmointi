<?php

    require_once('../db.php'); // ota dp.php-tiedosto käyttöön tässä tiedostossa
    $genre = $_GET['genre']; // lue genre get-parametri muuttujaan
    $dbcon = createDbConnection(); // kutsutaan tietokantaa
    $sql = "SELECT `primary_title` 
    FROM `titles` INNER JOIN title_genres
    ON titles.title_id = title_genres.title_id
    WHERE genre LIKE '%" . $genre . "%'
    LIMIT 10;"; // muodostetaan sql-lause
    
    $prepare = $dbcon->prepare($sql);   //valmistellaan
        $prepare->execute();  //kysely tietokantaan
        $rows = $prepare->fetchAll(); //haetaan tulokset
        $html = '<h1>' . $genre . '</h1>'; // tulostaa otsikon
        $html .= '<ul>';
        //Käydään rivit läpi  
        foreach($rows as $row){
            $html .= '<li>' . $row['primary_title'] . '</li>';  
        }
        $html .= '</ul>';

    echo $html;