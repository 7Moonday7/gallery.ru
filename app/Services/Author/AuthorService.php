<?php


namespace App\Services\Author;


use App\Models\Author;

class AuthorService
{
    /**
     * Метод добавления автора
     * @param Author $author
     * @return bool
     */
    public function store(Author $author) : bool
    {
        if (!$author->save()) {
            return false;
        }
        return true;
    }

    /**
     * Метод обновления автора
     * @param Author $author
     * @return bool
     */
    public function update(Author $author) : bool
    {
        if (!$author->save()) {
            return false;
        }
        return true;
    }
}
