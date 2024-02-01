<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Series;
use App\Models\Season;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Series::with(['seasons'])->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        
        return view('series.index')
            ->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }
    public function create()
    {
        return view('series.create');
    }
    public function store(SeriesFormRequest $request)
    {   
        $serie = Series::create($request->all());

        $seasons = [];
        for($i =1; $i <= $request->seasonsQty; $i++){
            $seasons[] = [
                'series_id'=> $serie->id,
                'number' =>$i
            ];
        }
        Season::insert($seasons);

        $episodes = [];
        foreach($serie->seasons as $season){
            for($j=1; $j<= $request->episodesPerSeason; $j++){
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }
        }
        Episode::insert($episodes);

        return redirect()->route('series.index')
        ->with('mensagem.sucesso', "Série '{$serie->nome}' adicionada com sucesso");
    }
    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index')
        ->with('mensagem.sucesso', "Série '{$series->nome}' removida com sucesso");
    }
    public function edit(Series $series)
    {
        return view('series.edit')
        ->with(['series'=>$series]);
    }
    public function update(Series $series, SeriesFormRequest $request)
    {   
        // $series->fill($request->all());
        // $series->save();

        $request->validate([
            'nome'=> ['required', 'min:3']
        ]);
        
        $series->nome = $request->nome;
        $series->save();
        return to_route('series.index')
        ->with('mensagem.sucesso', "Série '{$series->nome}' atualizada com sucesso");
    }
}