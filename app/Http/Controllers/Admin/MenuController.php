<?php

namespace App\Http\Controllers\Admin;
use App\Admin\Model\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionMenu;


class MenuController extends Controller
{
        
        public function index()
        {
            $menu = Menu::getMenu();
            return response()->json($menu);
        }

        public function store(ValidacionMenu $request)
        {
            $menu = Menu::create([
                'nombre' => $request->input('nombre'),
                'url'    => $request->input('url'),
                'icono'  => $request->input('icono')
            ]);
        
            if ($menu) {
                return response()->json([
                    'success' => true, 
                    'message' => 'El Item fue creado con éxito '
                ], 200);
            }else{
                return response()->json([
                    'success' => false, 
                    'message' => 'Ocurrió un error al Crear el Item del Menú'
                ], 404);
            }
        }
    
        public function show($id)
        {
            $menu = Menu::whereId($id)->first();
            
            if ($menu) {
                return response()->json([
                    'success' => true,
                    'message' => 'Detalle del Item!',
                    'data'    => $menu
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Ocurrió un error Item no Existe',
                    'data'    => ''
                ], 404);
            }
        }
    
        public function update(ValidacionMenu $request, $id)
        {
            $menu = Menu::whereId($request->input('id'))->update([
                'nombre'  => $request->input('nombre'),
                'url'     => $request->input('url'),
                'icono'   => $request->input('icono'),
            ]);
            
            if ($menu) {
                return response()->json([
                    'success' => true,
                    'message' => 'El Item fue Actualizado correctamente',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Datos no Encontrado',
                ], 500);
            }
        }
    
        public function destroy($id)
        {
            $menu = Menu::findOrFail($id);
            $menu->delete();
            if ($menu) {
                return response()->json([
                    'success' => true,
                    'message' => 'Se ha eliminado el Item del Menú Correctamente',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No se puede Eliminar el Item del Menú!',
                ], 500);
            }
        }
    
        public function guardarOrden(Request $request)
        {
            $menu = new Menu;
            $menu->guardarOrden($request->menu);
            if ($menu) {
                return response()->json([
                    'success' => true,
                    'message' => 'ok',
                ], 200);
                } else {
            return response()->json([
                    'success' => false,
                    'message' => 'No se Actualizar el orden!',
                ], 404);
            }
        }
}