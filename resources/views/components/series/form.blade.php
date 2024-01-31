
<form action="{{$action}}" method="post">
    @csrf
    @isset($nome)
        @method('put')
    @endisset
    <div class="mb-3">
        <label for="nome" class="form-label" > Nome:</label>
        <input type="text" 
            name="nome" 
            id=""
            class="form-control"
            @isset($nome)value="{{$nome}}"@endisset
        >

    </div>

    <button type="submit" class="btn btn-primary">Adicionar</button>
</form>
    
