<?php

namespace App\Http\Controllers;

use App\Helper\FileHelper;
use App\Http\Requests\PaintingCreateRequest;
use App\Models\Painting;
use App\Services\Painting\PaintingService;
use App\Transformers\PaintingTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Контроллер картин в галерее
 *
 * Class PaintingController
 * @package App\Http\Controllers
 */
class PaintingController extends ApiController
{
    /**
     * Метод добавления картины в галерею
     *
     * @param PaintingCreateRequest $request
     * @param PaintingService $service
     * @return JsonResponse
     */
    public function store(PaintingCreateRequest $request, PaintingService $service): JsonResponse
    {
        $painting                = new Painting();

        $file = FileHelper::FileUpload($request->file('preview'), Painting::FILE_DIR);

        if (!$file) {
            $this->responseError('Загрузка файла не удалась. Попробуйте ещё раз.', 500);
        }

        $painting->preview       = $file;
        $painting->title         = $request->get('title');
        $painting->description   = $request->get('description');
        $painting->author_id        = $request->get('author');
        $painting->creation_date = $request->get('creation_date');

        if ($service->store($painting)) {
            return $this->responseSuccess(PaintingTransformer::oneToArray($painting), 201);
        }

        return $this->responseError('Не удалось добавить картину. Попробуйте позже', 500);
    }

    /**
     * Получить все картины
     *
     * @return JsonResponse
     */
    public function getAll(): JsonResponse
    {
        $paintings = Painting::query()->get();

        return $this->responseSuccess(PaintingTransformer::manyToArray($paintings), 200);
    }

    /**
     * Метод обновления картины в галерее
     *
     * @param Painting $painting
     * @param PaintingCreateRequest $request
     * @param PaintingService $service
     * @return JsonResponse
     */
    public function update(Painting $painting, PaintingCreateRequest $request, PaintingService $service): JsonResponse
    {
        $file = FileHelper::FileUpload($request->file('preview'), Painting::FILE_DIR);

        if (!$file) {
            $this->responseError('Загрузка файла не удалась. Попробуйте ещё раз.', 500);
        }
        $old_file = $painting->preview;

        $painting->preview       = $file;
        $painting->title         = $request->get('title');
        $painting->description   = $request->get('description');
        $painting->author_id     = $request->get('author');
        $painting->creation_date = $request->get('creation_date');

        if ($service->update($painting)) {
            Storage::delete(Painting::FILE_DIR . $old_file);
            return $this->responseSuccess(PaintingTransformer::oneToArray($painting), 200);
        }

        return $this->responseError('Не удалось отредактировать картину. Попробуйте позже', 500);
    }

    /**
     * Метод удаления картины
     *
     * @param Painting $painting
     * @return JsonResponse
     * @throws \Exception
     */
    public function delete(Painting $painting): JsonResponse
    {
        try {
            $painting->delete();
        } catch (\Exception $e) {
            return $this->responseError('Не удалось удалить картину. Попробуйте позже', 500);
        }

        return $this->responseSuccess(['message' =>'Картина успешно удалена'], 200);
    }

    /**
     * Метод получения одной картины
     *
     * @param Painting $painting
     * @return JsonResponse
     */
    public function getOne(Painting $painting): JsonResponse
    {
        return $this->responseSuccess(PaintingTransformer::oneToArray($painting), 200);
    }
}
