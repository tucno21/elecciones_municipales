<?php

namespace App\Controller\BackView;

use System\Controller;
use App\Model\Students;
use App\Model\Candidates;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class DashboardController extends Controller
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
        $candidatos = Candidates::get();
        $estudiantes = Students::get();

        $votos = Candidates::AllVotos();
        $resul = [];
        foreach ($votos as $key => $value) {
            array_push($resul, $value->name);
        }
        $resul2 = array_count_values($resul);
        $resultados = (object)$resul2;

        //ganador
        $max = 0;
        $ganador = '';
        foreach ($resultados as $key => $value) {
            if ($value > $max) {
                $max = $value;
                $ganador = $key;
            }
        }

        $alcalde = ['cant' => $max, 'name' => $ganador];

        return view('dashboard/index', [
            'titleWeb' => 'Panel Administrativo',
            'candidatos' => $candidatos,
            'estudiantes' => $estudiantes,
            'votos' => $votos,
            'resultados' => $resultados,
            'alcalde' => (object)$alcalde
        ]);
    }

    public function excel()
    {

        // $query = "SELECT C.name, C.group_name, COUNT(E.voto) maximo 
        // FROM students E 
        // INNER JOIN candidatos C ON E.voto = C.id 
        // GROUP BY voto 
        // ORDER BY maximo DESC";

        $query = "SELECT C.name, C.group_name, COUNT(E.candidatoId) maximo 
        FROM candidatos C 
        INNER JOIN students E ON C.id = E.candidatoId 
        GROUP BY candidatoId 
        ORDER BY maximo DESC";

        $resultados = Candidates::querySimple($query);


        $excel = new Spreadsheet();
        $hojaActiva = $excel->getActiveSheet();
        $hojaActiva->setTitle('resultados');
        $hojaActiva->getTabColor()->setRGB('FF0000');

        $hojaActiva->getColumnDimension('A')->setWidth(5);
        $hojaActiva->setCellValue('A1', 'N');
        $hojaActiva->getColumnDimension('B')->setWidth(30);
        $hojaActiva->setCellValue('B1', 'NOMBRE GRUPO');
        $hojaActiva->getColumnDimension('C')->setWidth(30);
        $hojaActiva->setCellValue('C1', 'NOMBRE CANDIDATO');
        $hojaActiva->getColumnDimension('D')->setWidth(8);
        $hojaActiva->setCellValue('D1', 'VOTOS TOTAL');


        $fila = 2;
        foreach ($resultados as $value) {
            $hojaActiva->setCellValue('A' . $fila, $fila - 1);
            $hojaActiva->setCellValue('B' . $fila, $value->group_name);
            $hojaActiva->setCellValue('C' . $fila, $value->name);
            $hojaActiva->setCellValue('D' . $fila, $value->maximo);
            $fila++;
        }

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="resultados.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($excel, 'Xlsx');
        $writer->save('php://output');
        exit;
    }
}
