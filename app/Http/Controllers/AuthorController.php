<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorCreateRequest;
use App\Models\Author;
use App\Services\Author\AuthorService;
use App\Transformers\AuthorTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Контроллер картин в галерее
 *
 * Class PaintingController
 * @package App\Http\Controllers
 */
class AuthorController extends ApiController
{
    /**
     * Метод добавления автора
     *
     * @param AuthorCreateRequest $request
     * @param AuthorService $service
     * @return JsonResponse
     */
    public function store(AuthorCreateRequest $request, AuthorService $service)
    {
        $author                = new Author();
        $author->name          = $request->get('name');
        $author->born_date     = $request->get('born_date');
        $author->death_date    = $request->get('death_date');

        if ($service->store($author)) {
            return $this->responseSuccess(AuthorTransformer::oneToArray($author), 201);
        }

        return $this->responseError('Не удалось добавить . Попробуйте позже', 500);
    }

    /**
     * Получить всех авторов
     *
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $authors = Author::query()->get();

        return $this->responseSuccess(AuthorTransformer::manyToArray($authors), 200);
    }

    /**
     * Метод обновления автора
     *
     * @param Author $author
     * @param AuthorCreateRequest $request
     * @param AuthorService $service
     * @return JsonResponse
     */
    public function update(Author $author, AuthorCreateRequest $request, AuthorService $service): JsonResponse
    {
        $author->name         = $request->get('name');
        $author->born_date     = $request->get('born_date');
        $author->death_date    = $request->get('death_date');

        if ($service->update($author)) {
            return $this->responseSuccess(AuthorTransformer::oneToArray($author), 200);
        }

        return $this->responseError('Не удалось отредактировать . Попробуйте позже', 500);
    }

    /**
     * Метод получения одного художника
     *
     * @param Author $author
     * @return JsonResponse
     */
    public function getOne(Author $author): JsonResponse
    {
        return $this->responseSuccess(AuthorTransformer::oneToArray($author), 200);
    }
}
