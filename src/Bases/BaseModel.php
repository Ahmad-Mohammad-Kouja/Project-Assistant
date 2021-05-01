<?php


namespace Kouja\ProjectAssistantPackage\Bases;


use Illuminate\Database\Eloquent\Model;
use Kouja\ProjectAssistantPackage\Traits\ModelTrait;

abstract class BaseModel extends Model
{
    use ModelTrait;
}