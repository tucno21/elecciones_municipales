<?php

namespace App\Controller\BackView;

use System\Controller;
use App\Model\VotingDate;

class VotingDateController extends Controller
{
    public function __construct()
    {
        //enviar 'auth' si ha creado session sin clave de lo contrario enviar la clave
        $this->middleware('auth');
        //enviar el nombre de la ruta
        //$this->except(['users', 'users.create'])->middleware('loco');
    }

    public function index()
    {
        $fh = VotingDate::first();
        //formato de fecha
        $newDate = implode('-', array_reverse(explode('-', $fh->fecha)));
        $fh->fecha =  $newDate;
        //formato de hora inicio
        $newTimeStart = date('h:i A', strtotime($fh->hora_inicio));
        $fh->hora_inicio =  $newTimeStart;
        //formato de hora fin
        $newTimeEnd = date('h:i A', strtotime($fh->hora_fin));
        $fh->hora_fin =  $newTimeEnd;

        return view('votingdate/index', [
            'titleWeb' => 'panel de fecha de votación',
            'fh' => $fh,
        ]);
    }

    public function edit()
    {
        return view('votingdate.edit', [
            // 'data' => $date,
        ]);
    }

    public function update()
    {
        $data = $this->request()->getInput();

        $valid = $this->validate($data, [
            'fecha' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        ]);

        if ($valid !== true) {
            return back()->route('votingdate.edit', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {
            $modFecha = explode('-', $data->fecha);
            $data->fecha = $modFecha[2] . '-' . $modFecha[1] . '-' . $modFecha[0];
            // dd($data);
            $id = 1;
            VotingDate::update($id, $data);
            return redirect()->route('votingdate.index');
        }
    }
}
