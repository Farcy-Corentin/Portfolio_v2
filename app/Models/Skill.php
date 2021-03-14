<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property string $category
 * @property string $skills
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
