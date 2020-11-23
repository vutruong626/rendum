<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Excel;
use App\User;

class MyController extends Controller
{
    public function ImportExcel()
    {
        $path = public_path('User.xlsx');
        $array = Excel::toArray(new UsersImport, $path);

        $import_user = [];

        foreach($array as $keys => $values) {
            foreach($values as $k => $v) {
                $arr = array_filter($v);
                $import_user[] = [
                    'username' => $arr[0],
                    'acount' => $arr[1],
                    'code' => rand(10000,99999)
                ];
            }
        }

        $user = User::insert($import_user);
        return $user;
    }
}
