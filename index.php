<?php 
require 'header.php'; 
require_once 'fonctions.php';
?>
<body>

    <form id="form" name="criteres_form" method="post" onSubmit="test();return false">
        <?php $pdo = new PDO('sqlite:Db/new_cave.db');

            $statement = $pdo->query("SELECT nom FROM METS");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $results = $statement->fetchAll();

            foreach ($results as $name) {
                $critere = $name[0];
                if ($critere != "Indefini") {
        ?>
        <input type="checkbox" name="<?php echo $critere; ?>"><?php echo $critere; ?><br>
                <?php } ?>
            <?php } ?>

        <?php $pdo = new PDO('sqlite:Db/new_cave.db');

            $statement = $pdo->query("SELECT nom FROM REGIONS");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $results = $statement->fetchAll();

            foreach ($results as $name) {
                $critere = $name[0];
                if ($critere != "Indefini") {
        ?>
        <input type="checkbox" name="<?php echo $critere; ?>"><?php echo $critere; ?><br>
                <?php } ?>
            <?php } ?>
        
        <?php $pdo = new PDO('sqlite:Db/new_cave.db');

            $statement = $pdo->query("SELECT nom FROM CEPAGES");
            if ($statement === FALSE){
                die('Erreur SQL');
            }

            $results = $statement->fetchAll();

            foreach ($results as $name) {
                $critere = $name[0];
                if ($critere != "Assemblage(Indefini)") {
        ?>
        <input type="checkbox" name="<?php echo $critere; ?>"><?php echo $critere; ?><br>
                <?php } ?>
            <?php } ?>
        
        <input type="checkbox" name="+20 ans">+20 ans<br>
        <input type="checkbox" name="+10 ans">+10 ans<br>
        <input type="checkbox" name="5-10 ans">5-10 ans<br>
        <input type="checkbox" name="-5 ans">-5 ans<br>
        
    </form>


    <div class="toTop" id="top">
        
    </div>
    
    <nav>

        <ul class="TopNavbar">
            <li class="navbar" ><a class="js-scrollTo" href="#top">Selection</a></li>
            <li class="navbar" ><a href="inventaire.php">Inventaire</a></li>
            <li class="navbar" ><a href="test.html">Creation</a></li>
        </ul>
   
        
    </nav>

    <main>
        
        <div class="layer">
            <div class="title-content" id="title">
                <h3>Mes Vins</h3>
            </div>
            <div class="content" id="content">
                <div class="straight"></div>
                <!-- <h3>Critères</h3> -->
                <!-- <button class="next">1/3 -></button> -->
                <!-- <div> -->
                <ul class="next">
                    <li class="nav_criteres active" ><a href="#mets">Mets</a></li>
                    <li class="nav_criteres" ><a href="#region">Regions</a></li>
                    <li class="nav_criteres" ><a href="#cepage">Cepages</a></li>
                    <li class="nav_criteres" ><a href="#millesime">Millesimes</a></li>
                </ul>
                <div class="choice" id="choice">
                    <!-- <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button> -->

                    <?php $pdo = new PDO('sqlite:Db/new_cave.db');

                        $statement = $pdo->query("SELECT nom,url FROM METS");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }

                        $results = $statement->fetchAll();

                        // echo '<pre>';
                        // var_dump($results);
                        // echo '<pre>';


                        foreach ($results as $name) {
                            $critere = $name[0];
                            $url = $name[1];
                            if ($critere != "Indefini") {
                    ?>
                    <button class="choice-button active" id="mets">
                    <img src="<?php echo $url; ?>" alt="<?php echo $critere; ?>">
                    <h3><?php echo $critere; ?></h3>
                    </button>
                           <?php } ?>
                        <?php } ?>

                    <!-- --------------------------------------------------------------------------------- -->

                    <?php $pdo = new PDO('sqlite:Db/new_cave.db');

                        $statement = $pdo->query("SELECT nom,url FROM REGIONS");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }

                        $results = $statement->fetchAll();

                        foreach ($results as $name) {
                            $critere = $name[0];
                            $url = $name[1];
                            if ($critere != "Indefini") {
                    ?>
                    <button class="choice-button " id="region">
                    <img src="<?php echo $url; ?>" alt="viande">
                    <h3><?php echo $critere; ?></h3>
                    </button>
                           <?php } ?>
                        <?php } ?>
                    
                    <!-- --------------------------------------------------------------------------------------- -->

                    <?php $pdo = new PDO('sqlite:Db/new_cave.db');

                        $statement = $pdo->query("SELECT nom FROM CEPAGES");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }

                        $results = $statement->fetchAll();

                        foreach ($results as $name) {
                            $critere = $name[0];
                            if ($critere != "Assemblage(Indefini)") {
                    ?>
                    <button class="choice-button" id="cepage">
                    <img src="img/cepages/Assemblage.png" alt="viande">
                    <h3><?php echo $critere; ?></h3>
                    </button>
                           <?php } ?>
                        <?php } ?>

                    <!-- -------------------------------------------------------------------------------------- -->

                    <button class="choice-button 20" id="millesime">
                        <img src="img/millesime/+20ans.png" alt="viande">
                        <!-- <h3>+20 ans</h3> -->
                    </button>
                    <button class="choice-button 10" id="millesime">
                        <img src="img/millesime/10-20ans.png" alt="viande">
                        <!-- <h3>+10 ans</h3> -->
                    </button>
                    <button class="choice-button 5" id="millesime">
                        <img src="img/millesime/5-10ans.png" alt="viande">
                        <!-- <h3>5-10 ans</h3> -->
                    </button>
                    <button class="choice-button 1" id="millesime">
                        <img src="img/millesime/-5ans.png" alt="viande">
                        <!-- <h3>-5 ans</h3> -->
                    </button>
                            
                    <!-- <?= critere_mets(); ?> -->
                    <!-- <?= critere_regions(); ?> -->
                    <!-- <?= critere_cepages(); ?> -->
                </div>
                <!-- </div>    -->
            </div>
                
            <div class="result" id="result">
                <!-- <div class="wine-card">
                    <div class="top-card">
                        <img src="img/bouteille-new.png" alt="bouteille-vin">
                        <img id="star" src="img/star-orange.png" alt="etoile">
                        <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note">5</h6>
                        <h6 class="nombre">3</h6>
                        <h5>Chateau Segur</h5>
                        <h3>2000</h3>
                    </div>
                    <div class="bottom-card">
                        <div class="appellation">
                            <h3>Haut-Medoc Cru bourgeois</h3>
                        </div>
                        <div class="cepage">
                            <h5>Pinot Gris</h5>
                        </div>
                    </div>
                </div> -->

                <div class="wine-card ">
                    <div class="top-card">
                        <img src="img/bouteille-rouge.png" alt="bouteille-vin">
                        <img id="star" src="img/star-orange.png" alt="etoile">
                        <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note">5<h6>
                        <h6 class="nombre">1</h6>
                        <h5>Chateau Segur</h5>
                        <h3 class="millesime">2004</h3>
                    </div>
                    <div class="bottom-card">
                        <h3 class="appellation">Haut Medoc</h3>
                        <h5 class="cepage">Assemblage</h5>
                    </div>
                </div>

                <!-- <?= wine_card(); ?> -->
                <?php 

                    $pdo = new PDO('sqlite:Db/new_cave.db');

                    $statement = $pdo->query("SELECT count(*) FROM BOUTEILLES");
                    if ($statement === FALSE){
                        die('Erreur SQL');
                    }

                    $rows = $statement->fetchAll();
                    $max = $rows[0][0]; 


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

                        $statement = $pdo->query("SELECT COULEURS.nom
                                                FROM COULEURS, BOUTEILLES
                                                WHERE BOUTEILLES.id_couleur = COULEURS.id_couleur 
                                                and BOUTEILLES.id_bouteille = $i;");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }

                        $result = $statement->fetchAll();
                        $couleur = $result[0][0];

                        if ($couleur != 'Indefini'){
                            if ($couleur === 'Rouge'){
                                $img = 'img/bouteille-rouge.png';
                            }elseif ($couleur === 'Blanc'){
                                $img = 'img/bouteille-blanc.png';
                            }elseif ($couleur === 'Rose'){
                                $img = 'img/bouteille-rose.png';
                            }
                        }

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

                        $statement = $pdo->query("SELECT REGIONS.nom
                                                    FROM BOUTEILLES, REGIONS
                                                    WHERE BOUTEILLES.id_region = REGIONS.id_region 
                                                    and BOUTEILLES.id_bouteille = $i;");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }

                        $result = $statement->fetchAll();
                        $region = $result[0][0];
                        $region = str_replace(' ', '-', $region);


                        $statement = $pdo->query("SELECT CEPAGES.nom
                                                    FROM BOUTEILLES, CEPAGES
                                                    WHERE BOUTEILLES.id_cepage = CEPAGES.id_cepage 
                                                    and BOUTEILLES.id_bouteille = $i;");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }

                        $result = $statement->fetchAll();
                        $cepage = $result[0][0];
                        $cepage = str_replace(' ', '-', $cepage);


                        $statement = $pdo->query("SELECT METS.nom
                                        FROM MARIER, METS, BOUTEILLES
                                        WHERE BOUTEILLES.id_bouteille = MARIER.id_bouteille 
                                        and MARIER.id_mets = METS.id_mets 
                                        and BOUTEILLES.id_bouteille = $i;");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }

                        $result = $statement->fetchAll();
                        $res = $result;
                        $mets = [];
                        $len = count($res);
                        // echo '<pre>';
                        // var_dump($res);
                        // echo '</pre>';
                        if ($len > 0){
                            // echo 'good';
                            foreach ($res as $m){
                                // var_dump($m[0]);
                                $crit = str_replace(' ', '-', $m[0]);
                                array_push($mets, $crit);
                            }
                            // for ($i = 0; $i < $len; $i++){
                            //     array_push($mets, $res[$i][0]);
                            // }
                        }
                        // echo '<pre>';
                        // var_dump($mets);
                        // echo '</pre>';
                        // $mets = str_replace(' ', '-', $mets);

                ?>
                <div class="wine-card <?php echo $region;?> <?php echo $cepage; ?> <?php foreach($mets as $el){ echo $el;}?>">
                    <div class="top-card">
                        <img src="<?php echo $img; ?>" alt="bouteille-vin">
                        <img id="star" src="img/star-orange.png" alt="etoile">
                        <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note"><?php echo $note; ?><h6>
                        <h6 class="nombre"><?php echo $nombre; ?></h6>
                        <h5><?php echo $domaine; ?></h5>
                        <h3 class="millesime"><?php echo $millesime; ?></h3>
                    </div>
                    <div class="bottom-card">
                        <h3 class="appellation"><?php echo $appellation;?></h3>
                        <h5 class="cepage"><?php echo $cepage; ?></h5>
                    </div>
                </div>

                <?php } ?>

              

                

            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <!-- <script src="mainIndex.js"></script> -->
    <script src="main.js"></script>


    <!-- <article class="main">
        <h3>Criteres</h3>
        <button>
            Viande rouge
        </button>

    </article> -->

    <!-- <div class="bloc">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        <img src="https://place-hold.it/150x150" alt="illustration">
        
    </div> -->

    <!-- <footer class="footer">
        <p>Made by Mathys</p>
    </footer> -->
</body>
</html>
