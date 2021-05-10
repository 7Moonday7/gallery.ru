<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Класс авторов
 *
 * @property int $id
 * @property string $name
 * @property Painting[] $paintings
 *
 * Class Author
 * @package App\Models
 */
class Author extends Model
{
    use HasFactory;
    /**
     * Передаваемые в бд строки
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'born_date',
        'death_date',
    ];

    /**
     * Защищенные данные
     *
     * @var array
     */
    protected $hidden = [ ];

    /**
     * Get the comments for the blog post.
     */
    public function paintings(): HasMany
    {
        return $this->hasMany(Painting::class);
    }

    public $timestamps = true;
}
