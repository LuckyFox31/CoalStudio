<?php

use App\Panel\Community\Community;

$community = new Community('test');

$test = $community->list_user();
?>
<!-- 
    HTML Front
-->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum dolores quam nostrum eos qui ipsam commodi dolorum consequuntur. Nam deserunt omnis, fugit tempora minima illo? Obcaecati quibusdam temporibus laborum fugit ipsam laudantium non at. Reiciendis eveniet amet distinctio adipisci quibusdam nemo nobis similique nulla voluptas accusantium minima, quis consequuntur impedit!</p>

<hr />

<form method="POST">
    <label>Votre Titre de jeux :
        <input type="text" name="name" >
    </label>

    <label>
        <input type="text" name="description" >
    </label>
</form>

<hr />

<h1>Jeux :</h1>
<p>
    <?php


    ?>
</p>