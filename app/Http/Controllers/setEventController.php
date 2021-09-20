<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notifications;
use App\Models\notifConnector;
use App\Models\mts;
use Illuminate\Support\Facades\Redis;


class setEventController extends Controller
{
    public function setEvent(Request $req)
    {

           $env = 'prod';
 $item = new notifications;
 $item->env = $env;
$item->data = $req;
 $item->date_time = time();
 $item->save();
return $req;

    }

    public function setEventConnector(Request $req)
    {

           $env = 'prod';
 $item = new notifConnector;
 $item->env = $env;
$item->data = $req;
 $item->date_time = time();
 $item->save();
Redis::set(time(), $req);
return $req;

    }

    public function mtsSetEvent(Request $req)
    {

    $item = new mts;
    $item->data = $req;
    $item->date_time = time();
    $item->save();
    return $req;

    }

}
