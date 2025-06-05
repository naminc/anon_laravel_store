<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name}';
    protected $description = 'Create a new repository and interface';

    public function handle()
    {
        $name = $this->argument('name');
        $interfacePath = app_path("Repositories/Interfaces/{$name}Interface.php");
        $repoPath = app_path("Repositories/{$name}.php");

        if (!file_exists(dirname($interfacePath))) mkdir(dirname($interfacePath), 0755, true);

        file_put_contents($interfacePath, "<?php\n\nnamespace App\Repositories\Interfaces;\n\ninterface {$name}Interface\n{\n    // ...\n}\n");
        file_put_contents($repoPath, "<?php\n\nnamespace App\Repositories;\n\nuse App\Repositories\Interfaces\\{$name}Interface;\n\nclass {$name} implements {$name}Interface\n{\n    // ...\n}\n");

        $this->info("Repository and Interface for {$name} created.");
    }
}
