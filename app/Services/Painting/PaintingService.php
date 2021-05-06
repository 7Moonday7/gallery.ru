<?php


namespace App\Services\Painting;


use App\Models\Painting;

class PaintingService
{
    /**
     * Метод добавление картины
     * @param Painting $painting
     * @return bool
     */
    public function store(Painting $painting) : bool
    {
        if (!$painting->save()) {
            return false;
        }
        return true;
    }

    /**
     * Метод обновления картины
     * @param Painting $painting
     * @return bool
     */
    public function update(Painting $painting) : bool
    {
        if (!$painting->save()) {
            return false;
        }
        return true;
    }
}
