<?php


namespace App\Http\Controllers;


use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){

        $series = Serie::query() //Busca os dados
            ->orderBy('nome') // Ordena os dados
            ->get(); // Retorna os dados ordenados

        $mensagem = $request->session()->get('mensagem');
        $request->session()->remove('mensagem');
        return view('series.index',compact('series','mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request){

        $request->validate();
        $serie = Serie::create($request->all());
        $request->session()
            ->flash(
                'mensagem',
                "{$serie->nome} criada com sucesso "
            );

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()
            ->flash(
                'mensagem',
                "Serie removida com sucesso"
            );
        return redirect()->route('listar_series');
    }
}
