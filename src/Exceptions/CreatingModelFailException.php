<?php


namespace Kouja\ProjectAssistantPackage\Exceptions;

use Exception;
use Kouja\ProjectAssistantPackage\Helpers\ResponseHelper;
use Throwable;

class CreatingModelFailException extends Exception
{
    public function report()
    {
        return false;
    }


    public function render($request)
    {
        if($request->expectsJson())
        return ResponseHelper::creatingFail($this->message);

        abort(500);
    }
}