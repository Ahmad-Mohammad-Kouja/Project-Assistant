
# Introduction

This Package get rid of Duplicate Work like handling json response and writing duplicated query





## Installation 

Package can be installed via composer

```bash 
 composer require kouja/project-assistant
```
    
## Features

- Extended Model stub
- Custom Exception
- Custom Form Request
- New Helper Class

  
## Usage/Examples

Extended Model

You Can Add New Model Using Command

```
php artisan make:extended_model

```
The New Model Will Be like This

```php

class Roynex extends BaseModel
{
    use HasFactory;

    protected $table = '';

    protected $fillable = [];

    protected $hidden = [];

    protected $dates = [];

    protected $casts = [];

}

```

The New Model Extend BaseModel Class

BaseModel Class For Now is only using ModelTrait

That Look like This

```php
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



}
```

This Query Are Duplicated in Every Model so Insted of Writing Them
in Every Model We Are Using Them in This Trait



  