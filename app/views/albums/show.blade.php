@extends('layouts.default')

@section('head')

<title>Arquigrafia - Seu universo de imagens de arquitetura</title>

<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-ui-1.8.17.custom.min.js"></script>

<script src="{{ URL::to("/") }}/js/jquery.isotope.min.js"></script>

<script type="text/javascript" src="{{ URL::to("/") }}/js/panel.js"></script>

@stop

@section('content')
	<!--   HEADER DO USUÁRIO   -->
	<div class="container">
		<div id="user_header" class="twelve columns">
			<div class="info">
				<h1>
					{{ $album->title }}
				</h1>
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

	<div class="container row">
		<div class="twelve columns albums">
			<hgroup class="profile_block_title">
				<h3><i class="info"></i>Informações</h3>
				@if ( $album->user_id == Auth::id() )
					<a id="delete_button" class="album" href="{{ URL::to('/albums/' . $album->id) }}" title="Excluir álbum"></a>
					<a id="edit_button" href="{{ URL::to('/albums/' . $album->id . '/edit')}}" title="Editar álbum"></a>
				@endif
			</hgroup>
			<ul>
				<li><strong>Título: </strong> {{ $album->title }} </li>
				<br>
				@if ( !empty($album->description) )
					<li><strong>Descrição: </strong> {{ $album->description }} </li>
				@endif
			</ul>
		</div>
	</div>
	
	<!-- OUTROS ALBUNS -->
	<div class="container">
		<div class="twelve columns albums">
			<hgroup class="profile_block_title">
				<h3><i class="photos"></i> Outros álbuns</h3>
			</hgroup>
			<div class="profile_box">
				@foreach($other_albums as $other_album)
					<div class="gallery_box">
						<a href="{{ URL::to("/albums/" . $other_album->id) }}" title="{{ $other_album->title }}">
							@if (isset($other_album->cover_id))
								<img src="{{ URL::to("/arquigrafia-images/" . $other_album->cover_id . "_home.jpg") }}" class="gallery_photo" />
							@else
								<div class="gallery_photo">
									<div class="no_cover">
										<p> Álbum sem capa </p>
									</div>
								</div>
							@endif
						</a>
						<a href="{{ URL::to("/albums/" . $other_album->id) }}" class="name">{{ $other_album->title . ' ' . '(' . $other_album->photos->count() . ')' }}</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	
	<!--   MODAL   -->
	<div id="mask"></div>
	<div id="confirmation_window">
		<!-- ÁREA DE LOGIN - JANELA MODAL -->
		<!-- <a class="close" href="#" title="FECHAR">Fechar</a> -->
		<div id="registration_delete">
			<p></p>
			{{ Form::open(array('url' => '/albums/' . $album->id, 'method' => 'delete')) }}
				<div id="registration_buttons">
					<a class="btn" href="#" id="submit_delete">Confirmar</a>
					<a class="btn" href="#" id="cancel_delete">Cancelar</a>
				</div>
			{{ Form::close() }}
		</div>
	</div>
	<!--   FIM - MODAL   -->	
@stop