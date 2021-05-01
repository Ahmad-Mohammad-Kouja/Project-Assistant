<?php


namespace Kouja\ProjectAssistantPackage\Bases;


use Illuminate\Foundation\Http\FormRequest;
use Kouja\ProjectAssistantPackage\Traits\FormRequestTrait;

abstract class BaseFormRequest extends FormRequest
{
    use FormRequestTrait;

    public abstract function rules();

}