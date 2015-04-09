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

<script type="text/javascript" src="{{ URL::to("/") }}/js/panel.js"></script>

<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to("/") }}/css/checkbox.css" />

@stop

@section('content')
    <!--   MEIO DO SITE - ÁREA DE NAVEGAÇÃO   -->
    <div id="content">
    
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


  </div>
  <!--   FIM - CONTAINER   -->
  <!--   MODAL   -->
    <div id="mask"></div>
    <div id="form_window">
      <a class="close" href="#" title="FECHAR">Fechar</a>
      <div id="registration"></div>
    </div>
    <div id="confirmation_window">
      <div id="registration_delete">
        <p></p>
        {{ Form::open(array('url' => '', 'method' => 'delete')) }}
          <div id="registration_buttons">
            <a class="btn" href="#" id="submit_delete">Confirmar</a>
            <a class="btn" href="#" id="cancel_delete">Cancelar</a>
          </div>
        {{ Form::close() }}
      </div>
    </div>

@stop