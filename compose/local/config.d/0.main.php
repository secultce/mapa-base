<?php
$_ENV['APP_MODE'] = 'development';
$__process_assets = false;

return [
    'app.verifiedSealsIds' => '1',
    'cep.token' => '1a61e4d00bf9c6a85e3b696ef7014372',
    
    'slim.debug' => true,

    'app.mode' => $_ENV['APP_MODE'],

    // deixe true somente se estiver trabalhando nos mapeamentos das entidades
    'doctrine.isDev' => false, 

    /* ASSET MANAGER */
    'themes.assetManager' => new \MapasCulturais\AssetManagers\FileSystem([
        'publishPath' => BASE_PATH . 'assets/',

        'mergeScripts' => $__process_assets,
        'mergeStyles' => $__process_assets,

        'process.js' => !$__process_assets ?
                'cp {IN} {OUT}':
                'terser {IN} --source-map --output {OUT} ',

        'process.css' => !$__process_assets ?
                'cp {IN} {OUT}':
                'uglifycss {IN} > {OUT}',

        'publishFolderCommand' => 'cp -R {IN} {PUBLISH_PATH}{FILENAME}'
    ]),
];