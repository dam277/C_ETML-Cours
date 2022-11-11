<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- 
			Auteur : Cindy Hardegger
			Date : 29.11.2017
			Description : Mur de nouvelles
		-->
    <meta charset="UTF-8">
    <title>Stations de ski</title>
    <link href="dist/css/lightbox.min.css" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="dist/js/lightbox.min.js"></script>

    <script>
        $(document).ready(function() {

            $articleHidden = $("article.hidden");

            for (i = 0; i < 2; i++) {
                $($articleHidden[i]).removeClass('hidden').removeAttr('class');
                console.log();
            }

            // Permet de repérer quand on arrive au bas de la page
            $(window).scroll(function() {

                if ($(window).scrollTop() == $(document).height() - $(window).height()) {

                    $articleHidden = $("article.hidden");

                    for (i = 0; i < 2; i++) {
                        $($articleHidden[i]).removeClass('hidden').removeAttr('class');
                        console.log();
                    }
                }
            });

        });
    </script>

    <?php
    include("datas/DataBaseQuery.php");

    $db = new DataBaseQuery();
    $stations = $db->allStations();
    ?>
</head>

<body>


    <div id="header_image">
        <div id="headerBox">
            <div class="container">
                <h1>Stations de ski</h1>
                <h4>Retrouvez le meilleur des stations de ski en un clic</h4>
            </div>
        </div>
    </div>
    <div class="container flex">
        <?php
        foreach ($stations as $station) {
        ?>
            <a href="<?= $station['staLink']; ?>" target="_blank">
                <article class="hidden">
                    <header class="block">
                        <img src="<?= 'Images/Content/' . $station['staPathImage']; ?>" width="100%" height="250px">
                        <div class="title">
                            <h3><?= $station['staName']; ?></h3>
                        </div>
                    </header>
                    <div class="content">
                        <div class="slogan">
                            <?= $station['staSlogan']; ?>
                        </div>
                        <div class="text">
                            <?= $station['staText']; ?>
                        </div>
                    </div>
                    <div class="socialLink">
                        <?php if ($station['staFacebook'] == 1) {
                            echo '<span class="fa fa-facebook"></span>';
                        } ?>
                        <?php if ($station['staTwitter'] == 1) {
                            echo '<span class="fa fa-twitter"></span>';
                        } ?>
                        <?php if ($station['staInstagram'] == 1) {
                            echo '<span class="fa fa-instagram"></span>';
                        } ?>
                    </div>

                </article>
            </a>
        <?php
        }
        ?>

    </div>
    <footer>
        <div class="container">
            <span>Site pour le test du module 152</span>
        </div>
    </footer>
    <script>
            $(window).scroll(function() {
                if ($(document).scrollTop() > 75) {
                    $('#header_image').addClass('shrink');
                } else {
                    $('#header_image').removeClass('shrink');
                }
            });

           </script>
</body>

</html>