<x-layout title="Séries">
    <a href="{{route('series.create')}}" class="btn btn-dark mb-2">Adicionar</a>
    
    @isset($mensagemSucesso)
    <div class="alert alert-success">
        {{$mensagemSucesso}}
    </div>
    @endisset
    
    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{route('seasons.index', $serie->id)}}"> {{$serie->nome}}</a>
              
                <div class="d-flex gap-2">
                    <form action="{{route('series.destroy', $serie->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">@svg('feathericon-delete')</button>
                    </form>
                    <form action="{{route('series.edit', $serie->id)}}" method="get">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">@svg('feathericon-edit')</button>
                    </form>
                </div>
            </li> 
        @endforeach
    </ul>
</x-layout>