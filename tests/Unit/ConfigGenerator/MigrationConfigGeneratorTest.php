<?php declare(strict_types=1);

use gianluApi\laravelDesign\ConfigGenerator\MigrationConfigGenerator;

$migrationGenerator = null;

beforeAll(function () use (&$migrationGenerator) {
    $migrationGenerator = app(MigrationConfigGenerator::class);
});

it("generates a migration config with correctly", function () use (&$migrationGenerator) {
    //Arrange
    $config = [
        "tables" => ["Migration"]
    ];

    //Act
    $config = $migrationGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "create_migration_table",
            "--create" => "migration",
        ]
    ]);
});

it("generates a migration config and name correctly", function () use (&$migrationGenerator) {
    //Arrange
    $config = [
        "tables" => ["&"]
    ];

    //Act
    $config = $migrationGenerator->generate($config, 'Migration');

    //Assert
    expect($config)->toBe([
        [
            "name" => "create_migration_table",
            "--create" => "migration",
        ]
    ]);
});

it("generates a migration config from tables array correctly", function () use (&$migrationGenerator) {
    //Arrange
    $config = [
        "tables" => ["Migration", "Migration2"],
    ];

    //Act
    $config = $migrationGenerator->generate($config);

    //Assert
    expect($config)->toBe([
        [
            "name" => "create_migration_table",
            "--create" => "migration",
        ],
        [
            "name" => "create_migration2_table",
            "--create" => "migration2",
        ]
    ]);
});
