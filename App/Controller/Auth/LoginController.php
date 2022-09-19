<?php

namespace App\Controller\Auth;

use App\Model\Users;
use System\Controller;
use App\Model\Students;
use App\Model\VotingDate;


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
            'dni' => 'required|integer|between:8,8|not_unique:Students,dni',
        ]);
        // dd($valid);
        if ($valid !== true) {
            return back()->route('login.index', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {
            $fechaVoto = VotingDate::find(1);
            $student = Students::where('dni', $data->dni)->get();

            $fechaHoy = date("Y-m-d");
            $horahoy = date("H:i:s");

            if ($fechaVoto->fecha == $fechaHoy) {
                if ($horahoy >= $fechaVoto->hora_inicio && $horahoy <= $fechaVoto->hora_fin) {
                    if ($student->candidatoId == null || $student->candidatoId == '' || $student->candidatoId == 0) {
                        auth()->set('student', $student);
                        return redirect()->route('tuvoto.index');
                    } else {
                        session()->flash('errorSesion', 'Usted ya voto no puede entrar');
                        return redirect()->route('login.index');
                    }
                } else {
                    $newTimeStart = date('h:i A', strtotime($fechaVoto->hora_inicio));
                    $newTimeEnd = date('h:i A', strtotime($fechaVoto->hora_fin));

                    session()->flash('errorSesion', 'La votacion es de: ' . $newTimeStart . ' a ' . $newTimeEnd);
                    return redirect()->route('login.index');
                }
            } else {
                $newDate = implode('-', array_reverse(explode('-', $fechaVoto->fecha)));

                session()->flash('errorSesion', 'La fecha de votacion es: ' . $newDate);
                return redirect()->route('login.index');
            }
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
