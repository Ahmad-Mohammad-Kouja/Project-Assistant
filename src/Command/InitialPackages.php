<?php


namespace Kouja\ProjectAssistantPackage\Command;


use Illuminate\Console\Command;

class InitialPackages extends Command
{
    protected $signature = 'initial:package';

    protected $description = 'install initial dependencies';

    public function handle()
    {
        $this->info('Installing dependencies');

        $bar = $this->output->createProgressBar(5);

        $bar->start();

        if($this->confirm('Do You Want To Install Laravel Enum Package'))
        {

            $this->info('installing bensampo laravel enum package');

            $this->info('...');

            system('composer require bensampo/laravel-enum');

        }

        $this->info('...');

        $bar->advance();

        if($this->confirm('Do You Want To Install Laravel Passport Package'))
        {
            $this->info('installing laravel passport');

            system('composer require laravel/passport');

            $this->info('...');

            $bar->advance();

            $this->confirm('add  Passport::routes() in authServiceProvider in register method');

            $this->info('...');

            $bar->advance();

            $this->confirm('use HasApiTokens traits in userModel');

            $this->info('...');

            $bar->advance();

            $this->confirm('add passport as api driver in config/auth');

            $bar->advance();
        }else $bar->advance(4);

        $this->info('...');
        
        $this->info('All Done');

        $bar->finish();

    }
}