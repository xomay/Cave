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
        $pdo = new PDO('sqlite:../Db/cave.db');

        $statement = $pdo->query("SELECT * FROM bouteille");
        if ($statement === FALSE){
            die('Erreur SQL');
        }

        $rows = $statement->fetchAll();

        // echo '<pre>';
        // print_r($rows[1]);
        // echo '</pre>';
        for ($i = 1; $i < 40; $i++){

            $statement = $pdo->query("SELECT domaine.nom
                                FROM bouteille, domaine
                                WHERE bouteille.id_domaine = domaine.id_domaine 
                                    AND bouteille.id_bouteille = $i;");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $result = $statement->fetchAll();
            $domaine = $result[0][0];

            $statement = $pdo->query("SELECT cepage.nom
                                    FROM bouteille, cepage
                                    WHERE bouteille.id_cepage = cepage.id_cepage 
                                        AND bouteille.id_bouteille = $i;");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $result = $statement->fetchAll();
            $cepage = $result[0][0];

            $millesime = $rows[$i]['millesime'];
            $note = $rows[$i]['note'];
            $nombre = $rows[$i]['quantite'];
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
                    <h3>Haut Medoc</h3>
                    <h5>$cepage</h5>
                </div>
            </div>
HTML;
        }

    }

    function test() {
        $pdo = new PDO('sqlite:../Db/cave.db');

        for ($i = 1; $i < 20; $i++){

            $statement = $pdo->query("SELECT cepage.nom
                                    FROM bouteille, cepage
                                    WHERE bouteille.id_cepage = cepage.id_cepage 
                                        AND bouteille.id_bouteille = $i;");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $result = $statement->fetchAll();

            // echo '<pre>';
            // print_r($result[0]['nom']);
            // echo '</pre>';
        }
    }