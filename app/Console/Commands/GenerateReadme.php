<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateReadme extends Command
{
    protected $signature = 'create:readme';

    protected $description = 'Command description';

    public function handle()
    {
        file_put_contents(base_path('README.md'), view('components.readme')->render());
    }
}
