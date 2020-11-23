<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $code = $request->code ?? '';
        if ($code) {
            $user = User::where('code', $code)->first();
            if ($user) {
                $user->prize_id = 1;
                if ($user->save()) {
                    return $user;
                }
            }
        } else {
            return [];
        }
    }

    public function getUserPrizeFirst()
    {
        return DB::table('users')->where('prize_id', 1)->get();
    }
}
