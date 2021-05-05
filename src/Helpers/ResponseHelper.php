<?php


namespace Kouja\ProjectAssistant\Helpers;


class ResponseHelper
{


    /**
     * @param mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function operationSuccess($message = "operation Success")
    {
        return response()->json(['status' => 'OK','message' => $message], 200);
    }

    /**
     * @param mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function select($data = null)
    {
        return response()->json(['status' => 'OK','data' =>$data], 210);
    }

    /**
     * @param mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function create($data = null)
    {
        return response()->json(['status' => 'OK','data' =>$data], 220);
    }

    /**
     * @param $data Mixed
     * @return \Illuminate\Http\JsonResponse
     */
    public static function insert($data = null)
    {
        return response()->json(['status' => 'OK', 'data' => $data], 230);
    }
    /**
     * @param $data Mixed
     * @return \Illuminate\Http\JsonResponse
     */
    public static function update($data = null)
    {
        return response()->json(['status' => 'OK', 'data' => $data], 240);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function delete($message = "Deleted Successfully")
    {
        return response()->json(['status' => 'OK', 'message' => $message], 250);
    }


    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */

    public static function MissingParameter($message = "Missing Required Param")
    {
        return response()->json(['status' => 'ERROR', 'message' => $message], 400);
    }

    /**
     * @param mixed
     * isEmpty Array exception
     * @return \Illuminate\Http\JsonResponse
     */
    public static function DataNotFound($message = "Data Not Found")
    {
        return response()->json(['status' => 'ERROR', 'message' => $message], 410);
    }

    /**
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function AlreadyExists($message = "Already Exists")
    {
        return response()->json(['status' => 'ERROR', 'message' => $message], 420);
    }

    /**
     * @param mixed
     * not authorized user
     * @return \Illuminate\Http\JsonResponse
     */
    public static function authenticationFail($message = "Not Authenticated")
    {
        return response()->json(['status' => 'ERROR', 'message' => $message], 430);
    }

    /**
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function authorizationFail($message = "Not Authorized")
    {
        return response()->json(['status' => 'ERROR', 'message' => $message], 440);
    }


    public static function invalidPhone($message = "Invalid Phone")
    {
        return response()->json(['status' => 'ERROR' , 'message' => $message] , 450);
    }


    public static function invalidData($message = "Invalid Data")
    {
        return response()->json(['status' => 'ERROR', 'message' => $message], 460);
    }


    /**
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function operationFail($message  = null)
    {
        empty($message) && $message = "opertaion fail";
        return response()->json(['status' => 'ERROR', 'message' => $message], 510);
    }

    public static function creatingFail($message  = null)
    {
        empty($message) && $message = "creating fail";
        return response()->json(['status' => 'ERROR', 'message' => $message], 520);
    }

    /**
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function insertingFail($message = null)
    {
        empty($message) && $message = "inserting fail";
        return response()->json(['status' => 'ERROR', 'message' => $message], 530);
    }


    /**
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function updatingFail($message = null)
    {
        empty($message) && $message = "updating fail";
        return response()->json(['status' => 'ERROR', 'message' => $message], 540);
    }


    /**
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function deletingFail($message  = null)
    {
        empty($message) && $message = "deleting fail";
        return response()->json(['status' => 'ERROR', 'message' => $message], 550);
    }


    /**
     * @param null $message
     * @return \Illuminate\Http\JsonResponse
     */
    public static function serverError($message  = "server error")
    {
        return response()->json(['status' => 'ERROR', 'message' => $message], 560);
    }


    





}
