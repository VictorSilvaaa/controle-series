
<x-layout title="Editar serie '{{$series->nome}}'">
    <x-series.form :action="route('series.update', $series->id)" :nome="$series->nome"/>  
</x-layout>