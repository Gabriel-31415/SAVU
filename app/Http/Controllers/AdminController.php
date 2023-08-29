<?php

namespace App\Http\Controllers;

use App\Models\Dia;
use App\Models\Visita;
use App\Models\Horario;
use App\Models\TipoVisita;
use App\Models\Agendamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	
	public function solicitacoes()
    {
        $solicitacoes = TipoVisita::where('aprovado', [TipoVisita::TIPO_ENUM['aguardando'],TipoVisita::TIPO_ENUM['reprovado'] ])->get();
        return view('admin.solicitacoes', compact('solicitacoes'));
    }

	public function aprovar($id)
    {
        $solicitacoes = TipoVisita::find($id);
		$solicitacoes->aprovado = TipoVisita::TIPO_ENUM['aprovado'];
		$solicitacoes->save();

        return redirect()->route('admin.solicitacoes')->with(['message' => "Success!", 'class' => 'success']);
    }
	
	public function reprovar($id)
    {
        $solicitacoes = TipoVisita::find($id);
		$solicitacoes->aprovado = TipoVisita::TIPO_ENUM['reprovado'];
		$solicitacoes->save();

        return redirect()->route('admin.solicitacoes')->with(['message' => "Success!", 'class' => 'success']);
    }


}
