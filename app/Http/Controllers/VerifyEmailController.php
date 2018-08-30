<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Verification;
use Carbon\Carbon;


class VerifyEmailController extends Controller
{

    public function verify($token)
    {
    	$verification = Verification::where('token', $token)->first();
    	$user = User::findOrFail($verification['user_id']);
    	if(!empty($user))
    	{
    		$now = Carbon::now();
    		$token_time = Carbon::parse($verification['created_at'])->addHours(1);
    		if($now < $token_time)
    		{
    			$user->status = 1;
    			$user->save();
    			$verification->delete();
    			return view('token_successfull');
    		}
    		$verification->delete();
    		$user->delete();
    		return view('token_expired');
    	}
    }
}
