<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redis;

class MessageController extends Controller
{
    //

  public function sendMessage(Request $request)
  {


    //return $request->message;
    $redis = Redis::connection();
    $redis->publish("message",$request->message);
    # code...
  }
}
