@extends('layouts.default')

@section('head')

	<title>Arquigrafia - Editar álbum </title>
		
@stop

@section('content')
	<div class="container">
		{{ Form::open(array('url'=>'albums')) }}		
				
		<div class="twelve columns">
			<h1>{{ $album->title }}</h1>
			<p>Edite seu álbum</p>
			<br>
		</div>

				
		<div id="registration">
			<div class="four columns">
		
				{{ Form::open(array('url' => 'albums')) }}
					<div class="two columns alpha"><p>{{ Form::label('title', 'Título:') }}</p></div>
					<div class="two columns omega">
						<p>{{ Form::text('title', $album->title) }} <br>
						{{ $errors->first('title') }}</p>
					</div>
					
					
					<div class="two columns alpha"><p>{{ Form::label('description', 'Descrição:') }}</p></div>
					<div class="two columns omega">
						<p>{{ Form::textarea('description', $album->description) }}</p>
					</div>
					<br>
					<br>
					<h2>Deseja inserir alguma imagem?</h2>
					@foreach($album_photos as $photo)
						<input type="checkbox" id="{{ 'photo_' . $photo->id }}" name="{{ 'photo_' . $photo->id }}" value="{{ $photo->id }}">
						{{ $photo->id }}
						<br/>
					@endforeach
					<p>{{ Form::submit("EDITAR", array('class'=>'btn')) }}</p>
					
					
				{{ Form::close() }}
				
				<p>&nbsp;</p>
		</div>
		</div>
	</div>
@stop