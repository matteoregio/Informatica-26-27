<?php

require '../vendor/autoload.php';

use League\Plates\Engine;

$template = new Engine('../templates', 'tpl');

$persone = \Model\PeopleRepository::getPeople();

echo $template->render('schede',
    [
        'titolo' => 'Informatici famosi',
        'persone' => $persone
    ]
);
