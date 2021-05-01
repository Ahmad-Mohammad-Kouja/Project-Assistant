<?php


namespace Kouja\ProjectAssistantPackage\Command;


use Illuminate\Foundation\Console\RequestMakeCommand;

class MakeRequest extends RequestMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:extended_request {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Roynex Custom FormRequest Class';



    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return parent::handle();
    }

    public function getStub()
    {

        return __DIR__.'/Stubs/formRequest.stub';
    }
}