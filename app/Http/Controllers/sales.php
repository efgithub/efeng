<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use DB;

class sales extends Controller {
    public function salesrecord() {
        DB::connection('mysql');
        $rs = DB::select('SELECT * FROM orderhistory WHERE iscancelled <> 1 ORDER BY orderdate DESC');
        return view('sales.salesrecord',['rs'=>$rs]);
    }
    public function salesedit($id) {
        DB::connection('mysql');
        $rs[] = DB::select('SELECT * FROM orderhistory WHERE id = '.$id);
        $rs[] = DB::select('SELECT DISTINCT model FROM orderhistory ORDER BY model;');
        $rs[] = DB::select('SELECT DISTINCT capacity FROM orderhistory ORDER BY capacity;');
        $rs[] = DB::select('SELECT DISTINCT speed FROM orderhistory ORDER BY speed;');
        $rs[] = DB::select('SELECT DISTINCT doortype FROM orderhistory ORDER BY doortype;');
        $rs[] = DB::select('SELECT DISTINCT doorwidth FROM orderhistory ORDER BY doorwidth;');
        return  view('sales.salesedit',['rs'=>$rs]);
    }
    public function salesediting() {
        $sql = "UPDATE orderhistory SET ";
        if ($_POST["txtOrderName"] <> $_POST["tmpOrderName"])
            $sql .= "ordername = '".$_POST["txtOrderName"]."', ";
        if ($_POST["txtClientName"] <> $_POST["tmpClientName"])
            $sql .= "clientname = '".$_POST["txtClientName"]."', ";
        if ($_POST["slModel"] <> $_POST["tmpModel"])
            $sql .= "model = '".$_POST["slModel"]."', ";
        if ($_POST["slCapacity"] <> $_POST["tmpCapacity"])
            $sql .= "capacity = '".$_POST["slCapacity"]."', ";
        if ($_POST["slSpeed"] <> $_POST["tmpSpeed"])
            $sql .= "speed = '".$_POST["slSpeed"]."', ";
        if ($_POST["slDoortype"] <> $_POST["tmpDoortype"])
            $sql .= "doortype = '".$_POST["slDoortype"]."', ";
        if ($_POST["slDoorwidth"] <> $_POST["tmpDoorwidth"])
            $sql .= "doorwidth = '".$_POST["slDoorwidth"]."', ";
        if ($_POST["txtFloor"] <> $_POST["tmpFloor"])
            $sql .= "floor = '".$_POST["txtFloor"]."', ";
        if ($_POST["txtStops"] <> $_POST["tmpStops"])
            $sql .= "stops = '".$_POST["txtStops"]."', ";
        if ($_POST["txtExpectoutdate"] <> $_POST["tmpExpectoutdate"])
            $sql .= "expectoutdate = '".$_POST["txtExpectoutdate"]."', ";
        if ($_POST["txtPrice"] <> $_POST["tmpPrice"])
            $sql .= "price = '".$_POST["txtPrice"]."', ";
        if ($_POST["txtExrate"] <> $_POST["tmpExrate"])
            $sql .= "exrate = '".$_POST["txtExrate"]."', ";
        if ($_POST["txtGross"] <> $_POST["tmpGross"])
            $sql .= "gross = '".$_POST["txtGross"]."', ";
        $sql .= " modidate = now() WHERE id = '".$_POST["tmpId"]."';";
        // DB::update('UPDATE orderhistory WHERE id= $_POST["id"]')
        return $sql;
    }
}