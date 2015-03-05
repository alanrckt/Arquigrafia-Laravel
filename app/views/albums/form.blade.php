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
    		        <br>
    		        <br>
    		        <p>{{ Form::submit("CRIAR", array('class'=>'btn')) }}</p>
    				  
    				  
    			{{ Form::close() }}
				
				<p>&nbsp;</p>
		  </div>
		</div>
	</div>
@stop