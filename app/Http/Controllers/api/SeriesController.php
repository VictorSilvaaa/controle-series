<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
	public function __construct(private SeriesRepository $seriesRepository)
	{
		
	}

	public function index( Request $request)
	{	
		$query = Series::query();
		if($request->has('nome')){
			$query->where('nome', $request->nome);
		}

		return $query->paginate(5);
	}

	public function store(SeriesFormRequest $request)
	{   
		return response()->json($this->seriesRepository->add($request), 201);


	}
	public function show(int $series){

		///* Collection<Series> */ $series = Series::whereId($series)->with('seasons.episodes')->get();

		///* Series|null */ $series = Series::with('seasons.episodes')->find($series);

		$seriesModel = Series::find($series);
		if($seriesModel === null){
			return response()->json(['message'=> 'series not found'], 404);
		}

		return $seriesModel;
	}

	public function update(Series $series, SeriesFormRequest $request)
	{
		$series->fill($request->all());
		$series->save();

		return $series;
	}

	public function destroy(int $series)
	{
		Series::destroy($series);

		return response()->NoContent();
	}
}