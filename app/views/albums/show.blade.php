@extends('layouts.default')

@section('head')

{{HTML::style('/css/style.css');}}

<title>Arquigrafia - Seu universo de imagens de arquitetura</title>

<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-ui-1.8.17.custom.min.js"></script>

<script src="{{ URL::to("/") }}/js/jquery.isotope.min.js"></script>

<script type="text/javascript" src="{{ URL::to("/") }}/js/panel.js"></script>


</head>

@stop

@section('content')
		<!--   HEADER DO USUÁRIO   -->
		<div class="container">
      <div id="user_header" class="twelve columns">
        <div class="info">
          <h1>{{ $album->title }}</h1>
        </div>
      	<div class="count">Fotos no álbum ({{ $photos->count() }})</div>
      </div>
    </div>
    
    <!-- GALERIA DO USUÁRIO -->
    <div id="user_gallery">
      
      <div class="wrap">
        @include("includes.panel-stripe")
      </div>
    
    </div>
    
    <!-- OUTROS ALBUNS -->
    <div class="container">
			
    	<div class="twelve columns albums">
      	<hgroup class="profile_block_title">
      		<h3><i class="photos"></i> Outros álbuns</h3>
        </hgroup>
        <div class="profile_box">
			@foreach($other_albums as $album)
				<div class="gallery_box">
					<a href="{{ URL::to("/albums/" . $album->id) }}" class="gallery_photo">
						@if (isset($album->cover_id))
							<img src="{{ URL::to("/arquigrafia-images/" . $album->cover_id . "_home.jpg") }}" class="gallery_photo" />
						@else
							<img src="{{ URL::to("/img/album_icon.png") }}" class="gallery_photo" />
						@endif
					</a>
					<a href="{{ URL::to("/albums/" . $album->id) }}" class="name">
						{{ $album->title . ' ' . '(' . $album->photos->count() . ')' }}
					</a>
					<br />
				</div>
			@endforeach
		</div>
      </div>
    
    </div>
    
		<!--   MODAL   -->
		<div id="mask"></div>
		<div id="form_window">
			<!-- ÁREA DE LOGIN - JANELA MODAL -->
			<a class="close" href="#" title="FECHAR"></a>
			<div id="registration"></div>
		</div>
		<!--   FIM - MODAL   -->
	</div>
	<!--   FIM - #CONTAINER   -->
</body>
</html>


@stop