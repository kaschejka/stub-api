<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class getLogController extends Controller

{

public function eventModify($event)
{
  $temp = json_decode(strstr($event,'{'));
$result = [];

    if (isset($temp->event) && isset($temp->event->type)) {
         if ($temp->event->type == 'o' || $temp->event->type == 's' || $temp->event->type == 'h'  || $temp->event->type == 't') {
           if (isset($temp->date_time)) {
             $result['date_time'] = $temp->date_time;
           } else {
             $result['date_time'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->data)) {
             $result['data'] = $temp->data;
           } else {
             $result['data'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->event)) {
             $result['event'] = $temp->event;
           } else {
             $result['event'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->redirect_number)) {
             $result['redirect_number'] = $temp->redirect_number;
           } else {
             $result['redirect_number'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->h323_conf_id)) {
             $result['h323_conf_id'] = $temp->h323_conf_id;
           } else {
             $result['h323_conf_id'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->numberA)) {
             $result['numberA'] = $temp->numberA;
           } else {
             $result['numberA'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->sip_id)) {
             $result['sip_id'] = $temp->sip_id;
           } else {
             $result['sip_id'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->client_id)) {
             $result['client_id'] = $temp->client_id;
           } else {
             $result['client_id'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->extension)) {
             $result['extension'] = $temp->extension;
           } else {
             $result['extension'] = 'PARAMETR IS MISSING!';
           }
         } elseif ($temp->event->type == 'sp' || $temp->event->type == 'ep') {
           if (isset($temp->date_time)) {
             $result['date_time'] = $temp->date_time;
           } else {
             $result['date_time'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->data)) {
             $result['data'] = $temp->data;
           } else {
             $result['data'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->event)) {
             $result['event'] = $temp->event;
           } else {
             $result['event'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->h323_conf_id)) {
             $result['h323_conf_id'] = $temp->h323_conf_id;
           } else {
             $result['h323_conf_id'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->numberA)) {
             $result['numberA'] = $temp->numberA;
           } else {
             $result['numberA'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->sip_id)) {
             $result['sip_id'] = $temp->sip_id;
           } else {
             $result['sip_id'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->client_id)) {
             $result['client_id'] = $temp->client_id;
           } else {
             $result['client_id'] = 'PARAMETR IS MISSING!';
           }
           if (isset($temp->extension)) {
             $result['extension'] = $temp->extension;
           } else {
             $result['extension'] = 'PARAMETR IS MISSING!';
           }
         } else {
           $result['ERROR'] = 'UNRECOGNIZENT EVENT. New Type event!';
           $result['event'] = strstr($event,'{');
         }
       }
     else {
      $result['ERROR'] = 'UNRECOGNIZENT EVENT';
      $result['event'] = strstr($event,'{');
    }



    return json_encode($result);
}

    public function getLog(Request $req)
    {

      $notif=DB::table('notifications')->where([['date_time','>', strtotime($req->ot)],
        ['date_time','<',strtotime($req->do)]])->get();

echo "?????????? ???????????????????? ?????????????????? ?????????????? = ";
echo count($notif);
echo "<br>";

           foreach ($notif as $notif) {
             echo '['.date("Y-m-d H:i:s",$notif->date_time).']';
             echo "<br>";
             if ($req->original) {
               if ($req->original && $req->modify) {
                 echo "Origin:";
                echo "<br>";
               }

               echo $notif->data;
               echo "<br>";
             }
             if ($req->modify) {
               if ($req->original && $req->modify) {
                 echo "Modify:";
                 echo "<br>";
               }

               echo $this->eventModify($notif->data);
               echo "<br>";
             }

             // echo "________________________________________________________";
             echo "<br>";
           }
    }

public function delLog(Request $req)
     {

       DB::table('notifications')->where([['date_time','>', strtotime($req->otdel)],
         ['date_time','<',strtotime($req->dodel)]])->delete();

        return "DELETE success";
     }

   public function getLogConnector(Request $req)
    {

$time_beetwen = [];



$otv = Redis::command('MGET', range(strtotime($req->ot),strtotime($req->do)));
$otv = array_filter($otv, fn($user) => $user != null);
echo "???????????????????? ?????????????????? ?????????????? - ".count($otv);
echo '<br>';
foreach ($otv  as $key => $value) {

    echo  date("d.m.Y H:i:s", strtotime($req->ot)+$key);
   echo '<br>';
echo $value;
echo '<br>';
echo '-----------------';
echo '<br>';
}


    }

    public function delLogConnector(Request $req)
     {

$k =  Redis::command('DEL', range(strtotime($req->otdel),strtotime($req->dodel)));

        return "DELETE success - ".$k.' ??????????????????';
     }

     public function mtsGet(Request $req)
      {

        $notif=DB::table('mts')->where([['date_time','>', strtotime($req->ot)],
          ['date_time','<',strtotime($req->do)]])->get();

     echo "?????????? ???????????????????? ?????????????????? ?????????????? = ";
     echo count($notif);
     echo "<br>";
             foreach ($notif as $notif) {
             echo '['.date("Y-m-d H:i:s",$notif->date_time).']';
             echo "<br>";
             echo $notif->data;
             echo "<br>";
             }
      }

      public function mtsDel(Request $req)
       {

         DB::table('mts')->where([['date_time','>', strtotime($req->otdel)],
           ['date_time','<',strtotime($req->dodel)]])->delete();

          return "DELETE success";
       }

}
