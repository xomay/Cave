<?php 

    // $pdo = new PDO('sqlite:Db/cave.db');

    // $statement = $pdo->query("SELECT * FROM bouteille");
    // if ($statement === FALSE){
    //     die('Erreur SQL');
    // }

    // $rows = $statement->fetchAll();

    // echo '<pre>';
    // print_r($rows);
    // echo '</pre>';

    function wine_card () {

        $pdo = new PDO('sqlite:Db/new_cave.db');
        // $pdo = new PDO('mysql:host=185.27.134.10;
        //                 dbname=epiz_31212063_db_cave;,
        //                 'epiz_31212063','mAthys2004');

        // $conn = mysqli_connect("sql108.epizy.com", "epiz_31212063", "7GVAaOXxtm", "epiz_31212063_db_cave");
        
        // if (!$conn) {
        //     die("Connection Failed:".mysqli_connect_error());
        // }else{
        //     echo ("Done !");
        // }

        $statement = $pdo->query("SELECT * FROM BOUTEILLES");
        if ($statement === FALSE){
            die('Erreur SQL');
        }

        $rows = $statement->fetchAll();
        $max = count($rows); 


        for ($i = 1; $i < ($max+1); $i++){
            $class_h3 = "";
            $class_h5 = "";
            $len = 0;

            $statement = $pdo->query("SELECT DOMAINES.nom
                                FROM BOUTEILLES, DOMAINES
                                WHERE BOUTEILLES.id_domaine = DOMAINES.id_domaine 
                                    AND BOUTEILLES.id_bouteille = $i;");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $result = $statement->fetchAll();
            $domaine = $result[0][0];

            $statement = $pdo->query("SELECT CEPAGES.nom
                                    FROM BOUTEILLES, CEPAGES
                                    WHERE BOUTEILLES.id_cepage = CEPAGES.id_cepage 
                                        AND BOUTEILLES.id_bouteille = $i;");
            if ($statement === FALSE){
                die('Erreur SQL');
            }
  
            $result = $statement->fetchAll();
            $cepage = $result[0][0];

            
            $statement = $pdo->query("SELECT APPELLATIONS.nom
                                    FROM BOUTEILLES, APPELLATIONS
                                    WHERE BOUTEILLES.id_appellation = APPELLATIONS.id_appellation 
                                        AND BOUTEILLES.id_bouteille = $i;");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $result = $statement->fetchAll();
            $appellation = $result[0][0];


            $statement = $pdo->query("SELECT max(ANNEES.note)
                                        FROM BOUTEILLES, ANNEES
                                        WHERE BOUTEILLES.id_bouteille = ANNEES.id_bouteille 
                                        and BOUTEILLES.id_bouteille = $i;");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $result = $statement->fetchAll();
            $note = $result[0][0];

            $statement = $pdo->query("SELECT min(MILLESIMES.annee)
                                        FROM BOUTEILLES, ANNEES, MILLESIMES
                                        WHERE BOUTEILLES.id_bouteille = ANNEES.id_bouteille 
                                        and ANNEES.id_millesime = MILLESIMES.id_millesime 
                                        and BOUTEILLES.id_bouteille = $i;");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $result = $statement->fetchAll();
            $millesime = $result[0][0];

            $statement = $pdo->query("SELECT sum(ANNEES.quantite)
                                        FROM BOUTEILLES, ANNEES
                                        WHERE BOUTEILLES.id_bouteille = ANNEES.id_bouteille 
                                        and BOUTEILLES.id_bouteille = $i;");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $result = $statement->fetchAll();
            $nombre = $result[0][0];

            // $millesime = $rows[$i]['millesime'];
            // $note = $rows[$i]['note'];
            // $nombre = $rows[$i]['quantite'];
            echo <<<HTML
            <div class="wine-card">
                <div class="top-card">
                    <img src="img/bouteille-new.png" alt="bouteille-vin">
                    <img id="star" src="img/star-orange.png" alt="etoile">
                    <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                    <h6 class="note">$note<h6>
                    <h6 class="nombre">$nombre</h6>
                    <h5>$domaine</h5>
                    <h3>$millesime</h3>
                </div>
                <div class="bottom-card">
                    <h3 class="appellation">$appellation</h3>
                    <h5 class="cepage">$cepage</h5>
                </div>
            </div>
HTML;
        }

    }

    function test() {
        $pdo = new PDO('sqlite:Db/cave.db');

        for ($i = 1; $i < 20; $i++){

            $statement = $pdo->query("SELECT cepage.nom
                                    FROM bouteille, cepage
                                    WHERE bouteille.id_cepage = cepage.id_cepage 
                                        AND bouteille.id_bouteille = 2;");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $result = $statement->fetchAll();

            // echo '<pre>';
            // var_dump($result);
            // echo '</pre>';
        }
    }

    function critere_mets() {
        $pdo = new PDO('sqlite:Db/new_cave.db');

        $statement = $pdo->query("SELECT nom FROM METS");
        if ($statement === FALSE){
            die('Erreur SQL');
        }

        $results = $statement->fetchAll();

        foreach ($results as $name) {
            $critere = $name[0];
            if ($critere != "Indefini") {
                echo <<<HTML
                <button class="choice-button active" id="mets">
                    <img src="img/meatWhite.png" alt="viande">
                    <h3>$critere</h3>
                </button>
HTML;
            }
        }
    }

    function critere_regions() {
        $pdo = new PDO('sqlite:Db/new_cave.db');

        $statement = $pdo->query("SELECT nom FROM REGIONS");
        if ($statement === FALSE){
            die('Erreur SQL');
        }

        $results = $statement->fetchAll();

        foreach ($results as $name) {
            $critere = $name[0];
            if ($critere != "Indefini") {
                echo <<<HTML
                <button class="choice-button " id="region">
                    <img src="img/meatWhite.png" alt="viande">
                    <h3>$critere</h3>
                </button>
HTML;
            }
        }
    }

    function separateur($text, $sep){
        $return = [];
        if (strlen($text) != 1){
            for ($i = 0; $i < strlen($text); $i++){
                if ($text[$i] !== $sep){
                    array_push($return, $text[$i]);
                }
            }
            return $return;
        }else{
            return $text;
        }
    }

//     function critere_millesime() {
//         $pdo = new PDO('sqlite:../Db/new_cave.db');

//         $statement = $pdo->query("SELECT nom FROM REGIONS");
//         if ($statement === FALSE){
//             die('Erreur SQL');
//         }

//         $results = $statement->fetchAll();

//         foreach ($results as $name) {
//             $critere = $name[0];
//             if ($critere != "Indefini") {
//                 echo <<<HTML
//                 <button class="choice-button regions" :class="{check : valid, uncheck : !valid}" @click="check">
//                     <img src="img/meatWhite.png" alt="viande">
//                     <h3>$critere</h3>
//                 </button>
// HTML;
//             }
//         }
//     }

    function critere_cepages() {
        $pdo = new PDO('sqlite:Db/new_cave.db');

        $statement = $pdo->query("SELECT nom FROM CEPAGES");
        if ($statement === FALSE){
            die('Erreur SQL');
        }

        $results = $statement->fetchAll();

        foreach ($results as $name) {
            $critere = $name[0];
            if ($critere != "Assemblage(Indefini)") {
                echo <<<HTML
                <button class="choice-button " id="cepage">
                    <img src="img/meatWhite.png" alt="viande">
                    <h3>$critere</h3>
                </button>
HTML;
            }
        }
    } ?>