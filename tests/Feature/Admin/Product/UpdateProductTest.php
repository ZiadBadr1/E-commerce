<?php

namespace Tests\Feature\Admin\Product;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */

    public function test_can_show_update_form()
    {
        $product = Product::factory()->create();

        $this->withoutMiddleware()->get(route('products.edit', ['product' => $product]))
            ->assertStatus(302);
    }

    public function test_can_update_a_product(): void
    {
        $product = Product::factory()->create();

        $updatedData = [
            'name' => 'Updated Product Name',
            'description' => 'Updated Product Description',
        ];

        $this->withoutMiddleware()->patch(route('products.update', ['product' => $product]), $updatedData)
        ->assertStatus(302)
        ->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', $updatedData);

    }
}
