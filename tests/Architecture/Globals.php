<?php declare(strict_types=1);

arch('globals')
    ->expect(['dd', 'dump', 'die', 'echo', 'print_r', 'var_dump'])
    ->not
    ->toBeUsed();

arch('src')
    ->expect('Commands')
    ->expect('Providers')
    ->expect('Caller')
    ->toUseStrictTypes();

arch('tests')
    ->expect('Unit')
    ->expect('Feature')
    ->expect('Architecture')
    ->toUseStrictTypes();