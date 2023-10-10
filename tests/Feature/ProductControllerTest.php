<?php

namespace Tests\Feature;

use App\Http\Middleware\Authenticate;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $this->withoutMiddleware([Authenticate::class]);

        $response = $this->get(route('products.index'));

        $response->assertStatus(200)
            ->assertViewIs('admin.products.index')
            ->assertViewHas('products');
    }

    public function testCreate()
    {
        $this->withoutMiddleware([Authenticate::class]);
        $response = $this->get(route('products.create'));

        $response->assertStatus(200)
            ->assertViewIs('admin.products.create');
    }

    public function testStore()
    {
        $this->withoutMiddleware([Authenticate::class]);

        $productData = [
            'title' => 'Test Product',
            'description' => 'This is a test product',
            'manufacturer' => 'Test Manufacturer',
            'release_date' => '2023-08-31',
            'price' => 100,
        ];

        $response = $this->post(route('products.store'), $productData);

        $this->assertDatabaseHas('products', $productData);

        $response->assertStatus(302)
            ->assertRedirect(route('products.index'));
    }

    public function testShow()
    {
        $this->withoutMiddleware([Authenticate::class]);

        $product = Product::factory()->create();

        $response = $this->get(route('products.show', $product->id));

        $response->assertStatus(200)
            ->assertViewIs('admin.products.show')
            ->assertViewHas('product', $product);
    }

    public function testEdit()
    {
        $this->withoutMiddleware([Authenticate::class]);

        $product = Product::factory()->create();

        $response = $this->get(route('products.edit', $product->id));

        $response->assertStatus(200)
            ->assertViewIs('admin.products.edit')
            ->assertViewHas('product', $product);
    }

    public function testUpdate()
    {
        $this->withoutMiddleware([Authenticate::class]);

        $product = Product::factory()->create();
        $newData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'manufacturer' => 'Updated Manufacturer',
            'release_date' => '2023-08-31',
            'price' => 200.00,
        ];

        $response = $this->put(route('products.update', $product->id), $newData);

        $this->assertDatabaseHas('products', $newData);

        $response->assertStatus(302)
            ->assertRedirect(route('products.show', $product->id));
    }

    public function testDestroy()
    {
        $this->withoutMiddleware([Authenticate::class]);

        $product = Product::factory()->create();

        $response = $this->delete(route('products.destroy', $product->id));

        $this->assertDatabaseMissing('products', ['id' => $product->id]);

        $response->assertStatus(302)
            ->assertRedirect(route('products.index'));
    }
}
