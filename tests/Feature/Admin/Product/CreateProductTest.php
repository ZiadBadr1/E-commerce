<?php

namespace Tests\Feature\Admin\Product;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    // todo assertion on views

    private Store $store;

    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->store = Store::factory()->create();
        $this->category = Category::factory()->create();
    }

    public function test_product_created_successfully(): void
    {
        $productData = [
            'name' => 'test',
            'price' => 100,
            'in_stock' => 5,
            'store_id' => $this->store->id,
            'category_id' => $this->category->id,
            'is_active' => 1,
        ];

        $response = $this->withoutMiddleware()->post(route('products.store'), $productData);

        $response->assertStatus(200);
        $this->assertDatabaseCount('products', 1);
    }

    public function test_validation_works()
    {
        $productData = [
            'name' => 'test',
            'price' => 100,
            'store_id' => $this->store->id,
            'is_active' => 1,
        ];

        $response = $this->withoutMiddleware()->post(route('products.store'), $productData);

        $response->assertSessionHasErrors();

        $this->assertDatabaseCount('products', 0);
    }
}