<?php


namespace Kouja\ProjectAssistantPackage\Helpers;


use Illuminate\Contracts\Validation\Validator;

class ValidateHelper
{
    protected $errors;

    /**
     * validatorHelper constructor.
     * @param $errors
     */
    public function __construct($errors)
    {
        $this->errors = $errors;
    }

    public function checkErrors()
    {
        if(strpos($this->errors,'The selected'))
            return ResponseHelper::DataNotFound();
        else if(strpos($this->errors,'already been taken'))
            return ResponseHelper::AlreadyExists();
        else if(strpos($this->errors,'valid email address'))
            return ResponseHelper::invalidData();
        else if(strpos($this->errors,'phone number not valid'))
            return ResponseHelper::invalidPhone();
        return ResponseHelper::MissingParameter((env('APP_DEBUG') == true) ? $this->errors : 'missing param');
    }
}
