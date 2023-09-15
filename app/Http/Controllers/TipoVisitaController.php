<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\TipoVisita;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TipoVisitaController extends Controller
{
    public function index()
    {
        $tipoVisitas = TipoVisita::where('aprovado', TipoVisita::TIPO_ENUM['aprovado'])->get();
        return view('tipoVisita.index', compact('tipoVisitas'));
    }

    public function create()
    {
        return view('tipoVisita.create');
    }

    public function store(Request $request)
    {
        // dd( $request->all() );
        $tipoVisita = TipoVisita::create( $request->all() );
        $tipoVisita->funciona_domingo = $request->has('funciona_domingo') ?? false;
        $tipoVisita->funciona_segunda = $request->has('funciona_segunda') ?? false; 
        $tipoVisita->funciona_terca   = $request->has('funciona_terca') ?? false;
        $tipoVisita->funciona_quarta  = $request->has('funciona_quarta') ?? false; 
        $tipoVisita->funciona_quinta  = $request->has('funciona_quinta') ?? false; 
        $tipoVisita->funciona_sexta   = $request->has('funciona_sexta') ?? false;
        $tipoVisita->funciona_sabado  = $request->has('funciona_sabado') ?? false;
        $tipoVisita->save();

        if( Auth::user()->tipo === User::TIPO_ENUM['professor'] ){
            $tipoVisita->aprovado = TipoVisita::TIPO_ENUM['aguardando'];
            $tipoVisita->save();
        }
        if( $request->has('images') ){
            foreach ($request->file('images') as $imagefile) {
                $foto = new Foto;
                $path = $imagefile->storeAs(
                    'img',
                    $tipoVisita->id.'/'.$imagefile->getClientOriginalName(),
                    'public'
                );
                $foto->path = $path;
                $foto->descricao = "imagem";
                $foto->tipo_visita_id = $tipoVisita->id;
                $foto->save();
            }
        }

        return redirect()->route('tipoVisita.index')->with(['message' => "Success!", 'class' => 'success']);
    }

    public function edit($id)
    {
        $tipoVisita = TipoVisita::find($id);
        return view('tipoVisita.edit', compact('tipoVisita'));
    }

    public function show($id)
    {
        $tipoVisita = TipoVisita::find($id);
        return view('tipoVisita.show', compact('tipoVisita'));
    }

    public function update(Request $request, $id)
    {
        $tipoVisita = TipoVisita::find($id);

        $tipoVisita->update($request->all());

        $tipoVisita->funciona_domingo = $request->has('funciona_domingo') ?? false;
        $tipoVisita->funciona_segunda = $request->has('funciona_segunda') ?? false; 
        $tipoVisita->funciona_terca   = $request->has('funciona_terca') ?? false;
        $tipoVisita->funciona_quarta  = $request->has('funciona_quarta') ?? false; 
        $tipoVisita->funciona_quinta  = $request->has('funciona_quinta') ?? false; 
        $tipoVisita->funciona_sexta   = $request->has('funciona_sexta') ?? false;
        $tipoVisita->funciona_sabado  = $request->has('funciona_sabado') ?? false;
        $tipoVisita->save();

        return redirect()->route('tipoVisita.index')->with(['message' => "Atualizado!", 'class' => 'success']);
    }

    public function delete( $id)
    {
        $tipoVisita = TipoVisita::find($id);
        $tipoVisita->delete();

        return redirect()->route('tipoVisita.index')->with(['message' => "Removido com sucesso!", 'class' => 'success']);
    }
}
