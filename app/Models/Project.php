<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string $title
 * @property string $descriptions
 * @property string $categoryproject_id
 * @property DateTime $started_at
 * @property DateTime $finished_at
 * @property string $missions
 * @property string $languages
 * @property string $softwares
 * @property string $links
 * @property string $github_links
 * @property int $online
 * @property string $imageproject_id
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Project extends Model
{
    use HasFactory;
    
    protected $table = 'projects';

    public function categoryproject(): BelongsTo
    {
        return $this->belongsTo(CategoryProject::class, 'categoryproject_id');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ImageProject::class, 'project_id');
    }
}
