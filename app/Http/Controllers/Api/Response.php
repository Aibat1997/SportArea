<?php


namespace App\Http\Controllers\Api;


class Response
{
    public $status = false;
    public $message;
    public $content;

    public function json()
    {
        $response = [
            "status" => $this->status,
            "message" => $this->message,
            "content" => $this->content,
        ];
        return response()->json($response);
    }
}
