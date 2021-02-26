<?php

use App\Controlleurs\HVFPControlleur;

$hvfp = new HVFPControlleur;

$html_file = file_get_contents(ROOT . 'view/html/index/games.html');

$html_file = $hvfp->parser($html_file, '{active}', 'active');
$html_file = $hvfp->parser($html_file, '{games}', 'games');

echo $html_file;