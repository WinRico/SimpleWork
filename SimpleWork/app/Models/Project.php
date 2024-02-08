<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PhpParser\ErrorHandler\Collecting;
use Ramsey\Collection\Collection;

/**
 * @property int $id
 * @property string $name
 * @property data $hour
 * @property string $priority
 * @property int $statusId
 * @property int $teamId
 * @property Collection<Task> $task
 */
class Project extends Model
{
    use HasFactory;
    public $timestamps = false;


    public function task(): HasMany{

        return $this->hasMany(Task::class);
    }
    public static function isFinish(){
        return Project::where('statusId', 2)->count();
    }
    public static function percentProductivity(){
        $all = Project::all()->count();
        $isFinish = self::isFinish();
        return $isFinish * 100 / $all;
    }
}
