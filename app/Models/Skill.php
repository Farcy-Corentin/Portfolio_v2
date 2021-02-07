<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

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
    protected $table = 'skills';
}
