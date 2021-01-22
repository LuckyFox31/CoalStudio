<!-- META -->
<?php function meta() {
    echo '
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="CoalStudio est un collectif de diverses personnalités orientées majoritairement dans le domaine de la création de Jeux-Vidéos mais pas que, nous réalisons divers projets dans plusieurs branches liés à l\'informatique et à la programmation. Nous avons fondé une communauté sur Discord en 2018 permettant l\'apprentissage de la programmation de manière simple et ludique.">
    <meta property="og:title" content="CoalStudio - Collectif de developpeurs de Jeux-Vidéos depuis 2018.">
    <meta property="og:site_name" content="CoalStudio">
    <meta property="og:description" content="CoalStudio est un collectif de diverses personnalités orientées majoritairement dans le domaine de la création de Jeux-Vidéos mais pas que, nous réalisons divers projets dans plusieurs branches liés à l\'informatique et à la programmation. Nous avons fondé une communauté sur Discord en 2018 permettant l\'apprentissage de la programmation de manière simple et ludique.">
    <meta property="og:image" content="https://coalstudio.fr/assets/img/head/opengraph/index/index-opengraph.png">
    <meta property="og:image:alt" content="Découvrez CoalStudio, un collectif de developpeurs orienté dans le domaine des Jeux-Vidéos mais pas que !">
    <meta property="og:url" content="https://coalstudio.fr">
    <meta name="twitter:card" content="summary_large_image">
    ';
} ?>


<!-- SCRIPT/CSS -->
<?php
function script() {
    echo '
    <script src="public/node_modules/jquery/dist/jquery.min.js" defer></script>
    <script src="public/node_modules/@popperjs/core/dist/umd/popper.min.js" defer></script>
    <script src="public/node_modules/bootstrap/dist/js/bootstrap.min.js" defer></script>
    ';
}
?>



<!-- ICON -->
<?php
function icon() {
    echo '
    <link rel="icon" type="image/png" href="public/assets/img/head/favicon/icon.png" />
    ';
}
?>


<!-- NAVBAR -->
<?php function navbar() {
    echo '
    <header>
        <nav class="fixed-top navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand ml-xl-5" href="https://coalstudio.fr">CoalStudio</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="#navbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-grow-1 text-right" id="navbar">
                    <ul class="navbar-nav ml-auto flex-nowrap text-center pr-xl-5">
                     
                        <li class="nav-item pr-2"><a class="nav-link" href="https://coalstudio.fr">Accueil</a></li>
                        <li class="nav-item pr-2"><a class="nav-link" href="games">Jeux</a></li>
                        <li class="nav-item pr-2"><a class="nav-link" href="https://discord.gg/XDvp96e" target="_blank">Discord</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    ';
} ?>