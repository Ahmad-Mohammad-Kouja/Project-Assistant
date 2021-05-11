<?php


namespace Kouja\ProjectAssistant\Helpers;


use Illuminate\Support\Facades\Storage;

class FileClass
{
    protected String $disk;

    /**
     * FileClass constructor.
     * @param string $disk
     */
    public function __construct($disk = 'public')
    {
        $this->disk = $disk;
    }

    /**
     * @param String $disk
     */
    public function setDisk(string $disk): void
    {
        $this->disk = $disk;
    }



    public function uploadFile($file, $fileName , $path) : OperationResult
    {
        $operationalResult = new OperationResult();
        try {
            Storage::disk($this->disk)->put($path.$fileName, fopen($file, 'r+'),'public');
           $operationalResult->data =  $path.$fileName;
        }catch (\Exception $exception)
        {
            $operationalResult->isSuccess = false;
            $operationalResult->data = $exception->getMessage();
            $operationalResult->statues = 500;
        }
          return $operationalResult;
    }


    public function deleteFiles($filesPaths) : OperationResult
    {
        $operationalResult = new OperationResult();
        try {
           $operationalResult->data =  Storage::disk($this->disk)->delete($filesPaths);
        }Catch(\Exception $exception)
        {
            $operationalResult->isSuccess = false;
            $operationalResult->data = $exception;
            $operationalResult->statues = 500;
        }
        return $operationalResult;

    }

    public function CheckFile($filePath)
    {
        $operationalResult = new OperationResult();
        try {
            $operationalResult->data =  Storage::disk($this->disk)->exists($filePath);
        }Catch(\Exception $exception)
        {
            $operationalResult->isSuccess = false;
            $operationalResult->data = $exception;
            $operationalResult->statues = 500;
        }
        return $operationalResult;
    }

    public function getFile($filePath)
    {
        $operationalResult = new OperationResult();
        try {
            $operationalResult->data =  Storage::disk($this->disk)->get($filePath);
        }Catch(\Exception $exception)
        {
            $operationalResult->isSuccess = false;
            $operationalResult->data = $exception;
            $operationalResult->statues = 500;
        }
        return $operationalResult;

    }
}
