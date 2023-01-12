<?php

namespace Tests\Feature\Api;

use Illuminate\Testing\Fluent\AssertableJson;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class BooksControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_books_get_endpoint()
    {
        // Aqui está retornando a função do controlador
        $response = $this->getJson('api/books');
        // Aqui está confirmando se o status é 200;
        $response->assertStatus(200);
        // Aqui está confirmando o número de registros vindos do banco
        $response->assertJsonCount(5, $books = 'books');
        // Aqui está apontando para o registro e confirmando a tipagem.
        $response->assertJson(function(AssertableJson $json){
              $json -> whereType('books.1.id','integer');
              $json -> whereType('books.1.nome','string');
              $json -> whereAllType([
                'books.0.id' => 'integer',
                'books.0.nome' => 'string'
            ]);
            // Aqui está confirmando se realmente tem todos esses campos no banco.
            $json -> hasAll(['books.0.id','books.0.nome']);

            
        });
       
    }
}
