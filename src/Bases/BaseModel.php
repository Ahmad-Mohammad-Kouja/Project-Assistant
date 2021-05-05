<?php


namespace Kouja\ProjectAssistant\Bases;


use Illuminate\Database\Eloquent\Model;
use Kouja\ProjectAssistant\Traits\ModelTrait;

abstract class BaseModel extends Model
{
    use ModelTrait;
}