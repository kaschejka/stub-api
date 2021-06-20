<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\notifications;
use App\Models\notifConnector;

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


}
