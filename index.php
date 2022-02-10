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

        <div class="plus">
            <div class="vertical barre"></div>
            <div class="horizontal barre"></div>
        </div>

        <ul class="TopNavbar">
            <li class="navbar" ><a class="js-scrollTo" href="#top">Selection</a></li>
            <li class="navbar" ><a href="inventaire.html">Inventaire</a></li>
            <li class="navbar" ><a href="test.html">Creation</a></li>
        </ul>

        
        
    </nav>

    <main>

        <?= test(); ?>
        
        <div class="layer">
            <div class="title-content" id="title">
                <h3>Mes Vins</h3>
            </div>
            <div class="content" id="content">
                <div class="straight"></div>
                <h3>Critères</h3>
                <button class="next">1/3 -></button>
                <div class="choice" id="choice">
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                    <button class="choice-button" :class="{check : valid, uncheck : !valid}" @click="check">
                        <img src="img/meatWhite.png" alt="viande">
                        <h3>Viandes Rouges</h3>
                    </button>
                </div>
            </div>
                
            <div class="result" id="result">
                <div class="wine-card">
                    <div class="top-card">
                        <img src="img/bouteille-new.png" alt="bouteille-vin">
                        <img id="star" src="img/star-orange.png" alt="etoile">
                        <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note">5</h6>
                        <h6 class="nombre">3</h6>
                        <h5>Chateau Segur</h5>
                        <h3>1994</h3>
                    </div>
                    <div class="bottom-card">
                        <h3>Haut Medoc</h3>
                        <h5>Pinot Gris</h5>
                    </div>
                </div>

                <?= wine_card(); ?>

                <!-- <div class="wine-card">
                    <div class="top-card">
                        <img src="img/bouteille-new.png" alt="bouteille-vin">
                        <img id="star" src="img/star-orange.png" alt="etoile">
                        <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note">5</h6>
                        <h6 class="nombre">3</h6>
                        <h5>Chateau Segur</h5>
                        <h3>1994</h3>
                    </div>
                    <div class="bottom-card">
                        <h3>Haut Medoc</h3>
                        <h5>Pinot Gris</h5>
                    </div>
                </div>

                <div class="wine-card">
                    <div class="top-card">
                        <img src="img/bouteille-new.png" alt="bouteille-vin">
                        <img id="star" src="img/star-orange.png" alt="etoile">
                        <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note">5</h6>
                        <h6 class="nombre">3</h6>
                        <h5>Chateau Segur</h5>
                        <h3>1994</h3>
                    </div>
                    <div class="bottom-card">
                        <h3>Haut Medoc</h3>
                        <h5>Pinot Gris</h5>
                    </div>
                </div>

                <div class="wine-card">
                    <div class="top-card">
                        <img src="img/bouteille-new.png" alt="bouteille-vin">
                        <img id="star" src="img/star-orange.png" alt="etoile">
                        <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note">5</h6>
                        <h6 class="nombre">3</h6>
                        <h5>Chateau Segur</h5>
                        <h3>1994</h3>
                    </div>
                    <div class="bottom-card">
                        <h3>Haut Medoc</h3>
                        <h5>Pinot Gris</h5>
                    </div>
                </div>

                <div class="wine-card">
                    <div class="top-card">
                        <img src="img/bouteille-new.png" alt="bouteille-vin">
                        <img id="star" src="img/star-orange.png" alt="etoile">
                        <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note">5</h6>
                        <h6 class="nombre">3</h6>
                        <h5>Chateau Segur</h5>
                        <h3>1994</h3>
                    </div>
                    <div class="bottom-card">
                        <h3>Haut Medoc</h3>
                        <h5>Pinot Gris</h5>
                    </div>
                </div>

                <div class="wine-card">
                    <div class="top-card">
                        <img src="img/bouteille-new.png" alt="bouteille-vin">
                        <img id="star" src="img/star-orange.png" alt="etoile">
                        <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note">5</h6>
                        <h6 class="nombre">3</h6>
                        <h5>Chateau Segur</h5>
                        <h3>1994</h3>
                    </div>
                    <div class="bottom-card">
                        <h3>Haut Medoc</h3>
                        <h5>Pinot Gris</h5>
                    </div>
                </div>

                <div class="wine-card">
                    <div class="top-card">
                        <img src="img/bouteille-new.png" alt="bouteille-vin">
                        <img id="star" src="img/star-orange.png" alt="etoile">
                        <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note">5</h6>
                        <h6 class="nombre">3</h6>
                        <h5>Chateau Segur</h5>
                        <h3>1994</h3>
                    </div>
                    <div class="bottom-card">
                        <h3>Haut Medoc</h3>
                        <h5>Pinot Gris</h5>
                    </div>
                </div>

                <div class="wine-card">
                    <div class="top-card">
                        <img src="img/bouteille-new.png" alt="bouteille-vin">
                        <img id="star" src="img/star-orange.png" alt="etoile">
                        <img id="bouteille" src="img/bouteille2.png" alt="img-bouteille">
                        <h6 class="note">5</h6>
                        <h6 class="nombre">3</h6>
                        <h5>Chateau Segur</h5>
                        <h3>1994</h3>
                    </div>
                    <div class="bottom-card">
                        <h3>Haut Medoc</h3>
                        <h5>Pinot Gris</h5>
                    </div>
                </div> -->

                

            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="mainIndex.js"></script>

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
