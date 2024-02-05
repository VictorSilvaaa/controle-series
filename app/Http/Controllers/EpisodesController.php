<?php

namespace App\Http\Controllers;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Exception;
class EpisodesController{
    public function index(Season $season){
        return view('episodes.index',[
            'episodes'=>$season->episodes,
            'mensagemSucesso' => session('mensagem.sucesso')
        ]);
    }

    public function update(Request $request, Season $season){
        
        try {
            DB::transaction(function() use($request, $season){
                $watchedEpisodes = $request->episodes;
                $season->episodes->each(function(Episode $episode) use($watchedEpisodes){
                    $episode->watched = in_array($episode->id, $watchedEpisodes);
                    //$episode->save();
                });
                $season->push();
            });
            return to_route('episodes.index', $season->id)->with('mensagem.sucesso', 'Episodios assistidos salvos');
        } catch (\Throwable $th) {
            throw ValidationException::withMessages(['error' => ['Erro ao salvar episódios assistidos']]);
        }
       
    }
}