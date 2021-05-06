<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Класс картин
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $author
 * @property string $creation_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * Class Painting
 * @package App\Models
 */
class Painting extends Model
{
    use HasFactory;
    /**
     * Передаваемые в бд строки
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'author',
        'creation_date',
    ];

    /**
     * Защищенные данные
     *
     * @var array
     */
    protected $hidden = [ ];

    /**
     * Отвечает за то, как данные преобразуются для записи бд
     *
     * @var array
     */
    protected $casts = [
        'created_date' => 'date',
    ];

    public $timestamps = true;
}
