<?php 
require 'header.php'; 
require_once 'fonctions.php';
?>

<body>

    <div class="toTop" id="top">
        
    </div>

    <nav>

        <div class="plus">
            <div class="vertical barre"></div>
            <div class="horizontal barre"></div>
        </div>

        <ul class="TopNavbar">
            <li class="navbar" ><a href="index.php">Selection</a></li>
            <li class="navbar" ><a href="#top">Inventaire</a></li>
            <li class="navbar" ><a href="test.html">Creation</a></li>
        </ul>

        
        
    </nav>

    <div class="layer">
        <div class="result" id="result">
            <?= wine_card(); ?>
        </div>
    </div>


</body>