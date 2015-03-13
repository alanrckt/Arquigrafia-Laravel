@extends('layouts.default')

@section('head')

<title>Arquigrafia - Seu universo de imagens de arquitetura</title>

<!--   JQUERY - Google Ajax API CDN (Also supports SSL via HTTPS)   -->
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-ui-1.8.17.custom.min.js"></script>

<!--   JQUERY - Validate   -->
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery.validate.js"></script>

<!--   JS - Masked input   -->
<script type="text/javascript" src="{{ URL::to("/") }}/js/masked-input.js"></script>

<!-- JS - Font size increment and decrement -->
<script type="text/javascript" src="{{ URL::to("/") }}/js/font_increment.js"></script>

<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery.tools.min.js"></script>

<!-- Google Maps API -->
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>

<!-- ISOTOPE -->
<script src="{{ URL::to("/") }}/js/jquery.isotope.min.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/home.js"></script>	
<script type="text/javascript" src="{{ URL::to("/") }}/js/panel.js"></script>

@stop

@section('content')

    <!--   MEIO DO SITE - ÁREA DE NAVEGAÇÃO   -->
    <div id="content">
    	
      <div class="container">
        <div id="search_result" class="twelve columns row">
          
          @if ($query != "")
          
            <h1>Resultado de: {{ $query }}</h1>
            <p>Tags contendo o termo: 
            
            @foreach($tags as $k => $tag)
              
              @if ($k != count($tags)-1 )
              <a href="?q={{ $tag->name }}">{{ $tag->name }}</a>, 
              @else
              <a href="?q={{ $tag->name }}">{{ $tag->name }}</a>
              @endif
              
            @endforeach
            
            </p>
            
            <?php if ( count($photos) < 1 ) { ?>
              <p>Não encontramos nenhuma imagem com o termo {{ $query }}.</p>
            <?php } else { ?>
              <p>Foram encontradas {{ count($photos) }} imagens.</p>
            <?php } ?>
            
          @else
            
            <h1>Busca avançada</h1>
            
          @endif
          
          <div class="eight columns alpha">
          <p>Campos vazios não serão considerados na busca. Todos os outros campos serão utilizados em uma busca tipo AND, isso quer dizer que apenas imagens que correspondam em todos os critérios serão mostradas.</p>
          </div>
          
        </div>
        
        {{ Form::open(array('url' => 'search/more', 'method' => 'get')) }}
        <div class="twelve columns row">
        
          <div class="four columns alpha row">
            <h3>Descrição</h3>
            <p>{{ Form::label('name', 'Título da imagem:') }} {{ Form::text('name') }}</p>
            <p>{{ Form::label('description', 'Descrição da imagem:') }} {{ Form::text('description') }}</p>
          </div>
          
          <div class="four columns row">
            <h3>Localização</h3>
            <p>{{ Form::label('city', 'Cidade:') }} {{ Form::text('city') }}</p>
            <p>{{ Form::label('state', 'Estado:') }} {{ Form::text('city') }}</p>
            <p>{{ Form::label('country', 'País:') }} {{ Form::text('country') }}</p>
          </div>
          
          <div class="four columns omega row">
            <h3>Arquitetura</h3>
            <p>{{ Form::label('workAuthor', 'Arquiteto:') }} {{ Form::text('workAuthor') }}</p>
          </div>
          
          <p>{{ Form::submit('BUSCAR', ['class'=>'btn']) }}</p>
        
        </div>
        {{ Form::close() }}
        
      </div>
      
      <!--   PAINEL DE IMAGENS - GALERIA - CARROSSEL   -->  
      <div class="wrap">
        <div id="panel">
            
          @include('includes.panel')
          
        </div>
		<div class="panel-back"></div>
        <div class="panel-next"></div>
      </div>
      <!--   FIM - PAINEL DE IMAGENS  -->
	  
	        
    </div>
    <!--   FIM - MEIO DO SITE   -->
    
@stop