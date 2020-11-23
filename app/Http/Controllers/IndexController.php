<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index($code)
    {
        $check_code = DB::table('users')->where('code', $code)->count();
        if ($check_code > 0) {
            $prize = DB::table('prizes')->get();
            $user = DB::table('users')->get();
            $userPrizeFirst = DB::table('users')->where('prize_id', 1)->get();
            return view(
                'master.index',
                [
                    'prize' => $prize,
                    'user' => $user,
                    'userPrizeFirst' => $userPrizeFirst,
                    'time_server' => '2020-11-23 13:04'
                ]
            );
        }
    }
}
