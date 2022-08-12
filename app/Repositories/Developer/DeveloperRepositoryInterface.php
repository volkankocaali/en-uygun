<?php

namespace App\Repositories\Developer;

interface DeveloperRepositoryInterface {
    public function get();
    public function insert($data);
}
