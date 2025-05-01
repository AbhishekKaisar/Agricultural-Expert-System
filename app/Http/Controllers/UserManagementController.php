<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all(); // fetch all users from database
        return view('frontend.user-management.index', compact('users'));
    }

}
