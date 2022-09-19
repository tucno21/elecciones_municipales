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

    public static function report()
    {
        $resultados = Students::get();
        //cuando viene un solo objeto
        if (is_object($resultados)) {
            $resultados = [$resultados];
        }

        $excel = new Spreadsheet();
        $hojaActiva = $excel->getActiveSheet();
        $hojaActiva->setTitle('Participación');
        $hojaActiva->getTabColor()->setRGB('FF0000');

        $hojaActiva->getColumnDimension('A')->setWidth(5);
        $hojaActiva->setCellValue('A1', 'N');
        $hojaActiva->getColumnDimension('B')->setWidth(30);
        $hojaActiva->setCellValue('B1', 'NOMBRE Y APELLIDOS');
        $hojaActiva->getColumnDimension('C')->setWidth(10);
        $hojaActiva->setCellValue('C1', 'DNI');
        $hojaActiva->getColumnDimension('D')->setWidth(7);
        $hojaActiva->setCellValue('D1', 'AULA');
        $hojaActiva->getColumnDimension('E')->setWidth(8);
        $hojaActiva->setCellValue('E1', 'PARTICPACIÓN');
        $hojaActiva->getColumnDimension('F')->setWidth(20);
        $hojaActiva->setCellValue('F1', 'FECHA Y HORA');


        $fila = 2;
        foreach ($resultados as $value) {
            $hojaActiva->setCellValue('A' . $fila, $fila - 1);
            $hojaActiva->setCellValue('B' . $fila, $value->name);
            $hojaActiva->setCellValue('C' . $fila, $value->dni);
            $hojaActiva->setCellValue('D' . $fila, $value->aula);
            if ($value->candidatoId == null || $value->candidatoId == '' || $value->candidatoId == 0) {
                $hojaActiva->setCellValue('E' . $fila, 'no');
            } else {
                $hojaActiva->setCellValue('E' . $fila, 'si');
            }
            $hojaActiva->setCellValue('F' . $fila, $value->date_access);
            $fila++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="estudiantes.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
        exit;
    }


    public function uploaddata()
    {
        return view('students/uploaddata', [
            'titleWeb' => 'panel de estudiantes',
        ]);
    }

    public function uploaddatastore()
    {
        $data = $this->request()->getInput();

        $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

        if (in_array($data->file["type"], $allowedFileType)) {
            //movel el archivo a la carpeta temporal
            $excelPath = DIR_IMG . $data->file['name'];
            move_uploaded_file($data->file['tmp_name'], $excelPath);

            $documentoExcel = IOFactory::load($excelPath);
            $hojaactual = $documentoExcel->getSheet(0);
            $numeroFilas = $hojaactual->getHighestDataRow();



            for ($iFila = 2; $iFila <= $numeroFilas; $iFila++) {
                $valorA = $hojaactual->getCellByColumnAndRow(1, $iFila);
                $valorB = $hojaactual->getCellByColumnAndRow(2, $iFila);
                $valorC = $hojaactual->getCellByColumnAndRow(3, $iFila);

                $data = [
                    'name' => $valorA,
                    'dni' => $valorB,
                    'aula' => $valorC,
                ];

                $result = Students::create($data);
            }

            return redirect()->route('students.index');
        }
    }

    public function deletedata()
    {
        Students::truncate();
        return redirect()->route('students.index');
    }
}
