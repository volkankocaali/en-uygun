<?php
namespace App\Repositories\Task;

use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface {

    public Task $model;

    /**
     * @param Task $task
     */
    public function __construct(Task $task)
    {
        $this->model = $task;
    }

    /**
     * @param $task
     * @return mixed
     */
    public function insert($task): mixed
    {
        return $this->model->insert($task);
    }

    /**
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->get();
    }

}
