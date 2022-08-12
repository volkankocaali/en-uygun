<?php

namespace App\Http\Controllers;

use App\Repositories\Developer\DeveloperRepositoryInterface;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Http\Request;

class DeveloperAssignmentController extends Controller
{
    private DeveloperRepositoryInterface $developerRepository;
    private TaskRepositoryInterface $taskRepository;
    private int $developerWorkingHour;
    private string $week;
    private $developerTasks;
    private $assignedTask;


    public function __construct(TaskRepositoryInterface $taskRepository, DeveloperRepositoryInterface $developerRepository)
    {
        $this->developerWorkingHour = 45;
        $this->week = 0;
        $this->taskRepository = $taskRepository;
        $this->developerRepository = $developerRepository;
    }

    public function index()
    {
        $developers = $this->developerRepository->get();
        $tasks = $this->taskRepository->get();
        $developerWorkingHour = $this->developerWorkingHour;

        $this->developerTasks = [];
        $this->assignedTask = [];


        foreach ($developers as $itemDeveloper) {
            $this->week = 1;
            $this->developerTasks[$itemDeveloper->name][$this->week] = ['hours_worked' => 0];

            foreach ($tasks as $itemTask) {
                if ($itemTask->difficulty <= $itemDeveloper->difficulty) {
                    $sum = $this->developerTasks[$itemDeveloper->name][$this->week]['hours_worked'] + $itemTask->duration;

                    if (in_array($itemTask->id, $this->assignedTask)) {
                        continue;
                    }

                    if ($sum <= $this->developerWorkingHour) {
                        $this->developerTasks[$itemDeveloper->name][$this->week][] = [$itemTask->name, $itemTask->duration, $itemTask->difficulty];
                    } else {
                        $this->week++;
                        $this->developerTasks[$itemDeveloper->name][$this->week]['hours_worked'] = 0;
                        $this->developerTasks[$itemDeveloper->name][$this->week][] = [$itemTask->name, $itemTask->duration];
                    }
                    $this->developerTasks[$itemDeveloper->name][$this->week]['hours_worked'] += $itemTask->duration;
                    $this->assignedTask[] = $itemTask->id;
                }
            }
        }

        return view('welcome', ['devTasks' => $this->developerTasks]);

    }
}
