<?php


namespace Kouja\ProjectAssistant\Traits;

use Exception;
use Kouja\ProjectAssistant\Exceptions\CreatingModelFailException;
use Kouja\ProjectAssistant\Exceptions\DeletingModelFailException;
use Kouja\ProjectAssistant\Exceptions\InsertingDataFailException;
use Kouja\ProjectAssistant\Exceptions\UpdatingModelFailException;

trait ModelTrait
{
    public function createData($data)
    {
        return $this::create($data);
    }

    public function insertData($data)
    {
        return $this->insert($data);
    }

    public function updateData($filter, $newData)
    {
        return $this::where($filter)
            ->update($newData);
    }

    public function softDeleteData($filter)
    {
        return $this::where($filter)
            ->delete();
    }

    public function forceDeleteData($filter): OperationalResult
    {
        $operationalResult = new OperationalResult();
        try {
            $operationalResult->data = $this::where($filter)->forceDelete();
        } catch (QueryException $exception) {
            $operationalResult->isSuccess = false;
            $operationalResult->statues = $exception->getCode();
        }
        return $operationalResult;
    }


    public function findData($filter, $select = ['*'],$relations = array(), $orderType = 'ASC', $orderColumn = 'id')
    {
        return $this::where($filter)
            ->when(!blank($relations),function ($model) use ($relations)
            {
                return $model->with($relations);
            })
            ->select($select)
            ->orderBy($orderColumn, $orderType)
            ->first();
    }

    public function getData($filter = array(), $relations = array(), $select = ['*'], $orderType = 'DESC', $orderColumn = 'id', $isPaginate = false)
    {
        $query = $this::where($filter)
            ->when(!blank($relations), function ($model) use ($relations) {
                $model->with($relations);
            })->select($select)
            ->orderBy($orderColumn, $orderType);
       return ($isPaginate) ? $query->paginate() : $query->get();
    }

    public function allData($orderType = 'DESC', $orderColumn = 'id', $isPaginate = true)
    {
        $query = $this::orderBy($orderColumn, $orderType);

      return  ($isPaginate) ? $query->paginate() : $query->get();
    }


  

}
