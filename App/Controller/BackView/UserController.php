<?php

namespace App\Controller\BackView;

use App\Model\Users;
use System\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class UserController extends Controller
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
        $users = Users::get();
        //cuando viene un solo objeto
        if (is_object($users)) {
            $users = [$users];
        }

        // dd($users);
        return view('users/index', [
            'titleWeb' => 'panel de usuarios',
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('users/create', [
            'titleWeb' => 'panel de usuarios',
        ]);
    }

    public function store()
    {
        $data = $this->request()->getInput();
        // dd($data);
        $valid = $this->validate($data, [
            'name' => 'required|alpha_space|min:3|max:20',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required|alpha_numeric|min:3|max:12',
            'rango' => 'required',
            'estado' => 'alpha_numeric',
        ]);
        if ($valid !== true) {
            return back()->route('users.create', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {

            if (!empty($data->photo["tmp_name"])) {
                //generar nombre unico para la imagen
                $nameImage = md5(uniqid(rand(), true)) . '.jpg';
                //modificar imagen
                $image = Image::make($data->photo['tmp_name'])->fit(200, 200);
                //agregar al objeto
                $data->photo = $nameImage;

                //guardar imagen
                if (!is_dir(DIR_IMG)) {
                    mkdir(DIR_IMG);
                }

                $image->save(DIR_IMG . $nameImage);
            } else {
                $data->photo = null;
            }

            Users::create($data);
            return redirect()->route('users.index');
        }
    }

    public function edit()
    {
        $id = $this->request()->getInput();

        if (empty((array)$id)) {
            $user = null;
        } else {
            $user = Users::first($id->id);
        }

        return view('users.edit', [
            'data' => $user,
        ]);
    }

    public function update()
    {
        $data = $this->request()->getInput();

        $valid = $this->validate($data, [
            'name' => 'required|alpha_space|min:3|max:20',
            'email' => 'required',
            'password' => 'required|alpha_numeric|min:3|max:12',
            'rango' => 'required',
            'estado' => 'alpha_numeric',
        ]);
        if ($valid !== true) {
            return back()->route('users.edit', [
                'err' =>  $valid,
                'data' => $data,
            ]);
        } else {

            if (!empty($data->photo["tmp_name"])) {
                //generar nombre unico para la imagen
                $nameImage = md5(uniqid(rand(), true)) . '.jpg';
                //modificar imagen
                $image = Image::make($data->photo['tmp_name'])->fit(200, 200);
                //agregar al objeto
                $data->photo = $nameImage;

                $user = Users::first($data->id);

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

            Users::update($data->id, $data);
            return redirect()->route('users.index');
        }
    }

    public function destroy()
    {
        $data = $this->request()->getInput();

        $user = Users::first($data->id);
        //eliminar imagen anterior
        $photoExists = file_exists(DIR_IMG . $user->photo);
        if ($photoExists) {
            unlink(DIR_IMG . $user->photo);
        }

        $result = Users::delete((int)$data->id);
        return redirect()->route('users.index');
    }
}
