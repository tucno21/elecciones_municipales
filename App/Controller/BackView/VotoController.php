<?php

namespace App\Controller\BackView;

use App\Model\Design;
use System\Controller;
use App\Model\Students;
use App\Model\Candidates;

class VotoController extends Controller
{
    public function __construct()
    {
        //enviar 'auth' si ha creado session sin clave de lo contrario enviar la clave
        $this->middleware('student');
        //enviar el nombre de la ruta
        //$this->except(['users', 'users.create'])->middleware('loco');
    }

    public function index()
    {
        $candidatos = Candidates::get();
        $colegio = Design::get();
        // dd($candidatos);
        return view('tuvoto/index', [
            'candidatos' => $candidatos,
            'colegio' => $colegio,
        ]);
    }

    public function store()
    {
        $data = $this->request()->getInput();

        if (!isset($data->candidatoId)) {
            $errores[] = 'Debe seleccionar un candidato';
            return back()->route('tuvoto.index', [
                'errores' => $errores,
            ]);
        } else {
            $arr['candidatoId'] = $data->candidatoId;
            $arr['date_access'] = date('Y-m-d H:i:s');
            // dd($data->id);
            Students::update($data->id, $arr);
            auth()->remove('student');
            return redirect()->route('login.index');
        }
    }
}
