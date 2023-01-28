<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function register(Request $request) {
        if ($request->method() == "GET") {
            return view("auth.register");
        }

        $payload = $request->all();
        $user = User::query()
            ->where("email", $payload["email"])
            ->first();
        if($user != null) {
            return response()->json([
                "status" => false,
                "message" => "email telah terdaftar",
                "Data" => null
            ]);
        }
        $user = User::query()->create($payload);
        $token = $user->createToken("authorization");
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
        ->firstOr(fn() => redirect()->withErrors(["msg" => "Your email is not registered! Please register first"])->back());


        if(!Hash::check($password, $user->password)) {
            return redirect()
            ->back()
            ->withErrors([
                'msg' => "Wrong Passowrd!"
            ])->back();
        }

        if(!session()->isStarted()) session()->start();
        session()->put("logged", true);
        session()->put("idUser", $user->id);
        return redirect()->route("dashboard");
    }

    function logout() {
        session()->flush();
        return redirect()->route("login");
    }

}
