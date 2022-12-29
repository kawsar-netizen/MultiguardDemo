<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackupTableController extends Controller
{
    public function TableBackup(){
        $table = "Copied_".strtotime(date("Y-m-d H:i:s"));
        $query = "create table ".$table."(
          id bigint (20) UNSIGNED NOT NULL,
          name varcher (255),
          phone varcher (11),
          email varcher (255),
          created_at timestamp NULL DEFAULT NULL,
          DEFAULT timestamp NULL DEFAULT NULL
        )";
        $ct = DB::Connection()->getpdo()->exec($query);
        echo"Table created";
    }
}
