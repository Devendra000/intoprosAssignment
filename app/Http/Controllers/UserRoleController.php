<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use App\Models\Role;

class UserRoleController extends Controller
{
    function relationship(){
        $users = User::with('roles')->get();     
        return view('user-data')->with(compact('users'));
    }
}
