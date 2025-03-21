<?php declare( strict_types=1 );

use gianluApi\laravelDesign\Commands\Selectors\CommandSelector;
use gianluApi\laravelDesign\ConfigGenerator\Enums\GeneratorTypes;

it('returns migration command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::Migration);

    //Assert
    expect($command)->toBe("make:migration");
});

it('returns class command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::CustomClass);

    //Assert
    expect($command)->toBe("design:class");
});

it('returns abstract class command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::AbstractClass);

    //Assert
    expect($command)->toBe("design:class:abstract");
});

it('returns interface command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::Interface);

    //Assert
    expect($command)->toBe("design:interface");
});

it('returns model command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::Model);

    //Assert
    expect($command)->toBe("make:model");
});

it('returns controller command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::Controller);

    //Assert
    expect($command)->toBe("design:controller");
});

it('returns request command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::Request);

    //Assert
    expect($command)->toBe("design:request");
});

it('returns resource command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::Resource);

    //Assert
    expect($command)->toBe("design:resource");
});

it('returns middleware command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::Middleware);

    //Assert
    expect($command)->toBe("design:middleware");
});

it('returns view command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::Blade);

    //Assert
    expect($command)->toBe("make:view");
});

it('returns vue command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::Vue);

    //Assert
    expect($command)->toBe("design:view:vue");
});

it('returns react command correctly', function () {
    //Act
    $command = CommandSelector::handle(GeneratorTypes::React);

    //Assert
    expect($command)->toBe("design:view:react");
});
