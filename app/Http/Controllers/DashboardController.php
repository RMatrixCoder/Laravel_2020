<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Services\Notification\Constant\EmailType;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $users = User::with(['roles'])->get();
        $emailTypes = EmailType::toString();
        $roles = Role::all();
        return view('notification.sendEmail',compact('users','emailTypes','roles'));
    }


}
