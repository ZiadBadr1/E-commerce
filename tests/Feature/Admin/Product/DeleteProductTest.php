<?php

namespace Tests\Feature\Admin\Product;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteProductTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_product_deleted_successfully(): void
    {
        $product = Product::factory()->create();

        $this->delete(route('products.destroy', ['product' => $product]))
            ->assertStatus(302)
            ->assertRedirect(route('products.index'));

        $this->assertDatabaseCount('products', 0);
    }
}
