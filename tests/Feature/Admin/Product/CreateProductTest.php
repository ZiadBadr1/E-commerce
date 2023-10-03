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

    private Store $store;

    private Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->store = Store::factory()->create();
        $this->category = Category::factory()->create();
    }

    public function test_form_viewed_sucessfully()
    {
        $this->get(route('products.create'))
            ->assertStatus(302);
    }

    public function test_product_created_successfully(): void
    {
        $productData = [
            'name' => 'test',
            'price' => 100,
            'in_stock' => 5,
            'store_id' => $this->store->id,
            'description' => 'Test description',
            'discount_precentage' => 0,
            'category_id' => $this->category->id,
            'is_active' => 1,
        ];

        $this->withoutMiddleware()->post(route('products.store'), $productData)
            ->assertStatus(302)
            ->assertRedirect(route('products.index'));

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

        $this->withoutMiddleware()->post(route('products.store'), $productData)
            ->assertSessionHasErrors();

        $this->assertDatabaseCount('products', 0);
    }
}
