<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Kutia\Larafirebase\Facades\Larafirebase;

class NotificationController extends Controller
{
    public function index(){
        return view('home');
    }

    public function updateToken(Request $request){
        try{
            User::first()->update(['mobile_token'=>$request->token]);
            return response()->json([
                'success'=>true
            ]);
        }catch(\Exception $e){
            report($e);
            return response()->json([
                'success'=>false
            ],500);
        }
    }


    public function notification(Request $request){
        try{
            $fcmTokens = User::whereNotNull('mobile_token')->pluck('mobile_token')->toArray();

            Larafirebase::withTitle($request->title)
                ->withBody($request->body)
                ->sendMessage($fcmTokens);

            return back()->with('success','Notification Sent Successfully!!');

        }catch(\Exception $e){
            report($e);
            return redirect()->back()->with('error','Something goes wrong while sending notification.');
        }
    }
}
