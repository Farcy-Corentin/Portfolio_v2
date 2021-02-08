<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $id
 * @property string $title
 * @property string $descriptions
 * @property DateTime $started_at
 * @property DateTime $finished_at
 * @property string $missions
 * @property string $languages
 * @property string $softwares
 * @property string $links
 * @property string $github_links
 * @property int $online
 * @property string $pictures
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Project extends Model
{
    use HasFactory;
    
    protected $table = 'projects';
}
