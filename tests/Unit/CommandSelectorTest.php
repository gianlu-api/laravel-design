<?php declare(strict_types=1);

use gianluApi\laravelDesign\Commands\Selectors\CommandSelector;
use gianluApi\laravelDesign\Types\Enums\Types;

it('returns migration command correctly', function () {
   //Act
    $command = CommandSelector::handle(Types::Migration);

    //Assert
    expect($command)->toBe("make:migration");
});

it('returns class command correctly', function () {
    //Act
    $command = CommandSelector::handle(Types::CustomClass);

    //Assert
    expect($command)->toBe("make:class");
});

it('returns abstract class command correctly', function () {
    //Act
    $command = CommandSelector::handle(Types::AbstractClass);

    //Assert
    expect($command)->toBe("make:class:abstract");
});

it('returns interface command correctly', function () {
    //Act
    $command = CommandSelector::handle(Types::Interface);

    //Assert
    expect($command)->toBe("make:interface");
});

it('returns model command correctly', function () {
    //Act
    $command = CommandSelector::handle(Types::Model);

    //Assert
    expect($command)->toBe("make:model");
});

it('returns controller command correctly', function () {
    //Act
    $command = CommandSelector::handle(Types::Controller);

    //Assert
    expect($command)->toBe("make:controller");
});

it('returns request command correctly', function () {
    //Act
    $command = CommandSelector::handle(Types::Request);

    //Assert
    expect($command)->toBe("make:request");
});

it('returns resource command correctly', function () {
    //Act
    $command = CommandSelector::handle(Types::Resource);

    //Assert
    expect($command)->toBe("make:resource");
});

it('returns middleware command correctly', function () {
    //Act
    $command = CommandSelector::handle(Types::Middleware);

    //Assert
    expect($command)->toBe("make:middleware");
});

it('returns view command correctly', function () {
    //Act
    $command = CommandSelector::handle(Types::Blade);

    //Assert
    expect($command)->toBe("make:view");
});

it('returns vue command correctly', function () {
    //Act
    $command = CommandSelector::handle(Types::Vue);

    //Assert
    expect($command)->toBe("make:vue");
});

it('returns react command correctly', function () {
    //Act
    $command = CommandSelector::handle(Types::React);

    //Assert
    expect($command)->toBe("make:react");
});
