<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Set\SymfonySetList;

return static function (RectorConfig $config): void {
    $config->paths([
        __DIR__ . '/src',
        __DIR__ . '/tests'
    ]);

    $config->sets([
        SetList::CODE_QUALITY,
        SetList::PHP_74,
        SymfonySetList::SYMFONY_44,
        SymfonySetList::SYMFONY_54,
        SymfonySetList::SYMFONY_CODE_QUALITY,
    ]);
    $config->importNames();
    $config->importShortClasses();
};

