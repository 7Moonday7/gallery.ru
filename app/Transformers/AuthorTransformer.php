<?php


namespace App\Transformers;

use App\Models\Author;

/**
 * Преобразовывает модель Author в массив
 *
 * Class AuthorTransformer
 * @package App\Transformers
 */
class AuthorTransformer
{
    /**
     * Преобразовывает модель Author в массив
     *
     * @param Author $author
     * @return array
     */
    public static function oneToArray(Author $author): array
    {
        return [
            'id'    => $author->id,
            'name' => $author->name,
            'born_date' => $author->born_date,
            'death_date' => $author->death_date,
        ];
    }

    /**
     * Преобразовывает коллекцю в массив
     *
     * @param $authors
     * @return array
     */
    public static function manyToArray($authors) : array
    {
        $result = [];

        foreach ($authors as $author) {
            $result[] = self::oneToArray($author);
        }

        return $result;
    }
}
