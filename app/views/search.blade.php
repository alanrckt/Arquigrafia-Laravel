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
          
        </div>
      </div>
      
      <!--   PAINEL DE IMAGENS - GALERIA - CARROSSEL   -->  
      <div class="wrap">
        <div id="panel">
            
          <?php $i = rand(0,5);?>
          
          @foreach($photos as $photo)
          
            <?php
              $i++;
              $size = 1; 
              if ($i%5 == 3) $size = 2;
              if ($i%11 == 8) $size = 3;
              
              if ($i > 100) break;
            ?>
            
            <div class="item h<?php echo $size; ?>">
            	<div class="layer" data-depth="0.2">
                <a href='{{ URL::to("/photos/{$photo->id}") }}'>
                <img src='{{ URL::to("/arquigrafia-images/{$photo->id}_view.jpg") }}' title='{{ $photo->name }}'>
                </a>
                <div class="item-title">{{ $photo->name }}</div>
            	</div>
            </div>
            
          @endforeach
          
        </div>
      </div>
      <!--   FIM - PAINEL DE IMAGENS  -->
      
    </div>
    <!--   FIM - MEIO DO SITE   -->
    
@stop