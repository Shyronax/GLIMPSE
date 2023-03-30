<nav class="nav">
    <div class="hamburger">
        <div class="bar">——</div>
        <div class="bar">——</div>
        <div class="bar">——</div>
    </div>
    <a href="controller.php?page=home" class="nav__logo-link">
        <img src="src/img/logo.png" alt="Retour à l'accueil" class="nav__logo-img">
        <p class="nav__logo-name">Mille cultures, une origine</p>
    </a>
    <div class="nav__group">
        <ul class="nav__menu">
            <li class="nav__menu-item"><a href="controller.php?page=exhibition" class="nav__menu-item-link">L'exposition</a></li>
            <li class="nav__menu-item"><a href="controller.php?page=visit" class="nav__menu-item-link">Visiter</a></li>
            <li class="nav__menu-item"><a href="controller.php?page=about" class="nav__menu-item-link">Notre histoire</a></li>
        </ul>
        <div class="nav__buttons">
            <?php
            if(isset($_SESSION['id'])){
                echo("<a href='controller.php?page=account' class='btn btn--tertiary btn-login'>Mon compte</a>");
            } else {
                echo("<a href='controller.php?page=connection&prev=".$_GET['page']."' class='btn btn--tertiary btn-login'>Se connecter</a>");
            }
            ?>
            <a href="controller.php?page=booking1" class="btn btn--primary">
                <p class="btn__text">Réserver</p>
                <i class="fa-solid fa-arrow-right btn__icon"></i>
            </a>
        </div>
    </div>
</nav>