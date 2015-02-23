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
<script type="text/javascript">
	// Google Analytics
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20571872-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<script type="text/javascript" src="{{ URL::to("/") }}/js/panel.js"></script>

@stop

@section('content')
    <!--   MEIO DO SITE - ÁREA DE NAVEGAÇÃO   -->
    <div id="content">
    
      <!--   PAINEL DE IMAGENS - GALERIA - CARROSSEL   -->  
      <div class="wrap">
        <div id="panel">
          
          <?php $i = rand(0,5);?>
          
          @foreach($photos as $photo)
          
            <?php
              $i++;
              $size = 1; 
              if ($i%5 == 3) $size = 2;
              if ($i%13 == 8) $size = 3;
            ?>
            
            <div class="item h<?php echo $size; ?>">
            	<div class="layer" data-depth="0.2">
                <a href='{{ URL::to("/photos/{$photo->id}") }}'>
                 <img src="{{ asset('/arquigrafia-images/'. $photo->id . '_view.jpg') }}" title="{{ $photo->name }}">
                </a>
                <div class="item-title">{{ $photo->name }}</div>
            	</div>
            </div>
            
          @endforeach
          
        </div>
        <div class="panel-back"></div>
        <div class="panel-next"></div>
      </div>
      <!--   FIM - PAINEL DE IMAGENS  -->

    </div>
    <!--   FIM - MEIO DO SITE   -->


    <?php //include "includes/footer.php"; ?>
    
  </div>
  <!--   FIM - CONTAINER   -->
  
</body>
</html>


@stop