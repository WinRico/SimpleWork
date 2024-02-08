<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property string $name
 * @property string $full_text
 * @property string $title
 * @property string $namedCompany
 * @property int $statusId
 * @property data $data_add
 * @property data $dead_start_work
 * @property data $deadUpdate
 * @property int $projectId
 * @property int $categoryId
 * @property int $userId
 * @property Project $project
 */
class Task extends Model
{
    use HasFactory;
    public $timestamps = false;

    static public function getSingle($id)
    {
        return self::find($id);
    }
    public  function getPriority($id){

        $file = Project::find($id);

        $path = (string) $file->priority;

        return $path;
    }
    public  function getDeadLine($id){

        $file = Project::find($id);

        $path = date($file->hour);

        return $path;
    }
    public  function getCategory($id){

        $file = Category::find($id);

        $path = (string) $file->name;

        return $path;
    }
    public static function isFinish(){
        return Project::where('statusId', 2)->count();
    }
    public static function percentProductivity(){
        $all = Task::all()->count();
        $isFinish = Task::where('statusId', 2)->count();
        return round($isFinish * 100 / $all);

    }
    public static function taskInProgres(){
        $all = Task::all()->count();
        $inProgres = Task::where('statusId', 1)->count();
        return round($inProgres * 100 / $all);
    }
    public static function taskWaiting(){
        $all = Task::all()->count();
        $inWaiting = Task::where('statusId', 3)->count();
        return round($inWaiting * 100 / $all);

    }
}
