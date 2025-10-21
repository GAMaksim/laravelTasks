<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_cannot_access_products(): void
    {
        $response = $this->get('/products');
        $response->assertRedirect('/login');
    }

    public function test_authenticated_users_can_view_products(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/products');
        $response->assertStatus(200);
        $response->assertSee('Products Management');
    }

    public function test_user_can_create_product(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $productData = [
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 99.99,
            'stock' => 10,
            'category' => 'Electronics',
            'is_active' => true,
        ];

        $response = $this->actingAs($user)
                         ->post('/products', $productData);

        $response->assertRedirect('/products');
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'user_id' => $user->id,
        ]);
    }

    public function test_user_can_only_edit_own_products(): void
    {
        /** @var User $user1 */
        $user1 = User::factory()->create();
        
        /** @var User $user2 */
        $user2 = User::factory()->create();

        $product = Product::factory()->create(['user_id' => $user1->id]);

        // User2 cannot edit user1's product
        $response = $this->actingAs($user2)
                         ->get("/products/{$product->id}/edit");

        $response->assertStatus(403);
    }

    public function test_user_can_delete_own_product(): void
    {
        /** @var User $user */
        $user = User::factory()->create();
        
        $product = Product::factory()->create(['user_id' => $user->id]);

        $response = $this->actingAs($user)
                         ->delete("/products/{$product->id}");

        $response->assertRedirect('/products');
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }

    public function test_product_requires_name_and_price(): void
    {
        /** @var User $user */
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->post('/products', [
                             'stock' => 10,
                         ]);

        $response->assertSessionHasErrors(['name', 'price']);
    }
}