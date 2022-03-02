<?php 
require 'header.php'; 
require_once 'fonctions.php';
?>
<body>
  
    <!-- <header class="header">
        <h1>Bienvenue a la cave de Laurent</h1>
    </header> -->

    <!-- Changement test de github -->
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
                <ul class="next">
                    <li class="nav_criteres" ><a class="js-scrollTo" href="#top">Mets</a></li>
                    <li class="nav_criteres" ><a href="inventaire.php">Regions</a></li>
                    <li class="nav_criteres" ><a href="test.html">Millesime</a></li>
                    <li class="nav_criteres" ><a href="test.html">Cepages</a></li>
                </ul>
                <div class="choice" id="choice">
                    <!-- <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button> -->
                    <?= critere_mets(); ?>
                    <?= critere_mets(); ?>
                    <?php echo $test; ?>
                </div>
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

                <?= wine_card(); ?>

                

            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="mainIndex.js"></script>
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
