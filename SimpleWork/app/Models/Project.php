<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Request;
use Ramsey\Collection\Collection;

class Project extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'projects';

    // Disable timestamps for this model
    public $timestamps = false;

    /**
     * Define a one-to-many relationship between Project and Task models.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function task(): HasMany
    {
        // A project has many tasks
        return $this->hasMany(Task::class, 'projectId');
    }

    /**
     * Check if a project is finished (statusId = 2).
     *
     * @return int
     */
    public static function isFinish(): int
    {
        // Count the number of projects with statusId = 2 (finished projects)
        return Project::where('statusId', 2)->count();
    }

    /**
     * Calculate the percentage of productivity based on finished projects.
     *
     * @return float
     */
    public static function percentProductivity(): float
    {
        // Get the total number of projects
        $all = Project::all()->count();
        // Get the number of finished projects
        $isFinish = self::isFinish();
        // Calculate the percentage of productivity
        return $isFinish * 100 / $all;
    }

    /**
     * Retrieve projects, optionally filtered by name, with pagination.
     *
     * @return \Illuminate\Contracts\Pagination\Paginator
     */
    public static function getProject()
    {
        // Retrieve projects with pagination
        $return = Project::paginate(3);
        // Check if 'name' parameter is present in the request
        if (!empty(Request::get('name'))){
            // Filter projects by name
            $return = Project::where('name', '=', Request::get('name'))->paginate(3);
        }
        return $return;
    }

    /**
     * Retrieve the user assigned to a project.
     *
     * @param int $projectId
     * @return mixed
     */
    public function getUserByProject($projectId)
    {
        // Find the project by its ID
        $project = Project::find($projectId);

        // Get the tasks associated with the project
        $tasks = $project->task;

        // Iterate through the tasks to find the executor (user)
        foreach ($tasks as $task) {
            $executor = $task->user;
            return $executor;
        }
        return null;
    }
}
