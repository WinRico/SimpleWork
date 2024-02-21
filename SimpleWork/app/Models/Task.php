<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class Task extends Model
{
    use HasFactory;

    // Disable timestamps for this model
    public $timestamps = false;

    /**
     * Define a relationship between Task and User models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // Define a many-to-one relationship where a task belongs to a user
        return $this->belongsTo(User::class, 'userId');
    }

    /**
     * Define a relationship between Task and Project models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        // Define a many-to-one relationship where a task belongs to a project
        return $this->belongsTo(Project::class, 'projectId');
    }

    /**
     * Define a relationship between Task and Category models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        // Define a many-to-one relationship where a task belongs to a category
        return $this->belongsTo(Category::class, 'categoryId');
    }

    /**
     * Retrieve tasks, optionally filtered by name, with pagination.
     *
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public static function getTask()
    {
        // Retrieve tasks with pagination where userId is null
        $return = Task::where('userId', null)->paginate(5);

        // Check if 'name' parameter is present in the request
        if (!empty(Request::get('name'))){
            // Filter tasks by name
            $return = Task::where('name', Request::get('name'))->paginate(5);
        }
        return $return;
    }

    /**
     * Retrieve tasks assigned to the current authenticated user, optionally filtered by name, with pagination.
     *
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public static function getMyTask()
    {
        // Retrieve tasks assigned to the current authenticated user with pagination
        $return = Task::where('userId', Auth::user()->id)->paginate(5);

        // Check if 'name' parameter is present in the request
        if (!empty(Request::get('name'))){
            // Filter tasks by name
            $return = Task::where('name', Request::get('name'))->paginate(5);
        }
        return $return;
    }

    /**
     * Retrieve a single task by its ID.
     *
     * @param int $id
     * @return Task|null
     */
    public static function getSingle($id)
    {
        return self::find($id);
    }

    /**
     * Determine if a task is finished.
     *
     * @return int
     */
    public static function isFinish()
    {
        return Project::where('statusId', 2)->count();
    }

    /**
     * Calculate the number of tasks finished by a specific user.
     *
     * @param int $id
     * @return int
     */
    public static function UserTaskIsFinish($id)
    {
        $all = Task::all()->where('userId', $id);
        $isFinish = $all->where('statusId', 2)->count();
        return $all->count() != 0 ? $isFinish : 0;
    }

    /**
     * Calculate the percentage of task productivity.
     *
     * @return int
     */
    public static function percentProductivity()
    {
        $all = Task::all()->count();
        $isFinish = Task::where('statusId', 2)->count();
        return round($isFinish * 100 / $all);
    }

    /**
     * Calculate the percentage of project productivity based on completed tasks.
     *
     * @param int $id
     * @return int
     */
    public static function percentOfProjectProductivity($id)
    {
        $all = Task::all()->where('projectId', $id);
        $isFinish = $all->where('statusId', 2)->count();
        return $all->count() != 0 ? round($isFinish * 100 / $all->count()) : 0;
    }

    /**
     * Calculate the percentage of tasks in progress.
     *
     * @return int
     */
    public static function taskInProgres()
    {
        $all = Task::all()->count();
        $inProgres = Task::where('statusId', 1)->count();
        return round($inProgres * 100 / $all);
    }

    /**
     * Calculate the percentage of tasks waiting for action.
     *
     * @return int
     */
    public static function taskWaiting()
    {
        $all = Task::all()->count();
        $inWaiting = Task::where('statusId', 3)->count();
        return round($inWaiting * 100 / $all);
    }
}
