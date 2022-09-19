<?php

namespace App\Controller\BackView;

use App\Model\Design;
use System\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class DesignController extends Controller
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
        $design =  Design::get();

        return view('design/index', [
            'titleWeb' => 'panel de diseño',
            'di' => $design
        ]);
    }

    public function edit()
    {
        $id = 1;

        $rol = Design::first($id);

        return view('design.edit', [
            'data' => $rol,
        ]);
    }

    public function update()
    {
        $data = $this->request()->getInput();

        $valid = $this->validate($data, [
            'name_ie' => 'required',
            'color_b' => 'required',
            'color_s' => 'required',
            'fecha' => 'required',
        ]);

        if ($valid !== true) {
            return back()->route('design.edit', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {

            if (!empty($data->photo["tmp_name"])) {
                //generar nombre unico para la imagen
                $nameImage = md5(uniqid(rand(), true)) . '.png';
                //modificar imagen
                $image = Image::make($data->photo['tmp_name'])->fit(400, 450);
                //agregar al objeto
                $data->photo = $nameImage;

                $user = Design::first($data->id);

                //eliminar imagen anterior
                $photoExists = file_exists(DIR_IMG . $user->photo);
                if ($photoExists) {
                    unlink(DIR_IMG . $user->photo);
                }

                //guardar imagen
                if (!is_dir(DIR_IMG)) {
                    mkdir(DIR_IMG);
                }

                $image->save(DIR_IMG . $nameImage);
            } else {
                $data->photo = null;
            }

            Design::update($data->id, $data);
            return redirect()->route('design.index');
        }
    }
}
