<?php

use App\Models\President;
use App\Models\PresidentFact;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class PresidentControllerTest extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        // Create a user for authentication
        $this->user = User::factory()->create();
    }

    /**
     * Test the index method
     *
     * @return void
     */
    public function test_index()
    {
        President::factory()->count(3)->create();

        $response = $this->actingAs($this->user, 'sanctum')->getJson('/api/presidents');

        $response->assertStatus(200)
            ->assertJsonStructure([
                '*' => [
                    'id', 'name', 'created_at', 'updated_at', 'facts'
                ]
            ]);
    }

    /**
     * Test the store method
     *
     * @return void
     */
    public function test_store()
    {
        $data = [
            'name' => 'John doe',
            'birth_date' => '2004-02-27',
            'death_date' => null,
            'party' => 'PVV',
            'term_start_year' => '1555',
            'term_end_year' => null,
        ];

        $response = $this->actingAs($this->user, 'sanctum')->postJson('/api/presidents', $data);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'id',
                    'name',
                    'birth_date',
                    'death_date',
                    'party',
                    'term_start_year',
                    'term_end_year',
                    'created_at',
                    'updated_at',
                ]
            ])
            ->assertJson([
                'success' => true,
                'message' => 'President created successfully',
                'data' => [
                    'name' => 'John doe',
                    'birth_date' => '2004-02-27',
                    'death_date' => null,
                    'party' => 'PVV',
                    'term_start_year' => '1555',
                    'term_end_year' => null,
                ]
            ]);

        $this->assertDatabaseHas('presidents', $data);
    }




    /**
     * Test the show method
     *
     * @return void
     */
    public function test_show()
    {
        $president = President::factory()->create();
        PresidentFact::factory()->count(3)->create(['president_id' => $president->id]);

        $response = $this->actingAs($this->user, 'sanctum')->getJson('/api/presidents/' . $president->id);

        $response->assertStatus(200)
            ->assertJson([
                'id' => $president->id,
                'name' => $president->name,
                'facts' => $president->facts->toArray()
            ]);
    }

    /**
     * Test the update method
     *
     * @return void
     */
    public function test_update()
    {
        $president = President::factory()->create();
        $data = [
            'name' => 'Updated President'
        ];

        $response = $this->actingAs($this->user, 'sanctum')->putJson('/api/presidents/' . $president->id, $data);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'President updated successfully',
                'data' => [
                    'id' => $president->id,
                    'name' => 'Updated President',
                    'created_at' => $president->created_at->toISOString(),
                    'updated_at' => $president->updated_at->toISOString()
                ]
            ]);

        $this->assertDatabaseHas('presidents', $data);
    }

    /**
     * Test the destroy method
     *
     * @return void
     */
    public function test_destroy()
    {
        $president = President::factory()->create();

        $response = $this->actingAs($this->user, 'sanctum')->deleteJson('/api/presidents/' . $president->id);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => 'President deleted successfully'
            ]);

        $this->assertDatabaseMissing('presidents', ['id' => $president->id]);
    }
}
