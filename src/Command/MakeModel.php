<?php


namespace Kouja\ProjectAssistantPackage\Command;


use Illuminate\Foundation\Console\ModelMakeCommand;

class MakeModel extends ModelMakeCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:extended_model {name} {--m|migration} {--a|all}
     {--p|pivot} {--c|controller} {--f|factory} {--force} {--s|seed} {--r|resource} {--api}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Kouja Custom Model Class';



    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        parent::handle();
    }

    public function getStub()
    {
        return $this->option('pivot')
            ? $this->resolveStubPath('/stubs/model.pivot.stub')
            : __DIR__.'/Stubs/model.stub';
    }

}