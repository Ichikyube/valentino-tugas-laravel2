<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Product;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function dash(Request $request){
        $products = Product::all();
        $posts = Post::latest()->get();
        $data = $products->concat($posts);
        return view('dashboard', ['posts' => $data]);
    }

    function register(Request $request) {
        if ($request->method() == "GET") {
            return view("auth.register");
        }

        $payload = $request->all();
        $user = User::query()
            ->where("email", $payload["email"])
            ->first();
        if($user != null) {
            return redirect()->back()->withErrors(["msg" => "You've already registered! Just past to Login"]);
        }
        $profile = Profile::create(['username' => request('name')]);
        $payload['password'] = Hash::make($payload['password'], [ 'rounds' => 12 ]);
        $payload['profile_id'] = $profile->id;
        $user = User::query()->create($payload);
        return redirect()->route("auth.login");
    }

    function login(Request $request) {
        if ($request->method() == "GET") {
            return view("auth.login");
        }
        $email =$request->input("email");
        $password = $request->input("password");
        $user = User::query()
        ->where("email", $email)
        ->firstOr(fn() => redirect()->withErrors(["msg" => "Your email is not registered! Please register first"]));

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            if(!session()->isStarted()) session()->start();
            session()->put("logged", true);
            session()->put("idUser", $user->id);
            return redirect()->route('auth.dashboard');
        }
        else {
            return back()
            ->withErrors([
                'msg' => "Wrong Password!"
            ]);
        }


    }

    function logout() {
        session()->flush();
        return redirect()->route("auth.login");
    }

}
