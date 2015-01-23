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
          <h1>Resultado de: <?php if (isset($_POST["q"])) echo $_POST["q"]; else "casa"; ?></h1>
          <p>Tags contendo o termo: <a href="#">casa de pedra</a>, <a href="#">casa velha</a>, <a href="#">casaril</a>, <a href="#">casa de pedra</a>, <a href="#">casa velha</a>, <a href="#">casaril</a></p>
        </div>
      </div>
      
      <!--   PAINEL DE IMAGENS - GALERIA - CARROSSEL   -->  
      <div class="wrap">
        <div id="panel">
        
          @include("includes.photos");
          @include("includes.photos");
          
        </div>
      </div>
      <!--   FIM - PAINEL DE IMAGENS  -->
      
    </div>
    <!--   FIM - MEIO DO SITE   -->
    
@stop