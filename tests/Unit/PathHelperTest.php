<?php declare(strict_types=1);

use GianluApi\LaravelDesign\Test\PathHelperWrapper;

it('adds a trailing slash', function () {
    //Act
    $path = PathHelperWrapper::addTrailingSlash('test');

    //Assert
    expect($path)->toBe('test/');
});

it('adds a leading slash', function () {
    //Act
    $path = PathHelperWrapper::addLeadingSlash('test');

    //Assert
    expect($path)->toBe('/test');
});

it('removes a trailing slash', function () {
    //Act
    $path = PathHelperWrapper::removeTrailingSlash('test/');

    //Assert
    expect($path)->toBe('test');
});

it('removes a leading slash', function () {
    //Act
    $path = PathHelperWrapper::removeLeadingSlash('/test');

    //Assert
    expect($path)->toBe('test');
});

it('substitutes variables', function () {
    //Act
    $path = PathHelperWrapper::substituteVariables('test/&', 'laravel');

    //Assert
    expect($path)->toBe('test/laravel');
});

it('checks if path is valid and correct it adding leading and trailing slash', function () {
    //Act
    $path = PathHelperWrapper::checkPath('test');

    //Assert
    expect($path)->toBe('/test/');
});

it('checks if path is valid and correct it adding leading, trailing slash and substituting variables', function () {
    //Act
    $path = PathHelperWrapper::checkPath('test/&', true, 'laravel');

    //Assert
    expect($path)->toBe('/test/laravel/');
});

it('checks if path is valid and correct it adding leading slash', function () {
    //Act
    $path = PathHelperWrapper::checkPath('test', false);

    //Assert
    expect($path)->toBe('/test');
});

it('checks if path is valid and correct it adding leading slash and substituting variables', function () {
    //Act
    $path = PathHelperWrapper::checkPath('test/&', false, 'laravel');

    //Assert
    expect($path)->toBe('/test/laravel');
});

it('checks if path is valid and correct it adding leading slash and removing trailing slash', function () {
    //Act
    $path = PathHelperWrapper::checkPath('test/', false);

    //Assert
    expect($path)->toBe('/test');
});

it('checks if path is valid and correct it adding leading slash removes trailing slash and substituting variables', function () {
    //Act
    $path = PathHelperWrapper::checkPath('test/&/', false, 'laravel');

    //Assert
    expect($path)->toBe('/test/laravel');
});

it('checks if path is valid and correct it substituting variables', function () {
    //Act
    $path = PathHelperWrapper::checkPath('test/&/&', false, 'laravel');

    //Assert
    expect($path)->toBe('/test/laravel/laravel');
});

