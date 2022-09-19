<?php

namespace App\Controller\BackView;

use System\Controller;
use App\Model\Students;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class StudentController extends Controller
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
        $estudiantes = Students::get();
        //cuando viene un solo objeto
        if (is_object($estudiantes)) {
            $estudiantes = [$estudiantes];
        }

        return view('students/index', [
            'titleWeb' => 'panel de estudiantes',
            'estudiantes' => $estudiantes
        ]);
    }

    public function create()
    {
        return view('students/create', [
            'titleWeb' => 'panel de estudiantes',
        ]);
    }

    public function store()
    {
        $data = $this->request()->getInput();

        $valid = $this->validate($data, [
            'name' => 'required|alpha_space|min:3|max:20',
            'dni' => 'required|integer|between:8,8',
            'aula' => 'required|alpha_numeric|between:2,2',
        ]);
        if ($valid !== true) {
            return back()->route('students.create', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {
            Students::create($data);
            return redirect()->route('students.index');
        }
    }

    public function edit()
    {
        $id = $this->request()->getInput();

        if (empty((array)$id)) {
            $student = null;
        } else {
            $student = Students::first($id->id);
        }
        return view('students.edit', [
            'data' => $student,
        ]);
    }

    public function update()
    {
        $data = $this->request()->getInput();

        $valid = $this->validate($data, [
            'name' => 'required|alpha_space|min:3|max:20',
            'dni' => 'required|integer|between:8,8',
            'aula' => 'required|alpha_numeric|between:2,2',
        ]);
        if ($valid !== true) {
            return back()->route('students.edit', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {
            Students::update($data->id, $data);
            return redirect()->route('students.index');
        }
    }

    public function destroy()
    {
        $data = $this->request()->getInput();
        $result = Students::delete((int)$data->id);
        return redirect()->route('students.index');
    }

    public static function tablemodel()
    {
        $excel = new Spreadsheet();
        $hojaActiva = $excel->getActiveSheet();
        $hojaActiva->setTitle('modelo');
        $hojaActiva->getTabColor()->setRGB('FF0000');

        $hojaActiva->getColumnDimension('A')->setWidth(30);
        $hojaActiva->setCellValue('A1', 'NOMBRE Y APELLIDOS');
        $hojaActiva->getColumnDimension('B')->setWidth(15);
        $hojaActiva->setCellValue('B1', 'DNI');
        $hojaActiva->getColumnDimension('C')->setWidth(10);
        $hojaActiva->setCellValue('C1', 'AULA');

        $hojaActiva->setCellValue('A2', 'Juan Velarde Fajardo');
        $hojaActiva->setCellValue('B2', '44442222');
        $hojaActiva->setCellValue('C2', '1A');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="modelo.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}
