<?php

namespace App\Http\Controllers\Admin;
use App\Admin\Model\Rol;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ValidacionRol;


class RolController extends Controller
{
  
    public function index()
    {
        
        $rol = Rol::select('id', 'nombre', 'status')->get();
        
        if ($rol) {
            return response()->json([
                'success' => true,
                'message' => 'Listado de Roles!',
                'data'    => $rol
            ], 200);
        }
    }

    public function store(ValidacionRol $request)
    {
        $rol = Rol::create([
            'nombre' => $request->input('nombre'),
            'status' => $request->input('status')
        ]);
        
        if ($rol) {
            return response()->json([
                'success' => true, 
                'message' => 'El Rol fue creado con exito'
                ], 200);
        }else{
            return response()->json([
                'success' => false, 
                'message' => 'Ocurrió un error al Crear el Rol'
                ], 404);
        }
     }

    public function show($id)
    {
        $rol = Rol::whereId($id)->first();
        
        if ($rol) {
            return response()->json([
                'success' => true,
                'message' => 'Listado Id por Rol!',
                'data'    => $rol
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Rol no existe',
                'data'    => ''
            ], 404);
        }
    }

    public function update(ValidacionRol $request, $id)
    {
        $rol = Rol::whereId($request->input('id'))->update([
            'nombre'  => $request->input('nombre'),
            'status'  => $request->input('status'),
        ]);
        
        if ($rol) {
            return response()->json([
                'success' => true,
                'message' => 'El Rol fue Actualizados correctamente',
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
        $rol = Rol::findOrFail($id);
        $rol->delete();
        if ($rol) {
            return response()->json([
                'success' => true,
                'message' => 'El Rol se ha Eliminado Correctamente',
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'No se puede Eliminar Rol!',
            ], 500);
        }
    }
}