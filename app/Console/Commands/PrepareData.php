<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;

class PrepareData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:mock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $category1 = [
            'title' => 'легкий'
        ];
        $category2 = [
            'title' => 'хрупкий'
        ];
        $category3 = [
            'title' => 'тяжелый'
        ];

        Category::create($category1);
        Category::create($category2);
        Category::create($category3);
    }
}
