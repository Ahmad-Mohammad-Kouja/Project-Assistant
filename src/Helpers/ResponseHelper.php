<?php


namespace Kouja\ProjectAssistant\Helpers;


class ResponseHelper
{


    /**
     * @param mixed $data
     * @return \Illuminate\Http\JsonResponse
     */
    public static function select($data = null)
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
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public static function delete($msg = "Deleted Successfully")
    {
        return response()->json(['status' => 'OK', 'msg' => $msg], 250);
    }


    /**
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */

    public static function MissingParameter($msg = "Missing Required Param")
    {
        return response()->json(['status' => 'ERROR', 'msg' => $msg], 400);
    }

    /**
     * @param mixed
     * isEmpty Array exception
     * @return \Illuminate\Http\JsonResponse
     */
    public static function DataNotFound($msg = "Data Not Found")
    {
        return response()->json(['status' => 'ERROR', 'msg' => $msg], 410);
    }

    /**
     * @param string $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public static function AlreadyExists($msg = "Already Exists")
    {
        return response()->json(['status' => 'ERROR', 'msg' => $msg], 420);
    }

    /**
     * @param mixed
     * not authorized user
     * @return \Illuminate\Http\JsonResponse
     */
    public static function authenticationFail($msg = "Not Authenticated")
    {
        return response()->json(['status' => 'ERROR', 'msg' => $msg], 430);
    }

    /**
     * @param null $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public static function authorizationFail($msg = "Not Authorized")
    {
        return response()->json(['status' => 'ERROR', 'msg' => $msg], 440);
    }


    public static function invalidPhone($msg = "Invalid Phone")
    {
        return response()->json(['status' => 'ERROR' , 'msg' => $msg] , 450);
    }


    public static function invalidData($msg = "Invalid Data")
    {
        return response()->json(['status' => 'ERROR', 'msg' => $msg], 460);
    }


    /**
     * @param null $msg
     * @return \Illuminate\Http\JsonResponse
     */
    public static function operationFail($msg = "Operation Fail")
    {
        return response()->json(['status' => 'ERROR', 'msg' => $msg], 510);
    }


    





}
