<?php 
require 'header.php'; 
require_once 'fonctions.php';
session_start();
?>
<body>
    <!-- scroll="no" style="overflow: hidden" -->
    <form id="form_values" action="./Db/edit_db.php" method="post" style="width:0;height: 0;">
        <input type="text" style="display: none;" id="id_bouteille" name="id_bouteille" autocomplete="off">
        <input type="text" style="display: none;" id="volume" name="volume" autocomplete="off">
        <input type="text" style="display: none;" id="annee" name="annee" autocomplete="off">
        <input type="text" style="display: none;" id="note" name="note" autocomplete="off">
        <input type="text" style="display: none;" id="demande" name="demande" autocomplete="off">
        
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

    <main class="">
        
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
                        $note_max = $result[0][0];

                        $statement = $pdo->query("SELECT min(MILLESIMES.annee)
                                                    FROM BOUTEILLES, ANNEES, MILLESIMES
                                                    WHERE BOUTEILLES.id_bouteille = ANNEES.id_bouteille 
                                                    and ANNEES.id_millesime = MILLESIMES.id_millesime 
                                                    and BOUTEILLES.id_bouteille = $i;");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }

                        $result = $statement->fetchAll();
                        $millesime_max = $result[0][0];

                        $statement = $pdo->query("SELECT sum(ANNEES.quantite)
                                                    FROM BOUTEILLES, ANNEES
                                                    WHERE BOUTEILLES.id_bouteille = ANNEES.id_bouteille 
                                                    and BOUTEILLES.id_bouteille = $i;");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }

                        $result = $statement->fetchAll();
                        $nombre_max = $result[0][0]; 

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

                        $statement = $pdo->query("SELECT MILLESIMES.annee, ANNEES.quantite, ANNEES.note, 
                                                FLACONS.volume, ANNEES.id_bouteille, ANNEES.id_meuble
                                                FROM MILLESIMES, ANNEES, FLACONS
                                                WHERE ANNEES.id_bouteille = $i 
                                                and ANNEES.id_millesime = MILLESIMES.id_millesime 
                                                and FLACONS.id_flacon = ANNEES.id_flacon
                                                ORDER BY MILLESIMES.annee;");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }

                        $result = $statement->fetchAll();
                        $all_millesime = $result;
                        $len_tab = count($all_millesime);

                        $statement = $pdo->query("SELECT DISTINCT(MILLESIMES.annee)
                                                FROM MILLESIMES, ANNEES
                                                WHERE ANNEES.id_bouteille = $i 
                                                and ANNEES.id_millesime = MILLESIMES.id_millesime
                                                ORDER BY MILLESIMES.annee;");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }

                        $result = $statement->fetchAll();
                        $mill_choice = $result;
                        // foreach ($mill_choice as $el){
                        //     echo $el[0];
                        // }
                        
                        $chiffres = ["un", "deux", "trois", "quatre", "cinq", "six", "sept", "huit", 
                        "neuf", "dix", "onze", "douze", "treize", "quatorze", "quinze", "seize", "dix-sept",
                        "dix-huit", "diw-neuf", 'vingt', "vingt-un", "vingt-deux"];
                        
                        $statement = $pdo->query("SELECT DISTINCT(ANNEES.id_meuble)
                                                    FROM ANNEES
                                                    WHERE ANNEES.id_bouteille = $i;");
                        if ($statement === FALSE){
                            die('Erreur SQL');
                        }
                        
                        $result = $statement->fetchAll();
                        // echo '<pre>';
                        // var_dump($result);
                        // echo '<pre>';
                        $meubles = [];
                        foreach ($result as $key=>$el){
                            if (strlen($el[0]) > 1){
                                $current = separateur($el[0], "-");
                                foreach ($current as $m){
                                    if (!in_array($m, $meubles)){
                                        array_push($meubles, $m);
                                    }
                                }
                            }else {
                                if (!in_array($el[0], $meubles)){
                                    array_push($meubles, $el[0]);
                                }
                            }
                        }

                ?>
                <!-- <div class="wine-card <?php echo $region;?> <?php echo $cepage; ?> <?php foreach($mets as $el){ echo $el;}?>">
                    <div class="top-card">
                        <img class="main-bouteille" src="<?php echo $img; ?>" alt="bouteille-vin">
                        <img class="star" src="img/star-orange.png" alt="etoile">
                        <img class="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note"><?php echo $note_max; ?><h6>
                        <h6 class="nombre"><?php echo $nombre_max; ?></h6>
                        <h5 class="domaine"><?php echo $domaine; ?></h5>
                        <h3 class="millesime"><?php echo $millesime_max; ?></h3>
                    </div>
                    <div class="bottom-card">
                        <h3 class="appellation"><?php echo $appellation;?></h3>
                        <h5 class="cepage"><?php echo $cepage; ?></h5>
                    </div>
                </div> -->

                
                <div id="<?php echo $i?>" class="wine-card <?php echo $region;?> <?php echo $cepage; ?> <?php foreach($mets as $el){ echo $el;}?>">
                    <div class="top-card">
                        <img class="main-bouteille" src="<?php echo $img; ?>" alt="bouteille-vin">
                        <img class="star" src="img/star-orange.png" alt="etoile">
                        <img class="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note"><?php echo $note_max; ?><h6>
                        <h6 class="nombre"><?php echo $nombre_max; ?></h6>
                        <div class="all_millesime hide">
                            <!-- <div id="2000" class="infos_mill info-active">
                                <h6 class="note_big">5<h6>
                                <h6 class="nombre_big">1</h6>
                            </div>
                            <div id="2004" class="infos_mill">
                                <h6 class="note_big">4<h6>
                                <h6 class="nombre_big">1</h6>
                            </div>
                            <div id="2005" class="infos_mill">
                                <h6 class="note_big">3<h6>
                                <h6 class="nombre_big">1</h6>
                            </div> -->
                            <?php foreach ($all_millesime as $key=>$el){
                                if ($key == 0){ ?>
                                    <div id="<?php echo $el[0];?>" class="infos_mill <?php echo $el[3]; echo " ".$el[5];?>">
                                        <h6 class="note_big"><?php echo $el[2];?><h6>
                                        <h6 class="nombre_big"><?php echo $el[1];?></h6>
                                    </div>
                                <?php }else { ?>
                                    <div id="<?php echo $el[0];?>" class="infos_mill <?php echo $el[3]; echo " ".$el[5];?>">
                                        <h6 class="note_big"><?php echo $el[2];?><h6>
                                        <h6 class="nombre_big"><?php echo $el[1];?></h6>
                                    </div>
                                <?php }
                            } ?>
                        </div>
                        <h5 class="domaine"><?php echo $domaine; ?></h5>
                        <h3 class="millesime"><?php echo $millesime_max; ?></h3>
                        <div class="vol-content hide">
                            <ul class="ulvol">
                                <li  class="vol little"><a href="#25cl">25cl</a></li>
                                <li  class="vol medium"><a href="#75cl">75cl</a></li>
                                <li  class="vol large"><a href="#150cl">150cl</a></li>
                            </ul>
                        </div>
                        <div class="millesime_choice hide">
                            <button id="btn" class="dropbtn">Selectionnez année</button>
                            <div class="drop-content drop-hide">
                                <ul class="ulmill">
                                    <!-- <li class="mill"><a href="#2004">2004</a></li>
                                    <li class="mill"><a href="#2005">2005</a></li> -->
                                    <?php foreach ($mill_choice as $key=>$el){ 
                                        if ($key == 0){ ?>
                                            <li class="mill active-mill"><a href="#<?php echo $el[0]; ?>"><?php echo $el[0]; ?></a></li>
                                            <?php } else { ?>
                                        <li class="mill"><a href="#<?php echo $el[0]; ?>"><?php echo $el[0]; ?></a></li>
                                    <?php  } ?>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                        <div class="infos hide">
                            <div class="info">
                                <img src="img/regions/Bordeaux.png" alt="viande">
                                <h3><?php echo $region;?></h3>
                            </div>
                            <div class="info">
                                <img src="img/cepages/Assemblage.png" alt="viande">
                                <h3><?php echo $cepage; ?></h3>
                            </div>
                            <div class="info">
                                <img src="img/mets/Viande rouge.png" alt="viande">
                                <h3>Viandes Rouge</h3>
                            </div>
                        </div>
                        <div class="container hide">
                            <?php foreach ($meubles as $key=>$el){ ?>
                                <div class="meuble <?php echo $el; ?> <?php if (!$key == 0){echo 'hide';}; ?>">
                                    <div class="un case"></div>
                                    <div class="deux case"></div>
                                    <div class="trois case"></div>
                                    <div class="quatre case"></div>
                                    <div class="cinq case"></div>
                                    <div class="six case"></div>
                                    <div class="sept case"></div>
                                    <div class="huit case "></div>
                                    <div class="neuf case"></div>
                                    <div class="dix case"></div>
                                    <div class="onze case"></div>
                                    <div class="douze case"></div>
                                    <div class="treize case"></div>
                                    <div class="quatorze case"></div>
                                    <div class="quinze case"></div>
                                    <div class="seize case"></div>
                                    <div class="dix-sept case"></div>
                                    <div class="dix-huit case"></div>
                                    <div class="dix-neuf case"></div>
                                    <div class="vingt case"></div>
                                    <div class="vingt-un case"></div>
                                    <div class="vingt-deux case"></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="bottom-card">
                        <h5 class="domaine_bottom hide"><?php echo $domaine; ?></h5>
                        <h3 class="appellation"><?php echo $appellation;?></h3>
                        <h5 class="cepage"><?php echo $cepage; ?></h5>
                        <div class="take-button hide">
                            <button class="main-button">
                                <h1>Prendre maintenant</h1>
                            </button>
                            <input class="nb-input" type="text" placeholder="0">
                        </div>
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
