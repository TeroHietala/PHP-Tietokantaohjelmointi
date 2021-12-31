<?php

    // Luo genre pudotusvalikon
    function createGenreDropDown() {
        // avataan tietokantayhteys
        require_once('db.php');
        $dbcon = createDbConnection();
        // muodostetaan sql-lause
        $sql = "SELECT DISTINCT genre FROM title_genres;";
        // ajetaan sql-lause kantaan
        $prepare = $dbcon->prepare($sql);
        //kysely tietokantaan
        $prepare->execute();  
        //haetaan tulokset
        $rows = $prepare->fetchAll(); 
        //Käydään rivit läpi (max yksi rivi tässä tapauksessa)
        $html = '<select name="genre">';
        $html .= '<ul>';
             
        foreach($rows as $row){
             $html .= '<option>' . $row['genre'] . '</option>';  
        }
        $html .= '</select>';

        return $html;
        
    }

    // luo region pudotusvalikon
    function createRegionDropDown() {
        // avataan tietokantayhteys
        require_once('db.php');
        $dbcon = createDbConnection();
        // muodostetaan sql-lause
        $sql = "SELECT DISTINCT region FROM aliases;";
        // ajetaan sql-lause kantaan
        $prepare = $dbcon->prepare($sql);
        //kysely tietokantaan
        $prepare->execute();  
        //haetaan tulokset
        $rows = $prepare->fetchAll(); 
        //Käydään rivit läpi (max yksi rivi tässä tapauksessa)
        $html = '<select name="region">';
        $html .= '<ul>';
             
        foreach($rows as $row){
             $html .= '<option>' . $row['region'] . '</option>';  
        }
        $html .= '</select>';

        return $html;

    }

    // luo profession pudotusvalikon
    function createProfessionDropDown() {
        // avataan tietokantayhteys
        require_once('db.php');
        $dbcon = createDbConnection();
        // muodostetaan sql-lause
        $sql = "SELECT DISTINCT profession FROM name_worked_as;";
        // ajetaan sql-lause kantaan
        $prepare = $dbcon->prepare($sql);
        //kysely tietokantaan
        $prepare->execute();  
        //haetaan tulokset
        $rows = $prepare->fetchAll(); 
        //Käydään rivit läpi (max yksi rivi tässä tapauksessa)
        $html = '<select name="profession">';
        $html .= '<ul>';
             
        foreach($rows as $row){
             $html .= '<option>' . $row['profession'] . '</option>';  
        }
        $html .= '</select>';

        return $html;

    }

        