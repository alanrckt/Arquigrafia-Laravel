@extends('layouts.default')

@section('head')

	{{ HTML::style('/css/style.css'); }}

	<title>Arquigrafia - Seu universo de imagens de arquitetura</title>

	<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-1.7.1.min.js"></script>
	<script src="{{ URL::to("/") }}/js/jquery.isotope.min.js"></script>
	<script type="text/javascript" src="{{ URL::to("/") }}/js/panel.js"></script>

@stop

@section('content')
	<!--   HEADER DO USUÁRIO   -->
	<div class="container">
		<div id="user_header" class="twelve columns">
			<div class="info">
				<h1> Meus álbuns </h1>
			</div>
			<div class="count">Total de álbuns: {{ $albums->count() }}</div>
		</div>
	</div>
	@if ($albums->count() > 0)
	<div id="user_gallery">
		<div class="wrap">
			<div id="panel" class="stripe">
				@foreach($albums as $album)
					<div class="item h2">
						<div class="layer" data-depth="0.2">
							<a href='{{ URL::to("/albums/{$album->id}") }}'>
								@if(isset($album->cover_id))
									<img src='{{ URL::to("/arquigrafia-images/{$album->id}_200h.jpg") }}' 
										title="{{ $album->title }}">
								@else
									<div class="no_cover">
										<p>Álbum sem capa</p>
									</div>
								@endif
							</a>
							<div class="item-title">
								<p>{{ $album->title . ' (' . $album->photos->count() . ')' }}</p>
								<a id="title_delete_button" class="title_delete album" href="{{ URL::to('/albums/' . $album->id) }}" title="Excluir álbum"></a>
								<a id="title_edit_button" href="{{ URL::to('/albums/' . $album->id . '/edit')}}" title="Editar álbum"></a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="panel-back"></div>
			<div class="panel-next"></div>
		</div>
	</div>
	@else
		<div class="container">
			<div class="twelve columns">
				<p> 
					Você ainda não possui nenhum álbum. Crie um {{ link_to('/albums/create', 'aqui') }}
				</p>
			</div>
		</div>
	@endif
	<!--   MODAL   -->
	<div id="mask"></div>
	<div id="confirmation_window">
		<!-- ÁREA DE LOGIN - JANELA MODAL -->
		<!-- <a class="close" href="#" title="FECHAR">Fechar</a> -->
		<div id="registration_delete">
			<p></p>
			{{ Form::open(array('url' => '', 'method' => 'delete')) }}
				<div id="registration_buttons">
					<a class="btn" href="#" id="submit_delete">Confirmar</a>
					<a class="btn" href="#" id="cancel_delete">Cancelar</a>
				</div>
			{{ Form::close() }}
		</div>
	</div>
	<!--   FIM - MODAL   -->	
@stop