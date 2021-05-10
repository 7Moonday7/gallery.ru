<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;

/**
 * Класс картин
 *
 * @property int $id
 * @property UploadedFile $preview
 * @property string $title
 * @property string $description
 * @property int $author_id
 * @property string $creation_date
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Author $author
 *
 * Class Painting
 * @package App\Models
 */
class Painting extends Model
{
    use HasFactory;

    public const FILE_DIR = 'paintings/';
    /**
     * Передаваемые в бд строки
     *
     * @var array
     */
    protected $fillable = [
        'preview',
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

    /**
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
