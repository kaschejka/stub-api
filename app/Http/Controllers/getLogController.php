<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class getLogController extends Controller
{
    public function getLog(Request $req)
    {
      $notif=DB::table('notifications')->where([['date_time','>', strtotime($req->ot)],
        ['date_time','<',strtotime($req->do)]])->get();

echo "Общее количество пришедщих евентов = ";
echo count($notif);
echo "<br>";
           foreach ($notif as $notif) {
           echo '['.date("Y-m-d H:i:s",$notif->date_time).']';
           echo "<br>";
           echo $notif->data;
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

      $notif=DB::table('notifConnector')->where([['date_time','>', strtotime($req->ot)],
        ['date_time','<',strtotime($req->do)]])->get();

echo "Общее количество пришедших евентов = ";
echo count($notif);
echo "<br>";
           foreach ($notif as $notif) {
           echo '['.date("Y-m-d H:i:s",$notif->date_time).']';
           echo "<br>";
           echo $notif->data;
           echo "<br>";
           }
    }

    public function delLogConnector(Request $req)
     {

       DB::table('notifConnector')->where([['date_time','>', strtotime($req->otdel)],
         ['date_time','<',strtotime($req->dodel)]])->delete();

        return "DELETE success";
     }

}
