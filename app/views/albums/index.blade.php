<!doctype html>


<html>
<head>
    <meta charset="UTF-8">
    
    
</head>
<body>
    
    @if (Session::has('album.delete'))
        <p>{{ Session::pull('album.delete') }}</p>
    @endif
    <h1>Meus álbuns</h1>
    
    @if ( !$albums->isEmpty() )
        @foreach( $albums as $album)
            <p> {{ $album->title }} </p>
        @endforeach
    @else
        <p>Você ainda não tem nenhum álbum. Crie um {{ link_to('albums/create', 'aqui') }}</p>
    @endif

</body>
</html>
