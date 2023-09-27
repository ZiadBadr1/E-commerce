<?php

namespace Tests\Feature\Admin\Product;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_can_show_update_form()
    {
        $product = Product::factory()->create();

        $this->get(route('products.edit', ['product' => $product]))
            ->assertStatus(200);
    }

    public function test_can_update_a_product(): void
    {
        $product = Product::factory()->create();

        $updatedData = [
            'name' => 'Updated Product Name',
            'description' => 'Updated Product Description',
        ];

        $this->put(route('products.update', ['product' => $product]), $updatedData)
            ->assertStatus(302)
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseHas('products', $updatedData);

    }
}
