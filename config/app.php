<?php

return [

    //Nome do projeto, como irão registrar alguns logs, emails da laravel para o projeto

    'name' => env('APP_NAME', 'Kairos'),

    /*
    Qual ambinete está rodando a aplicação

        APP_ENV=local        # desenvolvimento
        APP_ENV=production   # produção
        APP_ENV=staging      # homologação/teste
        APP_ENV=testing      # testes automatizados
    */

    'env' => env('APP_ENV', 'production'),

    //Utilizado para debugar erros, se true todos erros são exibidos detalhadamente, se false aparece na tela um erro genérico (mais seguro)

    'debug' => (bool) env('APP_DEBUG', false),

    //Url da aplicação

    'url' => env('APP_URL', 'http://localhost'),

    //Fuso horário, utilizado para trabalhar com datas e horas.

    'timezone' => 'America/Sao_Paulo',

    //Lingua da aplicação, utilizado para traduções de navegador e até de erros genéricos

    'locale' => env('APP_LOCALE', 'pt_BR'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'pt_BR'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'pt_BR'),


    //Algoritmos de criptografia

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
