<!doctype html>


<html>
<head>
    <meta charset="UTF-8">
    
    
</head>
<body>
    
    <h1>Meus álbuns</h1>
    
    @if ( isset($albums) )
        @foreach( $albums as $album)
            <p> {{ $album->title }} </p>
        @endforeach
    @endif

</body>
</html>
