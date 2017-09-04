<?php
declare(strict_types=1);

use BarkaneArts\Website\Handlers\{
    Index,
    CustomUserHomepage
};

// Routes
$app->get('/~{user}[/{extra:.*}]', CustomUserHomepage::class);
$app->get('/', Index::class);

$container[Index::class] = function () {
    return new Index();
};
$container[CustomUserHomepage::class] = function () {
    return new CustomUserHomepage();
};
