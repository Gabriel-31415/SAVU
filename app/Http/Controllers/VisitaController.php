<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use App\Models\Visita;
use App\Models\Horario;
use App\Models\TipoVisita;
use App\Models\Agendamento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitaController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('visita.index', compact('agendamentos'));

    }

    public function minhasVisitas()
    {
        $agendamentos = Auth::user()->agendamentos;
        return view('visita.index', compact('agendamentos'));

    }

    public function create()
    {
        $tipoVisitas = TipoVisita::all();
        $dias = Dia::all();
        $horarios = Horario::all();
    
        return view('visita.create', compact('tipoVisitas', 'dias', 'horarios'));
    }

    public function store(Request $request)
    {
        $visita = Visita::create( $request->all() );
        
        // dd( $request->all() );
        $agendamento = Auth::user()
                            ->agendamentos()
                            ->create( [
                                'visita_id' => $visita->id,
                                'dia_id' => intval( $request->dia ) ,
                                'horario_id' => intval( $request->horario ) 
                            ] );
        // if( Auth::user()->tipo == User::TIPO_ENUM['admin'] ){

        // }
        return redirect()->route('visita.minhasVisitas')->with(['message' => "Success!", 'class' => 'success']);
    }

    public function edit($id)
    {
        $visita = Visita::find($id);
        return view('visita.edit', compact('visita'));
    }

    public function show($id)
    {
        $agendamento = Agendamento::find($id);
        return view('visita.show', compact('agendamento'));
    }

    public function update(Request $request, $id)
    {
        $visita = Visita::find($id);
        $visita->update($request->all());

        return redirect()->route('visita.index')->with(['message' => "Atualizado!", 'class' => 'success']);
    }

    public function delete( $id)
    {
        $agendamento = Agendamento::find($id);
        $visita = Visita::find($agendamento->visita->id);
        $visita->delete();
        $agendamento->delete();

        return redirect()->route('visita.index')->with(['message' => "Removido com sucesso!", 'class' => 'success']);
    }
}
