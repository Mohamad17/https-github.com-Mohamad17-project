<?php
namespace App\Http\Traits\ApiTrait;

trait ApiResponser
{
    protected function successResponse($data,$statusCode, $message=null)
    {
        return response()->json([
            'status'=> 'success',
            'message'=> $message,
            'date'=> $data,
        ], $statusCode);
    }

    protected function errorResponse($statusCode, $message)
    {
        return response()->json([
            'status'=> 'error',
            'message'=> $message,
            'date'=>'',
        ], $statusCode);
    }
}