<?php

use MapasCulturais\App;

$app = App::i();

return [
    'module.EventImporter' => [
        'enabled' => function () use ($app) {
            //Agentes especificos
            $agentsPermissions = [29694, 5352, 34866, 28932, 6139,35355,40999,65009,100799,21927,9327,
                111866,114694,117511,25535,117458,54351,117447,101124,99846,105602,26250,109559,19133,
                40263,110774,119983,40179,114885,14915,36368,18630,18468,26900,36280,5960,43779,95659,
                33624,18940];
            //se for admin+ do mapa
            $admin = $app->user->is("admin");    
            if (in_array($app->getUser()->profile->id, $agentsPermissions) || $admin) {
                return true;
            }
        }
    ]
];
