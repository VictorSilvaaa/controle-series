
<x-layout title="Nova serie">  
    <x-series.form :action="route('series.store')" :nome="old('nome')" :update="false"/>  
</x-layout>