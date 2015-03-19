@extends('layouts.default')

@section('head')
	<title>Arquigrafia - Criar álbum </title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="{{ URL::to('/js/album-add-photos.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="{{ URL::to("/") }}/css/checkbox.css" />	
	<style>
		@foreach($photos as $photo)
			{{ '#photo_' . $photo->id . ' + label' }}
			{
				background: url('{{"/arquigrafia-images/" . $photo->id . "_home.jpg" }}');
			}
		@endforeach
	</style>	
	<script>
		var currentPage = 1;
		var maxPage = {{ $maxPage }};
		var loadedPages = [1];
		var url = '{{ $url }}';
	</script>
@stop

@section('content')
	<div class="container">
				
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
					<div class="two columns omega row">
						<p>{{ Form::textarea('description') }}</p>
					</div>
 					<div class="twelve columns alpha row">
						<h2 class="row">Deseja inserir alguma imagem?
							<a id="toggle-add" href="#">[+]</a>
						</h2>
						<div id="add-container">
							<div class="three columns alpha row">	
								<a href="#" name="modal" id="select_all" class="btn">Selecionar todas</a>       
								<a href="#" name="modal" id="remove_all" class="btn">Remover todas</a>
							</div>
							<div class="eleven columns row">
								<div id="add" class="eleven columns row">
								<img id="add_loader" class="loader row" src="{{ URL::to('/img/ajax-loader.gif') }}" />
								 @include('includes.album-photos')
								</div>
								<div id="add-buttons" class="eleven columns alpha">
									<a id="less-less" href="#" class="btn less-than"> &lt;&lt; </a>
									<a id="less" href="#" class="btn less-than"> &lt; </a>
									<p>1/{{ $maxPage }}</p>
									<a id="greater" href="#" class="btn greater-than"> &gt; </a>
									<a id="greater-greater" href="#" class="btn greater-than"> &gt;&gt; </a>
								</div>
							</div>
						</div>
	
					</div>
					<br />
					<p>{{ Form::submit("CRIAR", array('class'=>'btn')) }}</p>
						
				{{ Form::close() }}
				
				<p>&nbsp;</p>
			</div>
		</div>
	</div>
@stop