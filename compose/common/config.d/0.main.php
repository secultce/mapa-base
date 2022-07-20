<?php

use MapasCulturais\i;

date_default_timezone_set('America/Fortaleza');

$base_domain = @$_SERVER['HTTP_HOST'];
$base_url = 'https://' . $base_domain . '/';

return [
    'app.siteName' => env('SITE_NAME', 'Mapa Cultural do Ceará'),
    'app.siteDescription' => env('SITE_DESCRIPTION', "O Mapa Cultural do Ceará é a plataforma livre, gratuita e colaborativa de mapeamento da Secretaria da Cultura do Estado do Ceará sobre cenário cultural cearense. Ficou mais fácil se programar para conhecer as opções culturais que as cidades cearenses oferecem: shows musicais, espetáculos teatrais, sessões de cinema, saraus, entre outras. Além de conferir a agenda de eventos, você também pode colaborar na gestão da cultura do estado: basta criar seu perfil de agente cultural. A partir deste cadastro, fica mais fácil participar dos editais e programas da Secretaria e também divulgar seus eventos, espaços ou projetos."),

    'themes.active' => env('ACTIVE_THEME', 'Ceara'),

    'app.lcode' => env('APP_LCODE', 'pt_BR'),

    'app.enabled.apps' => false,
        
    ## Esse módulo é para configurar a funcionalidade de denúncia e/ou sugestões
    'google-recaptcha-sitekey' => env('GOOGLE_RECAPTCHA_SITEKEY', ''),
    'google-recaptcha-secret' => env('GOOGLE_RECAPTCHA_SECRET', ''),

    'namespaces' => array(
        'MapasCulturais\Themes' => THEMES_PATH,
        'Ceara' => THEMES_PATH . '/Ceara/',
        'Subsite' => THEMES_PATH . '/Subsite/'
    ),

    'module.CompliantSuggestion' => [
        'compliant' => true,
        'compliantUrl' => 'https://cearatransparente.ce.gov.br/portal-da-transparencia/ouvidoria',
        'suggestion' => true,

    ],
];
