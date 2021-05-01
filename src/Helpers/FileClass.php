<?php


namespace Kouja\ProjectAssistantPackage\Helpers;


use Illuminate\Support\Facades\Storage;
use Kouja\ProjectAssistantPackage\Exceptions\OperationFailException;

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



    public function uploadFile($file, $fileName , $path)
    {
        try {
            Storage::disk($this->disk)->put($path.$fileName, fopen($file, 'r+'),'public');
           $data = $path.$fileName;
        }catch (\Exception $exception)
        {
            throw new OperationFailException($exception->getMessage());
        }
          return $data;
    }


    public function deleteFiles($filesPaths)
    {
        try {
           $data =  Storage::disk($this->disk)->delete($filesPaths);
        }Catch(\Exception $exception)
        {
            throw new OperationFailException($exception->getMessage());
        }
        return $data;

    }

    public function CheckFile($filePath) : OperationalResult
    {
        $operationalResult = new OperationalResult();
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
        $operationalResult = new OperationalResult();
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
