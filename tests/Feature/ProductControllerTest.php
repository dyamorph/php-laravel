<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $response = $this->get(route('product.index'));

        $response->assertStatus(200)
            ->assertViewIs('admin.products.index')
            ->assertViewHas('products');
    }

    public function testCreate()
    {
        $response = $this->get(route('product.create'));

        $response->assertStatus(200)
            ->assertViewIs('admin.products.create');
    }

    public function testStore()
    {
        $productData = [
            'title' => 'Test Product',
            'description' => 'This is a test product',
            'manufacturer' => 'Test Manufacturer',
            'release_date' => '2023-08-31',
            'price' => 100,
        ];

        $response = $this->post(route('product.store'), $productData);

        $this->assertDatabaseHas('products', $productData);

        $response->assertStatus(302)
            ->assertRedirect(route('product.index'));
    }

    public function testShow()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.show', $product->id));

        $response->assertStatus(200)
            ->assertViewIs('admin.products.show')
            ->assertViewHas('product', $product);
    }

    public function testEdit()
    {
        $product = Product::factory()->create();

        $response = $this->get(route('product.edit', $product->id));

        $response->assertStatus(200)
            ->assertViewIs('admin.products.edit')
            ->assertViewHas('product', $product);
    }

    public function testUpdate()
    {
        $product = Product::factory()->create();
        $newData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'manufacturer' => 'Updated Manufacturer',
            'release_date' => '2023-08-31',
            'price' => 200.00,
        ];

        $response = $this->put(route('product.update', $product->id), $newData);

        $this->assertDatabaseHas('products', $newData);

        $response->assertStatus(302)
            ->assertRedirect(route('product.show', $product->id));
    }

    public function testDestroy()
    {
        $product = Product::factory()->create();

        $response = $this->delete(route('product.destroy', $product->id));

        $this->assertDatabaseMissing('products', ['id' => $product->id]);

        $response->assertStatus(302)
            ->assertRedirect(route('product.index'));
    }
}
