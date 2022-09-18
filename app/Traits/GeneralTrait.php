<?php

namespace App\Traits;

trait GeneralTrait
{

    public function getCurrentLang()
    {
        return app()->getLocale();
    }

    public function sendResponse($key, $result , $message = ''){
        $response = [
            'status' => true,
            $key => $result,
            'message' => $message
        ];
        return response()->json($response , 200);
    }

    public function sendError($error = "Error" , $code = 404){
        $response = [
            'status' => false,
            'message' => $error
        ];
        return response()->json($response , $code);
    }

    public function sendSuccess($message = "") {
        return [
            'status' => true,
            'message' => $message
        ];
    }
}
