<?php

namespace App\Controller\Auth;

use App\Model\Users;
use System\Controller;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth/index', [
            'title' => 'Login Estudiantes',
        ]);
    }



    public function store()
    {
        $data = $this->request()->getInput();

        $valid = $this->validate($data, [
            'dni' => 'required|integer|between:8,8',
        ]);
        // dd($valid);
        if ($valid !== true) {
            return back()->route('login.index', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {
            echo 'hola';
            $user = Users::select('id, email, name', 'estado', 'rango')->where('email', $data->email)->get();
            dd($user);
            // auth()->attempt($user);

            // return redirect()->route('dashboard');
        }
    }

    public function admin()
    {
        return view('auth/admin', [
            'title' => 'Login administrador',
        ]);
    }

    public function adminstore()
    {
        $data = $this->request()->getInput();
        // dd($data);
        $valid = $this->validate($data, [
            'email' => 'required|email|not_unique:Users,email',
            'password' => 'required|password_verify:Users,email',
        ]);

        if ($valid !== true) {
            return back()->route('login.admin', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {
            // echo 'hola';
            $user = Users::select('id, email, name', 'estado', 'rango')->where('email', $data->email)->get();
            // dd($user);
            auth()->attempt($user);
            return redirect()->route('dashboard.index');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.index');
    }
}
