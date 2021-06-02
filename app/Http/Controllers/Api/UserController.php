<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\RegistrationCreateRequest;
use App\Http\Requests\AuthCreateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Moderator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Transformers\ModeratorTransformer;

/**
 * Контроллер юзеров
 *
 * Class UserController
 * @package App\Http\Controllers
 */

class UserController extends ApiController
{
    /**
     * Метод авторизации
     *
     * @param AuthCreateRequest $request
     * @return JsonResponse
     */
    public function auth(AuthCreateRequest  $request) : JsonResponse
    {
        /** @var Moderator $user */
        $user = Moderator::query()
            ->where('login', '=', $request->get('login'))
            ->first();
        if(!$user || !Hash::check($request->get('password'), $user->password)) {
            return $this->responseError('Не удалось авторизоваться. Попробуйте позже', 412);
        }
        $token = $user->createToken('auth-token')->plainTextToken;
        return $this->responseSuccess(['token' => $token], 200);
    }

    /**
     * Метод регистрации
     *
     * @param RegistrationCreateRequest $request
     * @return JsonResponse
     */

    public function registration(RegistrationCreateRequest $request) : JsonResponse
    {
        $user = new Moderator();
        $user->login      = $request->get('login');
        $user->email      = $request->get('email');
        $user->password   = Hash::make($request->get('password'));

        if(!$user->save()) {
            return $this->responseError('Не удалось зарегистрироваться Попробуйте позже', 500);
        }
        $token = $user->createToken('auth-token')->plainTextToken;
        return $this->responseSuccess([ModeratorTransformer::oneToArray($user), 'token' => $token], 200);
    }

    /**
     * Метод выхода из системы
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request): JsonResponse
    {
        try {
            $request->user()->tokens()->delete();
        } catch (\Exception $e) {
            return $this->responseError('Не удалось выйти. Попробуйте позже', 500);
        }

        return $this->responseSuccess(['message' =>'Успешно вышли'], 200);
    }
}
