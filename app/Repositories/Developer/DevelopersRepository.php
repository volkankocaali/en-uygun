<?php
namespace App\Repositories\Developer;

use App\Models\Developer;

class DevelopersRepository implements DeveloperRepositoryInterface {

    public Developer $model;

    /**
     * @param Developer $developer
     */
    public function __construct(Developer $developer)
    {
        $this->model = $developer;
    }

    /**
     * @return mixed
     */
    public function get(): mixed
    {
        return $this->model->get();
    }

    /**
     * @param $data
     * @return void
     */
    public function insert($data): void
    {
        $this->model->insert($data);
    }

}
