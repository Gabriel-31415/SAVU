<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Dia;
use App\Models\User;
use App\Models\Visita;
use App\Models\Horario;
use Carbon\CarbonPeriod;
use App\Models\TipoVisita;
use App\Models\Agendamento;
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

    public function createTipoVisita( Request $request )
    {
        $tipoVisitas = TipoVisita::all();
        return view('visita.create-tipovisita', compact('tipoVisitas'));

    }

    public function create( Request $request )
    {
        
        $tipoVisita = TipoVisita::find( $request->tipo_visita_id );
        $tipoVisitas = TipoVisita::all();
        $dias = Dia::all();
        $horarios = Horario::all();

        return view('visita.create', compact('tipoVisita', 'tipoVisitas'));
    }

    public function store(Request $request)
    {
        $visita = new Visita();
        // dd( DateTime::createFromFormat('d/m/Y', $request->dia)  );
        $dia = Dia::create([
            'dia' => DateTime::createFromFormat('d/m/Y', $request->dia)
        ]);
        // dd(date('H:i', strtotime($request->horario_manha)));
        $horario = Horario::create([
            'horario' => $request->horario_manha ? date('H:i', strtotime($request->horario_manha)) : date('H:i', strtotime($request->horario_tarde)),
            'dia_id' => $dia->id
        ]);

        $visita->tipo_visita_id = $request->tipo_visita_id;
        $visita->save();
        
        
        $agendamento = Auth::user()
                            ->agendamentos()
                            ->create( [
                                'nome' => $visita->tipoVisita->nome,
                                'visita_id' => $visita->id,
                                'dia_id' => $dia->id ,
                                'horario_id' => $horario->id
                            ] );
        // dd( $agendamento );
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

    public function aprovar($id)
    {
        $visita = Visita::find($id);
        $visita->status = TipoVisita::TIPO_ENUM['aprovado'];
        $visita->save();

        return redirect()->route('visita.index')->with(['message' => "Aprovado!", 'class' => 'success']);
    }

    public function reprovar($id)
    {
        $visita = Visita::find($id);
        $visita->status = TipoVisita::TIPO_ENUM['reprovado'];
        $visita->save();

        return redirect()->route('visita.index')->with(['message' => "Reprovado!", 'class' => 'success']);
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
        // $visita = Visita::find($agendamento->visita->id);
        // $visita->delete();
        $agendamento->delete();
        if( Auth::user()->tipo === User::TIPO_ENUM['admin'] ){
            return redirect()->route('visita.index')->with(['message' => "Removido com sucesso!", 'class' => 'success']);
        }
        return redirect()->route('visita.minhasVisitas')->with(['message' => "Removido com sucesso!", 'class' => 'success']);
    }
}
