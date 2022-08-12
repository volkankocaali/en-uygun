<?php

namespace App\Repositories\Task;

interface TaskRepositoryInterface {
    public function insert($task);
    public function get();
}
