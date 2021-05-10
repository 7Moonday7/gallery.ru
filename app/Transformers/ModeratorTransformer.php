<?php


namespace App\Transformers;

use App\Models\Moderator;

/**
 * Преобразовывает модель Author в массив
 *
 * Class AuthorTransformer
 * @package App\Transformers
 */
class ModeratorTransformer
{
    /**
     * Преобразовывает модель Moderator в массив
     *
     * @param Moderator $user
     * @return array
     */
    public static function oneToArray(Moderator $user): array
    {
        return [
            'id'    => $user->id,
            'login' => $user->login,
            'email' => $user->email,
            'password' => $user->password,
        ];
    }
}
