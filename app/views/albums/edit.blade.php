@extends('layouts.default')

@section('head')

	<title>Arquigrafia - Editar álbum </title>
	<link rel="stylesheet" type="text/css" href="{{ URL::to("/") }}/css/checkbox.css" />	
	<style>
		@foreach($other_photos as $photo)
			{{ '#photo_' . $photo->id . ' + label' }}
			{
				background: url('{{"/arquigrafia-images/" . $photo->id . "_home.jpg" }}');
			}
		@endforeach
	</style>
@stop

@section('content')
	<div class="container">
		{{ Form::open(array('url'=>'albums/' . $album->id, 'method' => 'put')) }}		
				
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
					<div class="twelve columns alpha">
						<h2>Deseja inserir alguma imagem?</h2>
						<?php $count = 0; ?>
						<table class="form-table" width="100%" border="0" cellspacing="0" cellpadding="0">
							@foreach($other_photos as $photo)
								@if ($count % 5 == 0)
									<tr>
								@endif
								<td>
									<input type="checkbox" id="{{ 'photo_' . $photo->id }}" name="{{ 'photo_' . $photo->id }}" value="{{ $photo->id }}">
									<label for="{{ 'photo_' . $photo->id }}"></label>
								</td>
								@if ($count % 5 == 4)
									</tr>
								@endif
								<?php $count++ ?>
							@endforeach
						</table>
					</div>
					<p>{{ Form::submit("EDITAR", array('class'=>'btn')) }}</p>
					
					
				{{ Form::close() }}
				
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
@stop