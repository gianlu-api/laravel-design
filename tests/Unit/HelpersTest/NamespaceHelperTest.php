<?php declare(strict_types=1);

use GianluApi\LaravelDesign\Test\NamespaceHelperWrapper;

it('returns namespace correctly', function () {
    //Act
    $namespace = NamespaceHelperWrapper::checkNamespace('Test\TestClass');

    //Assert
    expect($namespace)->toBe('Test');
});

it('returns custom namespace correctly', function () {
    //Act
    $namespace = NamespaceHelperWrapper::checkNamespace('App\Http\Controllers..\..\Http\Controllers\Test\TestClass');

    //Assert
    expect($namespace)->toBe('App\Http\Controllers\Test');
});

it('returns className correctly', function () {
    //Act
    $namespace = NamespaceHelperWrapper::checkClassName('TestClass');

    //Assert
    expect($namespace)->toBe('TestClass');
});

it('returns custom className correctly', function () {
    //Act
    $namespace = NamespaceHelperWrapper::checkClassName('App\Http\Controllers..\..\Http\Controllers\Test\TestClass');

    //Assert
    expect($namespace)->toBe('TestClass');
});

it('returns namespace for class build correctly', function () {
    //Act
    $namespace = NamespaceHelperWrapper::checkNamespaceForClassBuild('Test\TestClass');

    //Assert
    expect($namespace)->toBe('Test\TestClass');
});

it('returns custom namespace  for class build correctly', function () {
    //Act
    $namespace = NamespaceHelperWrapper::checkNamespaceForClassBuild('App\Http\Controllers..\..\Http\Controllers\Test');

    //Assert
    expect($namespace)->toBe('App\Http\Controllers\Test');
});
