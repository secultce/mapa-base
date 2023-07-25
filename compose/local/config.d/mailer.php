<?php
use \MapasCulturais\i;

return [
    'mailer.user'       => '',
    'mailer.psw'        => '',
    'mailer.protocol'   => '',
    'mailer.server'     => 'mailhog',
    'mailer.port'       => '1025',
    'mailer.from'       => 'mapas@local',

    // se quiser redirecionar o envio de todos os emails para um mesmo endereço
    'mailer.alwaysTo'   => false,
    'mailer.templates' => [
        'welcome' => [
            'title' => i::__("Bem-vindo(a) ao Mapas Culturais"),
            'template' => 'welcome.html'
        ], 
        'start_registration' => [
            'title' => i::__("Inscrição iniciada"),
            'template' => 'start_registration.html'
        ],
        'send_registration' => [
            'title' => i::__("Inscrição enviada"),
            'template' => 'send_registration.html'
        ],
    ]
];