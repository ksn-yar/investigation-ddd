<?php

declare(strict_types=1);

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return static function (RoutingConfigurator $routingConfigurator): void {
    $routingConfigurator->import([
        'path' => '../src/SpaceMarine/Infrastructure/Controller/',
        'namespace' => 'App\SpaceMarine\Infrastructure\Controller',
    ], 'attribute');
};
