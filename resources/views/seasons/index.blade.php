<x-layout title="Temporadas de {!! $series->nome !!}">
    <div class="d-flex justify-center">
        <img src="{{asset('storage/'. $series->cover)}}" alt="capa" class="img-fluid"
        style="height: 400px"
        >
    </div>
    
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                </a>

                <span class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>
