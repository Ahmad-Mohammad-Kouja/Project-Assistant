<?php


namespace Kouja\ProjectAssistant\Command;


use Illuminate\Console\Command;

class InitialDataBase extends Command
{
    protected $signature = 'initial:database';

    protected $description = 'migrate fresh and seeding database';

    public function handle()
    {
        system('composer dump-autoload');

        $this->info('Making Database Fresh');

        $bar = $this->output->createProgressBar(5);

        $this->info('running migrate:fresh');

        $this->call('migrate:fresh');

        $this->info('...');

        $bar->advance();

        $this->info('migrating ForeignKeys');

        system('php artisan migrate --path=database/migrations/ForeignKeys');

        $this->info('...');

        $bar->advance();

        $this->info('installing passport oauth keys');

        try {
            $this->call('passport:install');
        }catch (\Exception $exception)
        {
            $this->info('passport is not installed');

            $this->info('skipping this level');
        }

        $this->info('...');

        $bar->advance();

        $this->info('dumping composer');

        system('composer dump-autoload');

        $this->info('...');

        $bar->advance();

        $this->info('seeding database');

        $this->call('db:seed');

        $this->info('...');

        $bar->advance();

        $this->info('All Done');

        $bar->finish();
    }

}