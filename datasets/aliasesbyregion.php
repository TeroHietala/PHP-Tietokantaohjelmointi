<?php

    require_once('../db.php'); // ota dp.php-tiedosto käyttöön tässä tiedostossa
    $region = $_GET['region']; // lue region get-parametri muuttujaan
    $dbcon = createDbConnection(); // kutsutaan tietokantaa
    $sql = "CALL GetAliasesByRegion('" . $region . "');"; // kutsutaan proceduuria
    
    $prepare = $dbcon->prepare($sql);   //valmistellaan
        $prepare->execute();  //kysely tietokantaan
        $rows = $prepare->fetchAll(); //haetaan tulokset (voitaisiin hakea myös eka rivi fetch ja tarkistus)
        $html = '<h1> Aliases by region ' . $region . '</h1>';
        $html .= '<ul>'; // avaa ul-elementin
        //Käydään rivit läpi  
        foreach($rows as $row){
            $html .= '<li>' . $row["title"] . '</li>';  
        }
        $html .= '</ul>';

    echo $html;