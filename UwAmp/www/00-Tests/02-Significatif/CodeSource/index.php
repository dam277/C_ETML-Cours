<?php
/**
 * Damien Loup
 * 152-Multimedia
 * Test significatif
 * Date: 25.11.2022
 * Index.php file which display the web page
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Document</title>
</head>
<body>
<!-- ========= HEADER ========= -->
    <header>
        <!-- Title of the site -->
        <h1 class="center upperCase">Recette de biscuits</h1>
        <!-- Subtitle of the site -->
        <h4 class="center">
            <i>Référencement des meilleures recettes de biscuits</i>
        </h4>
    </header>
<!-- ========= MAIN ========= -->
    <main class="center">
        <!-- Container of the reciepes -->
        <div id="container">
            <!-- Center the footer and place links -->
            <input id="btnLeft" type="button" value="‹">

            <!-- Container of the reciepes -->
            <div id="reciepes">
            <!--
                # Reciepes
            -->
            </div>

            <!-- Center the footer and place links -->
            <input id="btnRight" type="button" value="›">
        </div>
    </main>
<!-- ========= FOOTER ========= -->
    <footer>
        <!-- Center the footer and place links -->
        <div class="center">
            Site pour le test du module 152 <br>
            Icons made by 
            <a href="https://www.flaticon.com/authors/good-ware">Good Ware</a> 
            from 
            <a href="https://www.flaticon.com/">www.flaticon.com</a>
        </div>
    </footer>
</body>
<!-- Call js files -->
<script src="js/ajax.js"></script>
</html>