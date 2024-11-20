<?php declare(strict_types=1);

arch('globals')
    ->expect(['dd', 'dump', 'die', 'echo', 'print_r', 'var_dump'])
    ->not
    ->toBeUsed()
    ->and(['src', 'tests'])
    ->toUseStrictTypes();

arch('src')
    ->expect('Commands\Console')
    ->toHaveSuffix('Command');
