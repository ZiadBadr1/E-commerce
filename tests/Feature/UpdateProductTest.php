<?php

use App\Models\User;
use App\Models\Product;

test('can show update form', function () {
    $product = Product::factory()->create();

    $this->actingAs(User::factory()->create(['type' => 'admin']))->get(route('products.edit', ['product' => $product]))
        ->assertStatus(200);
});

test('cannot show update form for non admin user', function () {
    $product = Product::factory()->create();

    $this->get(route('products.edit', ['product' => $product]))
        ->assertStatus(401);
});

