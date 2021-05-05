<?php


namespace Kouja\ProjectAssistant\Bases;


use Illuminate\Foundation\Http\FormRequest;
use Kouja\ProjectAssistant\Traits\FormRequestTrait;

abstract class BaseFormRequest extends FormRequest
{
    use FormRequestTrait;

    public abstract function rules();

}