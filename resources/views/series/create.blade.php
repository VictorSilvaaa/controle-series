
<x-layout title="Nova serie">
    <form action="/series/salvar" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label"> Nome:</label>
            <input type="text" name="nome" id="" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
    </form>
    
</x-layout>