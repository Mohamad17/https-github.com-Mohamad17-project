<?php
namespace App\Http\Traits\ApiTrait;

trait ApiResponser
{
    protected function successResponse($data,$statusCode, $message=null)
    {
        return response()->json([
            'status'=> 'success',
            'message'=> $message,
            'data'=> $data,
        ], $statusCode);
    }

    protected function errorResponse($statusCode, $message)
    {
        return response()->json([
            'status'=> 'error',
            'message'=> $message,
            'data'=>'',
        ], $statusCode);
    }
}