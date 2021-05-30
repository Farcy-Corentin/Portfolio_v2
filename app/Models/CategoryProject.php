<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class CategoryProject extends Model
{
    use HasFactory;

    protected $table = 'categoryproject';

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'categoryproject_id');
    }
}
