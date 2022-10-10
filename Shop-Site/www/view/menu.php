<nav>
    <ul class="nav nav-justified">
        <li><a href="index.php?controller=shop&action=list">Shop</a></li>
        <li>
            <a href="index.php?controller=basket&action=list">Panier 
                <?php
                    // Check if the total price is set
                    if (isset($_SESSION["totalPrice"])) 
                    {
                        // Check if the total price is upper than 0 and display it
                        if ($_SESSION["totalPrice"] > 0)
                        {
                            echo "(" . $_SESSION["totalPrice"] . ")";
                        }
                    }
                ?>
            </a>
        </li>
        <?php
        if(isset($_SESSION['right']) && $_SESSION['right'] == 'admin'){
        ?>
            <li><a href="index.php?controller=admin&action=index">Gestion des articles</a></li>
            <li><a href="index.php?controller=admin&action=listUsers&field=useLogin">Gestion des utilisateurs</a></li>
        <?php
        }
        ?>
        <li><a href="index.php?controller=profile&action=list">Profil</a></li>
        <li><a href="index.php?controller=home&action=contact">Contact</a></li>
        <?php
        if(isset($_SESSION['right']) && ($_SESSION['right'] == 'admin' || $_SESSION['right'] == 'customer')){
        ?>
            <li><a href="index.php?controller=login&action=logout">Se déconnecter</a></li>
        <?php
        } else {
        ?>
            <li><a href="index.php?controller=login&action=index">Se connecter</a></li>
        <?php
        }
        ?>
    </ul>
</nav>
</div>


