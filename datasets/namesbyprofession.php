<?php

    require_once('../db.php'); // ota dp.php-tiedosto käyttöön tässä tiedostossa
    $profession = $_GET['profession']; // lue profession get-parametri muuttujaan
    $dbcon = createDbConnection();
    $sql = "SELECT `name_`
    FROM `names_` INNER JOIN name_worked_as
    ON names_.name_id = name_worked_as.name_id
    WHERE profession LIKE '%" . $profession . "%'
    LIMIT 25;"; // muodostetaan sql-lause
    
    $prepare = $dbcon->prepare($sql);   //valmistellaan
        $prepare->execute();  //kysely tietokantaan
        $rows = $prepare->fetchAll(); //haetaan tulokset
        $html = '<h1> Names by profession ' . $profession . '</h1>'; // tulostaa otsikon
        $html .= '<ul>';
        //Käydään rivit läpi  
        foreach($rows as $row){
            $html .= '<li>' . $row['name_'] . '</li>';  
        }
        $html .= '</ul>';

    echo $html;