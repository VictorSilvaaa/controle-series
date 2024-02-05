<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>{{$title}} - controle de séries</title>
</head>
<body>
    <div class="container">
        <h1>{{$title}}</h1>
        @isset($mensagemSucesso)
            <div class="alert alert-success">
                {{$mensagemSucesso}}
            </div>
        @endisset
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif  
        
        {{$slot}}
    </div>


    
    
</body>
</html>