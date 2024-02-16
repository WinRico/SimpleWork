<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Request;
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
    protected $table = 'projects';
    public $timestamps = false;


    public function task(): HasMany{
        return $this->hasMany(Task::class, 'projectId');
    }

    public static function isFinish(){
        return Project::where('statusId', 2)->count();
    }
    public static function percentProductivity(){
        $all = Project::all()->count();
        $isFinish = self::isFinish();
        return $isFinish * 100 / $all;
    }
    static public function getProject(){
       $return = Project::paginate(3);
        if (!empty(Request::get('name'))){
            $return = Project::get()->where('name','=',Request::get('name'));
        }
        return $return;
    }
    public function getUserByProject($projectId)
    {
        $project = Project::find($projectId);

        $tasks = $project->task;
        foreach ($tasks as $task) {
            $executor = $task->user;
            return $executor;
        }
        return null;
    }

}
