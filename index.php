<?php
    require_once('utilities.php');
    // Hakukriteerit
    $html = "<h2>Criteria</h2>"; 
    $html .= '<form action="GET">'; 

    // genre-pudotusvalikko
    $html .= createGenreDropDown();

    // region-pudotusvalikko
    $html .= createRegionDropDown();

    // Profession-pudotusvalikko
    $html .= createProfessionDropDown();

    // Looppaa läpi tiedostot datasets-hakemistosta
    $path = 'datasets';
    if ($handle = opendir($path)) {
        while (false !== ($file = readdir($handle))) {
            if ('.' === $file) continue;
            if ('..' === $file) continue;

            $html .= '<div><input type="submit" value="' . basename($file, ".php") . '" formaction="' . $path . "/" . $file . '"></div>';
        }
        closedir($handle);
    }
    $html .= '</form>';
    
    echo $html;