@extends('layouts.default')

@section('head')

<title>Arquigrafia - Seu universo de imagens de arquitetura</title>

<!-- ISOTOPE -->
<script src="{{ URL::to("/") }}/js/jquery.isotope.min.js"></script>

<script type="text/javascript" src="{{ URL::to("/") }}/js/panel.js"></script>

@stop

@section('content')

    <!--   MEIO DO SITE - ÁREA DE NAVEGAÇÃO   -->
    <div id="content">
    	
      <div class="container">
        <div id="search_result" class="twelve columns row">
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
          
          <p>Faça uma <a href="{{ URL::to('/search/more') }}">busca avançada</a>.</p>
          
        </div>
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