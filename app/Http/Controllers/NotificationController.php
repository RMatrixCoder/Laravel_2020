<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmail;
use App\Models\User;
use App\Services\Notification\Constant\EmailType;
use App\Services\Notification\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function sendEmail(Request $request){

        $request->validate([
            'user'=>'integer | exists:users,id',
            'email_type'=>'integer'
        ]);

        try {
            // $notification = resolve(Notification::class);
            $mailable = EmailType::toMail($request->email_type);
            // $notification->sendEmail(User::find($request->user),new $mailable);
            SendEmail::dispatch(User::find($request->user),new $mailable);
            return back()->with('success','Your email has been sent successfully');
        } catch (\Throwable $th) {
            return back()->with('fail','there is a problem in our system.please try it later');
        }
    }
}
