<?php


namespace App\Transformers;

use App\Models\Painting;

/**
 * Преобразовывает модель Painting в массив
 *
 * Class PaintingTransformer
 * @package App\Transformers
 */
class PaintingTransformer
{
    /**
     * Преобразовывает модель Painting в массив
     *
     * @param Painting $painting
     * @return array
     */
    public static function oneToArray(Painting $painting): array
    {
        return [
            'id'    => $painting->id,
            'title' => $painting->title,
            'description' => $painting->description,
            'author' => $painting->author,
            'creation_date' => $painting->creation_date,
            'created_at' => $painting->created_at,
            'updated_at' => $painting->updated_at
        ];
    }

    /**
     * Преобразовывает коллекцю в массив
     *
     * @param $paintings
     * @return array
     */
    public static function manyToArray($paintings) : array
    {
        $result = [];

        foreach ($paintings as $painting) {
            $result[] = self::oneToArray($painting);
        }

        return $result;
    }
}
