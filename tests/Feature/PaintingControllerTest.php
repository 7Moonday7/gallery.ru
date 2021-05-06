<?php

namespace Tests\Feature;

use App\Models\Painting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PaintingControllerTest extends TestCase
{
    /**
     * Тест на добавление новой картины
     */

    public function testNewPainting()
    {
        /** @var Painting $painting */
        $painting = Painting::factory()->makeOne();

        $response = $this->postJson( 'api/painting/store', [
            'title'         => $painting->title,
            'description'   => $painting->description,
            'author'        => $painting->author,
            'creation_date' => $painting->creation_date
        ]);

        $response->assertStatus(201)->assertJson([
            "data" => [
                'title'         => $painting->title,
                'description'   => $painting->description,
                'author'        => $painting->author,
                'creation_date' => $painting->creation_date
            ]]);

        $this->assertDatabaseHas('paintings', $painting->attributesToArray());
    }

    /**
     * Получение картины
     */
    public function testGetPainting()
    {
        /** @var Painting $painting */
        $painting = Painting::factory()->createOne();

        $response = $this->getJson( 'api/painting/' . $painting->id);
        $response->assertStatus(200)->assertJson([
            "data" => [
                'title'         => $painting->title,
                'description'   => $painting->description,
                'author'        => $painting->author,
                'creation_date' => $painting->creation_date
            ]]);
    }

    /**
     * Тест удаления данных о картине
     */
    public function testDeletePainting()
    {
        $painting = Painting::factory()->createOne();

        $response = $this->deleteJson('api/painting/' . $painting->id . '/delete');

        $response->assertStatus(200);

        $this->assertDatabaseMissing('paintings', $painting->attributesToArray());
    }

    /**
     * Тест изменения данных картины
     */

    public function testUpdatePainting()
    {
        /** @var Painting $painting */
        $painting_old = Painting::factory()->createOne();
        $painting = Painting::factory()->makeOne();

        $response = $this->patchJson( 'api/painting/' . $painting_old->id . '/update', [
            'title'         => $painting->title,
            'description'   => $painting->description,
            'author'        => $painting->author,
            'creation_date' => $painting->creation_date,
        ]);

        $response->assertStatus(200)->assertJson([
            "data" => [
                'title'         => $painting->title,
                'description'   => $painting->description,
                'author'        => $painting->author,
                'creation_date' => $painting->creation_date
            ]]);

        $this->assertDatabaseHas('paintings', $painting->attributesToArray());
        $this->assertDatabaseMissing('paintings', $painting_old->attributesToArray());
    }
}
