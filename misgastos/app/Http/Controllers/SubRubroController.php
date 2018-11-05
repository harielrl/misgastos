<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubRubro;

class SubRubroController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');    // Listar todos los rubros
        $buscar   = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar == ''){
            $subrubros =  subRubro::join('rubros','subrubros.idrubro','=','rubros.id')
            ->select('subrubros.id','subrubros.idrubro','subrubros.subrubro','rubros.rubro','subrubros.condicion')
            ->orderBy('subrubros.id','desc')->paginate(5);
        }
        else{
            $subrubros =  subRubro::join('rubros','subrubros.idrubro','=','rubros.id')
            ->select('subrubros.id','subrubros.idrubro','subrubros.subrubro','rubros.rubro','subrubros.condicion')
            ->where('subrubros.'.$criterio,'like','%'.$buscar.'%')
            ->orderBy('subrubros.id','desc')->paginate(5);
            
        }
        
        return [
            'pagination' => [
                'total'        => $subrubros-> total(),
                'current_page' => $subrubros-> currentPage(),
                'per_page'     => $subrubros-> perPage(),
                'last_page'    => $subrubros-> lastPage(),
                'from'         => $subrubros-> firstItem(),
                'to'           => $subrubros-> lastItem(), 
            ],
            'subrubros' => $subrubros
        ];
    }   

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $subrubro = new Rubro();
        $subrubro->idrubro = $request -> idrubro;
        $subrubro->subrubro = $request -> subrubro;
        $subrubro->condicion = 1;
        $subrubro->save();
    }

    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $subrubro = SubRubro::findOrFail($request->id);
        $subrubro->subrubro = $request -> subrubro;
        $subrubro->condicion = '1';
        $subrubro->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $subrubro = SubRubro::findOrFail($request->id);
        $subrubro->condicion = '0';
        $subrubro->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $subrubro = SubRubro::findOrFail($request->id);
        $subrubro->condicion = '1';
        $subrubro->save();
    }
}
