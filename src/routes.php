<?php
declare(strict_types=1);

use BarkaneArts\Website\Handlers\{
    Index
};

// Routes
$app->get('/', Index::class);

$container[Index::class] = function () {
    return new Index();
};
