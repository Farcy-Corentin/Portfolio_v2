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
 * @property string $cursus
 * @property string $links
 * @property string $pictures
 * @property DateTime $created_at
 * @property DateTime $updated_at
 */
class Training extends Model
{
    use HasFactory;

    protected $table = 'trainings';
}
