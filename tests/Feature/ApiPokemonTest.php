<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Class ApiPokemonTest
 *  Test routes and functionality of the api
 * @package Tests\Feature
 */
class ApiPokemonTest extends TestCase
{
  
  use DatabaseMigrations;
    /**
     * @test
     * @return void
     */
    public function testLoader()
    {
        $response = $this->post('/api/v1/pokemon/load', ['url' => 'http://pokeapi.co/api/v2/pokemon/?limit=99999']);
        
        $response->assertStatus(200);
        $response->assertJsonStructure(['count', 'results']);
    }
  
  /**
   * @test
   * @return void
   */
    public function testIndex()
    {
      $response = $this->get('/api/v1/pokemon/');
      $response->assertStatus(200);
    }
}
