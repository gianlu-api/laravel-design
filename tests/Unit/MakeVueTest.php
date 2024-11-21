<?php declare(strict_types=1);

use Illuminate\Support\Facades\File;

it('creates a new vue composition api component correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestVue',
        'path' => 'js/Pages',
    ];

    //Act
    $this->artisan('make:view:vue', $config)->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestVue.vue')))->toBeTrue();
});

it('creates a new vue composition api component content correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestVue',
        'path' => 'js/Pages',
    ];

    //Act
    $this->artisan('make:view:vue', $config)->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestVue.vue')))->toBeTrue();

    $expectedContent = <<<'PHP'
<script setup>

</script>

<template>

</template>

<style scoped>

</style>
PHP;

    $actualContent = file_get_contents(resource_path('js/Pages/TestVue.vue'));
    expect($actualContent)->toBe($expectedContent);
});

it('creates a new vue options api component correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestVue',
        'path' => 'js/Pages',
        '--type' => 'options',
    ];

    //Act
    $this->artisan('make:view:vue', $config)->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestVue.vue')))->toBeTrue();
});

it('creates a new vue options api component content correctly', function () {
    //Arrange
    $config = [
        'name' => 'TestVue',
        'path' => 'js/Pages',
        '--type' => 'options',
    ];

    //Act
    $this->artisan('make:view:vue', $config)->assertSuccessful();

    //Assert
    expect(File::exists(resource_path('js/Pages')))->toBeTrue()
        ->and(File::exists(resource_path('js/Pages/TestVue.vue')))->toBeTrue();

    $expectedContent = <<<'PHP'
<script>
export default {
    name: "TestVue"
}
</script>

<template>

</template>

<style scoped>

</style>
PHP;

    $actualContent = file_get_contents(resource_path('js/Pages/TestVue.vue'));
    expect($actualContent)->toBe($expectedContent);
});
