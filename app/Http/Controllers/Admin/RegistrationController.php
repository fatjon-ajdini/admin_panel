<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function create() {
        return view('admin.registration.create');
    }

    public function store()
    {
        $this->authorize('create-users');
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|between:8,255',
            // 'password_confirmation' => 'required|between:8,255|confirmed'
        ]);
        
        $user = new User;
        $user = User::create(request(['name', 'email', 'password']));
        $user->password = Hash::make(request()->password);
        $user->save();
        return redirect()->to('/admin/users');
        
        // auth()->login($user);
        

        // $this->authorize('create-users');

        // $this->validate(request(), [
        //     "name" => "string",
        //     "email" => "string",
        //     "password" => "string",
        // ]);
        

        // $user = new User;

        // $user = User::factory()->create([
        //     'name' => request()->name,
        //     'email' => request()->email,
        //     'password' => request()->password
        // ]);


        // $user->password = Hash::make(request()->password);

        // $user->save();

        // $user->email_verified_at = now();
        // $user->save();

        // return redirect()->to('/admin/users');
    }
}
