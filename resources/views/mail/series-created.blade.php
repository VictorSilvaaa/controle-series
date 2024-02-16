@component('mail::message')

    #{{$nomeSerie}} foi criada

A série {{$nomeSerie}} com {{$qtdTemporadas}} temporadas e {{$episodiosPorTemporada}} episódios por temporada a série foi criada.

Acesse aqui: 
@component('mail::button', ['url'=>route('seasons.index', $idSerie)])
    Ver série
@endcomponent

@endcomponent