<?php

namespace App\Http\Controllers;

use App\Model\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $rows = Users::all();
        return view('users.index',compact('rows'));
    }
}
