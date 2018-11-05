<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rubro;

class RubroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) return redirect('/');    // Listar todos los rubros
        $buscar   = $request->buscar;
        $criterio = $request->criterio;
        if ($buscar == ''){
            $rubros =  Rubro::orderBy('id','desc')->paginate(5);
        }
        else{
            $rubros =  Rubro::where($criterio,'like','%'.$buscar.'%')->orderBy('id','desc')->paginate(5);  
        }
        
        return [
            'pagination' => [
                'total'        => $rubros-> total(),
                'current_page' => $rubros-> currentPage(),
                'per_page'     => $rubros-> perPage(),
                'last_page'    => $rubros-> lastPage(),
                'from'         => $rubros-> firstItem(),
                'to'           => $rubros-> lastItem(), 
            ],
            'rubros' => $rubros
        ];
    }
   
    public function selectRubro(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $rubros = Rubro::where('condicion','=','1')
        ->select('id','rubro')->orderBy('rubro','asc')->get();
        
        return ['rubros' => $rubros];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $rubro = new Rubro();
        $rubro->rubro = $request -> rubro;        
        $rubro->user_id = $request -> user_id;
        $rubro->save();
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $rubros = Rubro::findOrFail($request->id);
        $rubros->rubro = $request -> rubro;
        $rubros->condicion = '1';
        $rubros->save();
    }

    public function desactivar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $rubros = Rubro::findOrFail($request->id);
        $rubros->condicion = '0';
        $rubros->save();
    }

    public function activar(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
        $rubros = Rubro::findOrFail($request->id);
        $rubros->condicion = '1';
        $rubros->save();
    }

    
}
