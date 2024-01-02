<?php

namespace App\Http\Controllers\Voyager;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserManagementController extends Controller
{
    public function getUserData(string $id)
    {
        $user = User::find($id);

        return view("voyager::users.read", compact('user'));
    }

    public function blockUser(string $id) 
    {
        $user = User::find($id);
        $user->is_blocked = true;
        $user->save();

        return back();
    }

    public function unblockUser(string $id)
    {
        $user = User::find($id);
        $user->is_blocked = false;
        $user->save();

        return back();
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->update($request->except('is_business'));

        $user->is_business = $request->has('is_business');
        $user->save();

        return back();
    }
}
