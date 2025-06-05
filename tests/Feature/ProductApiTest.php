<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
    }

    protected function headers($user = null)
    {
        $headers = ['Accept' => 'application/json'];

        if (!is_null($user)) {
            $token = JWTAuth::fromUser($user);
            $headers['Authorization'] = 'Bearer ' . $token;
        }

        return $headers;
    }

    public function test_can_list_products()
    {
        Product::factory()->count(5)->create();

        $response = $this->get('/api/products', $this->headers($this->user));

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'name',
                        'description',
                        'price',
                        'stock',
                        'created_at',
                        'updated_at',
                    ]
                ],
                'links',
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'links',
                    'path',
                    'per_page',
                    'to',
                    'total',
                ],
            ]);
    }

    public function test_can_show_product()
    {
        $product = Product::factory()->create();

        $response = $this->get('/api/products/' . $product->id, $this->headers($this->user));

        $response->assertStatus(200)
            ->assertJson([
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'price' => $product->price,
                'stock' => $product->stock,
            ]);
    }

    public function test_show_product_not_found()
    {
        $response = $this->get('/api/products/999', $this->headers($this->user));

        $response->assertStatus(404);
    }
}
