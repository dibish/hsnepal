<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;

class AdminController extends Controller
{
    function index(){
        $data['message_count'] = Message::count();
        return view('admin.dashboard',compact('data'));
    }
}
