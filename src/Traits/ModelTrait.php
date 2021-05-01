<?php


namespace Kouja\ProjectAssistantPackage\Traits;

use Exception;
use Kouja\ProjectAssistantPackage\Exceptions\CreatingModelFailException;
use Kouja\ProjectAssistantPackage\Exceptions\DeletingModelFailException;
use Kouja\ProjectAssistantPackage\Exceptions\InsertingDataFailException;
use Kouja\ProjectAssistantPackage\Exceptions\UpdatingModelFailException;

trait ModelTrait
{
    public function createData($data)
    {
        try{
            $createdModel = $this::create($data);

            if(empty($createdModel))
            throw new CreatingModelFailException('creating data fail');

        }catch(Exception $excption)
        {
            throw new CreatingModelFailException($excption->getMessage());
        }
       
        return $createdModel;
    }

    public function insertData($data)
    {
        try{
            $insertedData = $this->insert($data);

            if(empty($insertedData))
            throw new InsertingDataFailException('inserting data fail');

        }catch(Exception $excption)
        {
            throw new InsertingDataFailException($excption->getMessage());
        }
       
        return $insertedData;
    }

    public function updateData($filter, $newData)
    {
         try{
            $updatedDataStatus = $this::where($filter)
            ->update($newData);

            if(empty($updatedDataStatus))
            throw new UpdatingModelFailException('updating data fail');

        }catch(Exception $excption)
        {
            throw new UpdatingModelFailException($excption->getMessage());
        }
       
        return $updatedDataStatus;
    }

    public function updateOrCreateData($filter,$data)
    {
        try{
            $queryResult = $this->updateOrCreate($filter,$data);

            if(empty($queryResult))
            throw new UpdatingModelFailException('deleting data fail');
    
        }catch(Exception $excption)
        {
            throw new UpdatingModelFailException($excption->getMessage());
        }
       
        return $queryResult;
    }

    public function softDeleteData($filter)
    {
       try{
        $deletingDataStatus = $this::where($filter)
        ->delete();

        if(empty($deletingDataStatus))
        throw new DeletingModelFailException('deleting data fail');

    }catch(Exception $excption)
    {
        throw new DeletingModelFailException($excption->getMessage());
    }
   
    return $deletingDataStatus;
        
    }

    public function forceDeleteData($filter)
    {
        try{
            $deletingDataStatus = $this::where($filter)
            ->forceDelete();
    
            if(empty($deletingDataStatus))
            throw new DeletingModelFailException('deleting data fail');
    
        }catch(Exception $excption)
        {
            throw new DeletingModelFailException($excption->getMessage());
        }
       
        return $deletingDataStatus;
        
    }


    public function findData($filter,$select = ['*'],$relations = array(),$orderType = 'ASC',
    $orderColumn = 'id')
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

    public function getData($filter = array(), $relations = array(), $select = ['*'],
     $orderType = 'DESC', $orderColumn = 'id', $limit = 0,$offset = 0 , $isPaginate = false ,
      $isSimple = false)
    {
        $query = $this::where($filter)
            ->when(!blank($relations), function ($model) use ($relations) {
                $model->with($relations);
            })->select($select)
            ->orderBy($orderColumn, $orderType);

            $offset > 0 && $query->offset($offset);
            $limit > 0 && $query->limit($limit);

            return  ($isPaginate) ? (($isSimple) ? $query->simplePaginate() :  $query->paginate()) : $query->get();
    }

    public function allData($filter = array(),$orderType = 'DESC', $orderColumn = 'id', $isPaginate = true,$isSimple = false)
    {
        $query = $this::when(count($filter) > 0,function($query) use($filter)
        {
            $query->where($filter);
        })->orderBy($orderColumn, $orderType);

      return  ($isPaginate) ? $query->paginate() : $query->get();
    }


  

}
