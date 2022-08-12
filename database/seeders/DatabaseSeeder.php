<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Repositories\Developer\DeveloperRepositoryInterface;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private DeveloperRepositoryInterface $developerRepository;

    public function __construct(DeveloperRepositoryInterface $developerRepository)
    {
        $this->developerRepository = $developerRepository;
    }
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {

        for ($i = 1; $i < 6; $i++) {
            $this->developerRepository->insert([
                'name' => 'Developer '. $i,
                'difficulty' =>  $i,
            ]);
        }
    }
}
