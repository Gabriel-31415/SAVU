<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\TipoVisita;
use Illuminate\Http\Request;

class TipoVisitaController extends Controller
{
    public function index()
    {
        $tipoVisitas = TipoVisita::all();
        return view('tipoVisita.index', compact('tipoVisitas'));
    }

    public function create()
    {
        return view('tipoVisita.create');
    }

    public function store(Request $request)
    {
        $tipoVisita = TipoVisita::create( $request->all() );
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

        return redirect()->route('tipoVisita.index')->with(['message' => "Atualizado!", 'class' => 'success']);
    }

    public function delete( $id)
    {
        $tipoVisita = TipoVisita::find($id);
        $tipoVisita->delete();

        return redirect()->route('tipoVisita.index')->with(['message' => "Removido com sucesso!", 'class' => 'success']);
    }
}
