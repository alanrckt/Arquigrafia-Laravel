@extends('layouts.default')

@section('head')

	<title>Arquigrafia - Criar álbum </title>
		
@stop

@section('content')
	<div class="container">
		{{ Form::open(array('url'=>'albums')) }}		
				
		<div class="twelve columns">
			<h1>Novo álbum</h1>
			<p>Crie um novo álbum.<br><br>
			<small>* Todos os campos a seguir são obrigatórios.</small>
			</p>
			<br>
		</div>

				
		<div id="registration">
			<div class="four columns">
		
				{{ Form::open(array('url' => 'albums')) }}
					<div class="two columns alpha"><p>{{ Form::label('title', 'Título*:') }}</p></div>
					<div class="two columns omega">
						<p>{{ Form::text('title') }} <br>
						{{ $errors->first('title') }}</p>
					</div>
					
					
					<div class="two columns alpha"><p>{{ Form::label('description', 'Descrição:') }}</p></div>
					<div class="two columns omega">
						<p>{{ Form::textarea('description') }}</p>
					</div>
 					<div class="twelve columns alpha">
						<h2>Deseja inserir alguma imagem?</h2>
						<?php $count = 0; ?>
						<table class="form-table" width="100%" border="0" cellspacing="0" cellpadding="0">
						@foreach($photos as $photo)
							@if ($count % 5 == 0)
								<tr>
							@endif
							<td>
								<input type="checkbox" id="{{ $photo->id }}" name="{{ $photo->id }}" value="{{ $photo->id }}">
								{{ $photo->id }}
							</td>
							@if ($count % 5 == 4)
								</tr>
							@endif
							<?php $count++ ?>
						@endforeach
						</table>
					</div>
					<br />
					<p>{{ Form::submit("CRIAR", array('class'=>'btn')) }}</p>
						
				{{ Form::close() }}
				
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
@stop