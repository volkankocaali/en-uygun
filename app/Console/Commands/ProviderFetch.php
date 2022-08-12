<?php

namespace App\Console\Commands;

use App\Api\Bussiness\Business;
use App\Api\It\It;
use App\Repositories\Task\TaskRepositoryInterface;
use Illuminate\Console\Command;

class ProviderFetch extends Command
{
    private TaskRepositoryInterface $taskRepository;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'provider:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(TaskRepositoryInterface $taskRepository)
    {
        parent::__construct();
        $this->taskRepository = $taskRepository;
    }
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->info('Task start');

        $this->taskRepository->insert(Business::fetch());
        $this->taskRepository->insert(It::fetch());

        $this->info('Task complete.');
    }
}
