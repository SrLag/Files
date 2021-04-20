<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class FilesController extends Controller
{
   
    public function index()
    {
        $files = File::whereUserId(Auth::id())->latest()->get();
        return view('user.files.index', compact('files'));
    }

    public function show($id)
    {
        //dd($id);
        $file = File::whereCodeName($id)->firstOrFail();
        $user_id = Auth::id();

        if ($file->user_id == $user_id) {
            return redirect('/storage/' . $user_id . '/' . $file->code_name);

        } else {
            abort(403);
            /*
        Alert::error('¡Error!', 'No tienes permisos para ver este archivo');
        return back();*/
        }
    }

    public function store(Request $request)
    {
        $max_size = (int) ini_get('upload_max_filesize') * 10240;

        $files = $request->file('files');
        $user_id = Auth::id();

        if ($request->hasFile('files')) {
            foreach ($files as $file) {
                $fileName = 
                    encrypt($file->getClientOriginalName())
                     . '.' . 
                    $file->getClientOriginalExtension();
                if (Storage::putFileAs('/public/' . $user_id . '/', $file, $fileName)) {
                    File::create([
                        'name' => $file->getClientOriginalName(),
                        'code_name' => $fileName,
                        'user_id' => $user_id,
                    ]);
                }
            }
            Alert::success('Carga completada', 'Se cargo con éxito');
            //alert()->image('Image Title!','Image Description','Image URL','Image Width','Image Height');
            return back();

        } else {
            Alert::error('¡Error!', 'Debes cargar uno o más archivos');
            return back();
        }

    }
    public function destroy(Request $request, $id){

        //busca el archivo que se quiere eliminar
        $file = File::whereCodeName($id)->firstOrFail();
        //unlink elimina el archivo de la aplicacion
        unlink(public_path('storage/'. Auth::id() .'/' . $file->code_name));

        //eliminar de base de datos
        $file->delete();

        //avisar que se ha borrado archivo al usuario
        Alert::info('¡Ateción!', 'Se ha eliminado el archivo');
            return back();
    }

}
