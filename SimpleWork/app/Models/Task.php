<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Request;

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

    public function user(){
        return $this->belongsTo(User::class,'userId');
    }
    public function project(){
        return $this->belongsTo(Project::class,'projectId');
    }
    public function category(){
        return $this->belongsTo(Category::class,'categoryId');
    }
    static public function getTask(){
        $return = Task::where('userId',null)->paginate(5);
        if (!empty(Request::get('name'))){
            $return = Task::get()->where('name','=',Request::get('name'));
        }
        return $return;
    }
    static public function getSingle($id){
        return self::find($id);
    }
    public  function getUser(){

        $file = User::find('userId');
        dd($file);

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
    public static function percentOfProjectProductivity($id){
        $all = Task::all()->where('projectId', $id);
        $isFinish = $all->where('statusId', 2)->count();
        if ($all->count() != 0) {
            return round($isFinish * 100 / $all->count());
        } else {
            return 0; // або будь-яке інше значення за замовчуванням
        }

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
