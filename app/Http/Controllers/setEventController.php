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
 $temp = json_decode(strstr($req,'{'));
//   if (isset($temp->event) && isset($temp->event->type)) {
//     if ($temp->event->type == 'o' || $temp->event->type == 's' || $temp->event->type == 'h'  || $temp->event->type == 't') {
//       if (isset($temp->date_time)) {
//         $result['date_time'] = $temp->date_time;
 //      } else {
  //       $result['date_time'] = 'PARAMETR IS MISSING!';
   //    }
   //    if (isset($temp->data)) {
   //      $result['data'] = $temp->data;
   //    } else {
   //      $result['data'] = 'PARAMETR IS MISSING!';
   //    }
    //   if (isset($temp->event)) {
    //     $result['event'] = $temp->event;
    //   } else {
     //    $result['event'] = 'PARAMETR IS MISSING!';
     //  }
     //  if (isset($temp->redirect_number)) {
     //    $result['redirect_number'] = $temp->redirect_number;
     //  } else {
     //    $result['redirect_number'] = 'PARAMETR IS MISSING!';
     //  }
     //  if (isset($temp->h323_conf_id)) {
     //    $result['h323_conf_id'] = $temp->h323_conf_id;
     //  } else {
     //    $result['h323_conf_id'] = 'PARAMETR IS MISSING!';
     //  }
     //  if (isset($temp->numberA)) {
     //    $result['numberA'] = $temp->numberA;
     //  } else {
     //    $result['numberA'] = 'PARAMETR IS MISSING!';
     //  }
     //  if (isset($temp->sip_id)) {
      //   $result['sip_id'] = $temp->sip_id;
      // } else {
       //  $result['sip_id'] = 'PARAMETR IS MISSING!';
     //  }
     //  if (isset($temp->sip_id)) {
     //    $result['client_id'] = $temp->client_id;
     //  } else {
     //    $result['client_id'] = 'PARAMETR IS MISSING!';
     //  }
    // } elseif ($temp->event->type == 'sp' || $temp->event->type == 'ep') {
     //  if (isset($temp->date_time)) {
     //    $result['date_time'] = $temp->date_time;
     //  } else {
     //    $result['date_time'] = 'PARAMETR IS MISSING!';
     //  }
     //  if (isset($temp->data)) {
     //    $result['data'] = $temp->data;
     //  } else {
     //    $result['data'] = 'PARAMETR IS MISSING!';
     //  }
     //  if (isset($temp->event)) {
     //    $result['event'] = $temp->event;
     //  } else {
      //   $result['event'] = 'PARAMETR IS MISSING!';
     //  }
     //  if (isset($temp->h323_conf_id)) {
     //    $result['h323_conf_id'] = $temp->h323_conf_id;
     //  } else {
     //    $result['h323_conf_id'] = 'PARAMETR IS MISSING!';
     //  }
     //  if (isset($temp->numberA)) {
     //    $result['numberA'] = $temp->numberA;
     //  } else {
     //    $result['numberA'] = 'PARAMETR IS MISSING!';
     //  }
     //  if (isset($temp->sip_id)) {
     //    $result['sip_id'] = $temp->sip_id;
     //  } else {
     //    $result['sip_id'] = 'PARAMETR IS MISSING!';
     //  }
     //  if (isset($temp->client_id)) {
     //    $result['client_id'] = $temp->client_id;
     //  } else {
     //    $result['client_id'] = 'PARAMETR IS MISSING!';
     //  }
     //}
  // }
// else {
//  $result['ERROR'] = 'UNRECOGNIZENT EVENT';
//  $result['event'] = strstr($req,'{');
//}

//     $item->data = json_encode($result);
$item->data = $req;
 $item->date_time = time();
 $item->save();
return $req;

    }


}
