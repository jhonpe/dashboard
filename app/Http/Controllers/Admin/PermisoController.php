<?php

namespace App\Http\Controllers\Admin;
use App\Admin\Model\Permiso;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarPermiso;

class PermisoController extends Controller
{
   
    public function index()
    {
       $permiso = Permiso::select('id', 'nombre', 'slug')->get();
        
        if ($permiso) {
            return response()->json([
                'success' => true,
                'message' => 'Listado de Permiso!',
                'data'    => $permiso
            ], 200);
        }
    }

    public function store(ValidarPermiso $request)
    {
        $permiso = Permiso::create([
            'nombre' => $request->input('nombre'),
            'slug'   => $request->input('slug')
        ]);
        
        if ($permiso) {
            return response()->json([
                'success' => true, 
                'message' => 'El Permiso fue creado con exito'
            ], 200);
        }else{
            return response()->json([
                'success' => false, 
                'message' => 'Ocurrió un error al Crear el Permiso'
            ], 404);
        }
    }

    public function show($id)
    {
       $permiso = Permiso::whereId($id)->first();
        
        if ($permiso) {
            return response()->json([
                'success' => true,
                'message' => 'Listado de Permiso por Id!',
                'data'    => $permiso
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'El Permiso no existe',
                'data'    => ''
            ], 404);
        }
    }

    
    public function update(ValidarPermiso $request, $id)
    {
        $permiso = Permiso::whereId($request->input('id'))->update([
            'nombre' => $request->input('nombre'),
            'slug'   => $request->input('slug')
        ]);
        
        if ($permiso) {
            return response()->json([
                'success' => true,
                'message' => 'Permiso actualizado con exito',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Datos no Encontrado',
            ], 400);
        }
    }
    
    public function destroy($id)
    {
        $permiso = Permiso::findOrFail($id);
        $permiso->delete();
        if ($permiso) {
            return response()->json([
                'success' => true,
                'message' => 'El Permiso se ha Eliminado Correctamente',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se puede Eliminar el Permiso!',
            ], 500);
        }
    }
}
