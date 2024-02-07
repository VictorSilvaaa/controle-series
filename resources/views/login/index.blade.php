<x-layout title="Login">
    <form method="post" class="mt-2">
        @csrf
        <div class="form-group">
            <label class="form-label" for="email">Email:</label>
            <input class="form-control" id="email" type="email" name="email">
        </div>

        <div class="form-group">
            <label class="form-label" for="password">Senha:</label>
            <input class="form-control" id="password" type="password" name="password">
        </div>

        <button class="btn btn-primary mt-3">Entrar</button>

        <a href="{{route('users.create')}}" class="btn btn-secondary mt-3">
            Registrar
        </a>
    </form>

</x-layout>