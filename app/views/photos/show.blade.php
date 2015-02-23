@extends('layouts.default')

@section('head')

{{ HTML::style('/css/style.css'); }}

<title>Arquigrafia - {{ $photos->name }}</title>

<!--   JQUERY   -->
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
<script type="text/javascript">
	form_window_loaded = false;

	$(document).ready(function(){
		
		//$(".image img[title]").tooltip();

		$('#edit_perfil_button').click(function(){
			var part = "perfil";
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/profile/10/edit/21');	
			form_window_loaded = true;
		});
		
		$('#edit_user_button').click(function(){
			var part = "perfil";
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users//edit/21');	
			form_window_loaded = true;
		});

		$('#edit_user_password_button').click(function(){
			var part = "perfil";
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users//edit/21/password');	
			form_window_loaded = true;
		});
		
		$('#registration_button').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users/8/signup');	
			form_window_loaded = true;
		});
		
		$('#upload').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/photo/7/upload');	
			form_window_loaded = true;
		});
		
		$('.profile_photo_edit').click(function(e){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/profile/10/uploadphotoprofile');	
			form_window_loaded = true;
			e.preventDefault();
		});
		

		
		$('#upload_bar').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('modal/upload_bar.html');	
			form_window_loaded = true;
		});

		$('#contact').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/18/contact');	
			form_window_loaded = true;
		});

		$('#login_button').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users/8/login');	
			form_window_loaded = true;
		});

		$('#forgot_password').live("click", function(e){
			e.preventDefault();
			$('#mask').fadeOut('fast');
			$('#form_window').fadeOut('slow');
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load(this.href);	
		});

		
		$('#registration_user').live("click", function(e){
			e.preventDefault();
			$('#mask').fadeOut('fast');
			$('#form_window').fadeOut('slow');
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load(this.href);	
		});

		
		$('#comment_login_link').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users/8/login');	
			form_window_loaded = true;
		});

		$('#edit_photo').click(function(e){
			e.preventDefault();
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load(this.href);	
			form_window_loaded = true;
		});
		
		$('#footer_login_link').click(function(){
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users/8/login');	
			form_window_loaded = true;
		});
		
		$('#form_window .close').click(function (e) {
			e.preventDefault();
			
			$('#mask').fadeOut();
			$('#form_window').fadeOut('fast');
		});		
		
		$('#mask').click(function () {
			$(this).fadeOut();
			$('#form_window').fadeOut('fast');
		});
			
		$('#printer_icon').click(function() {
		  window.print();
		  return false;
		});
			
		// IMAGES HOVERS
        
        var ua = $.browser;
        // desativa para ff 
        //if ( !(ua.mozilla) ) {
            $('.image').mouseenter(function(){
                $('.image').css('opacity',0.6);
                $(this).css('opacity',1);
            });
            $('#panel').mouseleave(function(){ 
                $('.image').css('opacity',1);
            });
        //}
        
        $('.footer_image').mouseenter(function(){
            $('.footer_image img').css('opacity',0.6);
            $($(this).children('img'),this).css('opacity',1);
        });

        $('.images_line').mouseleave(function(){ 
            $('.footer_image img').css('opacity',1);
        });
        
	    	$('#album_gallery_box').mouseleave(function(){ 
	    		$('.image').css('opacity',1);
	    	});
	    	
	    	$('#album_bar').mouseleave(function(){ 
	    		$('.image').css('opacity',1);
	    	});
		
		// FOOTER
		
		var Dist = 905;
		var Qtd = 0;
		var FooterCont = 0;
		//var Local = $('.images_line').css('margin-left');
		
		function ArrowValidation(FooterCont){
			if(FooterCont <= 0){
				$('#arrow-left').css({'display':'none'});
			}
			
			if(FooterCont >= 2){
				$('#arrow-right').css({'display':'none'});
			}
		}
		
		function FooterCarouselAnimation(Qtd){
			$('.images_line').animate({marginLeft: - (Qtd * Dist)}, 500);
		}
		
		$('#arrow-left').click(function(){
			if(Qtd != 0){
				Qtd--;
				FooterCarouselAnimation(Qtd);
			}
			else{
				Qtd = 2;
				FooterCarouselAnimation(Qtd);
			}
		});
		
		$('#arrow-right').click(function(){
			if(Qtd != 2){
				Qtd++
				FooterCarouselAnimation(Qtd);
			}
			else{
				Qtd = 0;
				FooterCarouselAnimation(Qtd);
			}
		});
		
		//TABS
		
		$('.tab_link').click(function(){
			var tabCurrentClass = $(this).attr("class");
			
			if(!$(this).hasClass("selected_tab_link")){
				var tabDestiny = $(this).attr("href");
				var tabDestinyPreview = $('.selected_tab_link').attr("href");
				
				$(tabDestiny).css({'display':'block'});
				$(tabDestinyPreview).css({'display':'none'});
				//FooterCarouselAnimation(0);
				
				$(".selected_tab_link").removeClass("selected_tab_link");
				
				$(this).addClass("selected_tab_link");
			}
		});
		
		// ADVANCED SEARCH
		
		var ON = false;
		
		$('a#complete_search').click(function(){
			if(ON == false){
				ON = true;
				$('#header').animate({height:142}, 200, function(){
					$('#complete_search_bar').fadeIn(200);	
				});
					
			} else {
				ON = false;
				$('#header').animate({height:102}, 200, function(){
					$('#complete_search_bar').fadeOut(200);	
				
				});
			}
		});
	});

	
	function load(firstTime) {

	
			message_delivery(firstTime); // 1=Mensagem enviada!; 2=Falha no envio.

		
					
//		if ( null!== showMessage ) {
//			$('#mask').fadeIn('fast');
//			$('#form_window').fadeIn('slow');
//			$('#registration').load('/18/showMessage');	
//			form_window_loaded = true;
//		}
		
	}

	function message_delivery (message_delivery_value){
		if (message_delivery_value == 1) {
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/18/welcome');	
			form_window_loaded = true;
		}
		else if (message_delivery_value == 2) {
			$('#mask').fadeIn('fast');
			$('#form_window').fadeIn('slow');
			$('#registration').load('/users/8/signup');	
			form_window_loaded = true;
		}		
		else if (message_delivery_value==3){
			$('#message_delivery').fadeIn('fast');
		}
		else if(message_delivery_value==4){
			$('#fail_message_delivery').fadeIn('fast');
		}
		else if(message_delivery_value==5){
			$('#message_upload_ok').fadeIn('fast');
		}		
		else if(message_delivery_value==6){
			$('#message_upload_error').fadeIn('fast');
		}
		else if(message_delivery_value==7){
			$('#message_login_error').fadeIn('fast');
		}		
		else{
			$('#fail_message_delivery, message_delivery').fadeOut('fast');
		}
	}
	
	//MAP AND GEOREFERENCING CREATION AND SETTING
	var geocoder;
	var map;
	
	function initialize() {
		var street = {{ $photos->street }};
		var district = {{ $photos->district }};
		var city = {{ $photos->city }};
		var state = {{ $photos->state }};
		var country = {{ $photos->country }};
		var address = street + "," + district + "," + city + "-" + state + "," + country;
		console.log(address);
		
		geocoder = new google.maps.Geocoder();
		
		var latlng = new google.maps.LatLng(-34.397, 150.644);
		var myOptions = {
		  zoom: 15,
		  center: latlng,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}						    

		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
		
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
			});
			} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
		});
	}
</script>

<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to("/") }}/css/jquery.fancybox.css" />

<script type="text/javascript" src="{{ URL::to("/") }}/js/friend.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/photo.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/album.js"></script>

@stop

	@section('content')

		<!--   MEIO DO SITE - ÁREA DE NAVEGAÇ?Ã?O   -->
		<div id="content" class="container">
			<!--   COLUNA ESQUERDA   -->
			<div class="eight columns">
				<!--   PAINEL DE VISUALIZACAO - SINGLE   -->
				<div id="single_view_block">
					<!--   NOME / STATUS DA FOTO   -->
					<div>
						<div class="four columns alpha">
            	<h1>{{ $photos->name }}</h1>
            </div>
						<div class="four columns omega">
              <!-- <span><i id="graph"></i> <small>65 visualizações e 0 avaliações</small></span> -->
              <span class="right"><i id="comments"></i> <small>0</small></span>
              <span class="right"><small>Upload: {{ $photos->created_at }}</small></span>
            </div>
					</div>
					<!--   FIM - NOME / STATUS DA FOTO   -->
					
          <!--   FOTO   -->
					<a class="fancybox" href="{{ URL::to("/arquigrafia-images")."/".$photos->id."_view.jpg" }}" title="Praça Ramos de Azevedo" ><img class="single_view_image" style="" src="{{ URL::to("/arquigrafia-images")."/".$photos->id."_view.jpg" }}" onload="initialize()" /></a>
 <!-- alt="${}"  --> 

				</div>				
				
				<!--   BOX DE BOTOES DA IMAGEM   -->
				<div id="single_view_buttons_box">
					
					<?php if (Auth::check()) { ?>
						
            <ul id="single_view_image_buttons">
							<!-- <li><a href="#" title="Adicione aos seus favoritos" id="add_favourite"></a></li>
							<li><a href="#" title="Denuncie esta foto" id="denounce"></a></li>-->
              
							<!--<li><a href="18/photo_avaliation/2778" title="Avalie a foto" id="eyedroppper"></a></li>-->
							<!--<li><a href="album/15/add/2778" title="Adicione a sua galeria" id="plus"></a></li>-->
            
							<li><a href="{{ asset('photos/download/'.$photos->id) }}" title="Faça o download" id="download" target="_blank"></a></li>
           	
						</ul>
            
             <?php } else { ?>
              <div class="six columns alpha">Faça o login para fazer o download e comentar as imagens.</div>
            <?php } ?>
            
						<ul id="single_view_social_network_buttons">
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fdf62121c50304d"></script>
							<!-- <li><a href="#" class="delicious"></a></li> -->
							<!-- <li><a href="#" class="more_sare_buttons addthis_button_compact"><span class="more_sare_buttons">+ outros</span></a></li> -->
							<li><a href="#" class="google addthis_button_google_plusone_share"><span class="google"></span></a></li>
							<li><a href="#" class="facebook addthis_button_facebook"><span class="facebook"></span></a></li>
							<li><a href="#" class="twitter addthis_button_twitter"><span class="twitter"></span></a></li>
						</ul>
					
				</div>
				<!--   FIM - BOX DE BOTOEES DA IMAGEM   -->
        
        <div class="tags">
        	<h3>Tags:</h3>

					<p>
         <!-- <a class="" href="tags/50" >Pedra</a>-->

          <p>
          @if (isset($tags))
            @foreach($tags as $tag)
              @if ($tag->id == $tags->last()->id)
              <!-- <a class="" href="tags/{{ $tag->id }}"> -->
              {{ $tag->name }}
              <!-- </a> -->
              @else
              <!-- <a class="" href="tags/{{ $tag->id }}"> -->
              {{ $tag->name }},          
              @endif          
            @endforeach
          @endif   
          
          </p>
          </div>
        
				<!--   BOX DE COMENTARIOS   -->
				<div id="comments_block" class="eight columns row alpha omega">
        	<h3>Comentários</h3>
          
          <?php $comments = $photos->comments; ?>
          
          @if (!isset($comments))
          
          <p>Ninguém comentou a imagem. Seja o primeiro!</p>
          
          @endif
          
          <?php if (Auth::check()) { ?>
            
            {{ Form::open(array('url' => "photos/{$photos->id}/comment")) }}
              <div class="column alpha omega row">
              <?php if (Auth::user()->photo != "") { ?>
                <img class="user_thumbnail" src="{{ asset(Auth::user()->photo); }}" />
              <?php } else { ?>
                <img class="user_thumbnail" src="{{ URL::to("/") }}/img/avatar-48.png" width="48" height="48" />
              <?php } ?>
              </div>
              
              <div class="three columns row">
                <strong><a href="#" id="name">{{ Auth::user()->name }}</a></strong><br>
                Deixe seu comentário <br>
                {{ $errors->first('text') }}
                {{ Form::textarea('text', '', ['id'=>'comment_field']) }}
                {{ Form::hidden('user', $photos->id ) }}
                {{ Form::submit('COMENTAR', ['id'=>'comment_button','class'=>'cursor btn']) }}
              </div>
            {{ Form::close() }}
            
            <br class="clear">
            
          <?php } else { ?>
            <p>Você precisa estar logado para comentar! <a href="{{ URL::to('/users/login') }}">Login</a></p>
          <?php } ?>
          
          @if (isset($comments))
          
            @foreach($comments as $comment)
            <div class="clearfix">
              <div class="column alpha omega row">
                <!--{{$comment->user->name}}--> 
                <img class="user_thumbnail" src="{{ URL::to("/") }}/img/avatar-48.png" width="48" height="48" />
              </div>
              <div class="four columns omega row">
                <small>{{$comment->user->name}} - {{$comment->created_at->format('d/m/Y h:m') }}</small>
                <p>{{ $comment->text }}</p>
              </div>        
            </div>       
            @endforeach
          
          @endif
          
          
          
          
          
        </div>
				<!-- FIM DO BOX DE COMENTARIOS -->
        
        
        
        
			</div>
			<!--   FIM - COLUNA ESQUERDA   -->
			<!--   SIDEBAR   -->
			<div id="sidebar" class="four columns">
				<!--   USUARIO   -->
				
        <div id="single_user" class="clearfix row">
				  
          
          <a href="{{ URL::to("/users/".$owner->id) }}" id="user_name">
            <?php if ($owner->photo != "") { ?>
              <img id="single_view_user_thumbnail" src="<?php echo asset($owner->photo); ?>" class="user_photo_thumbnail"/>
            <?php } else { ?>
              <img id="single_view_user_thumbnail" src="{{ URL::to("/") }}/img/avatar-48.png" width="48" height="48" class="user_photo_thumbnail"/>
            <?php } ?>
          </a>
          
          
          <!-- lfsalfasdl -->
          
					<h1 id="single_view_owner_name"><a href="{{ URL::to("/users/".$owner->id) }}" id="name">{{ $owner->name }}</a></h1>
    		@if (Auth::check())
    			@if (!empty($follow) && $follow == true)
	    			<a href="{{ URL::to("/friends/follow/" . $owner->id) }}" id="single_view_contact_add">Seguir</a><br />
 				@else
          <div>Seguindo</div>
 				@endif
			@endif	
				</div>
				<!--   FIM - USUARIO   -->
        
				<!-- <h3>Equipamento:</h3>
				<p>Lorem ipsum dolor sit amet</p> -->
					
          <hgroup class="profile_block_title">
            <h3><i class="info"></i> Informações</h3>
          </hgroup>
          
          		@if ( !empty($photos->description) )
					<h4>Descrição:</h4>
					<p>{{ $photos->description }}</p>
				@endif

          		@if ( !empty($photos->collection) )				
					<h4>Coleção:</h4>
					<p>{{ $photos->collection }}</p>
				@endif
				
				@if ( !empty($photos->imageAuthor) )
					<h4>Autor da Imagem:</h4>
					<p>
						<!-- <a href="photos/7/show/search/term?q=ROBBA%2C+F%E1bio&term=imageAuthor&page=1&perPage=32"> -->
							{{ $photos->imageAuthor }}
						<!-- </a> -->
					</p>
				@endif
				
				@if ( !empty($photos->dataUpload) )
					<h4>Data de Upload:</h4>
					<p>{{ Photo::translate($photos->dataUpload) }}</p>
				@endif

				@if ( !empty($photos->dataCriacao) )
					<h4>Data da Imagem:</h4>
					<p>{{ Photo::translate($photos->dataCriacao) }}</p>
				@endif

				@if ( !empty($photos->workAuthor) )
					<h4>Autor da Obra:</h4>
					<p>{{ $photos->workAuthor }}</p>
				@endif

				@if ( !empty($photos->workdate) )
					<h4>Data da Obra:</h4>
					<p>{{ Photo::translate($photos->workdate) }}</p>
				@endif

				@if ( !empty($photos->street) || !empty($photos->city) ||
					!empty($photos->state) || !empty($photos->country) )
					<h4>Endereço:</h4>
					<p>
						@if (!empty($photos->street) && !empty($photos->city))
						<a href="{{ URL::to("/search?q=".$photos->street) }}">
						{{ $photos->street }},
						</a>
						@elseif (!empty($photos->street))
						<a href="{{ URL::to("/search?q=".$photos->street) }}">
						{{ $photos->street }}
						</a>
						<br />
						@endif

						@if (!empty($photos->city))
						<a href="{{ URL::to("/search?q=".$photos->city) }}">
					    {{ $photos->city }}
						</a>
						<br />
            			@endif

			            @if (!empty($photos->state) && !empty($photos->country))
			            {{ $photos->state }} - {{ $photos->country }}
			            @elseif (!empty($photos->state))
			            {{ $photos->state }}
			            @else
			            {{ $photos->country }}
			            @endif
													 
					</p>
				@endif
					
				<!--
				<h4>Localização:</h4>
				<div id="map_canvas" class="single_view_map" style="width:300px; height:200px;"></div> 
        -->
				
        <!-- AVALIAÇÃO -->
        <!--
			  <h4>Avaliação:</h4>
        <p>Avalie a arquitetura apresentada nesta imagem de acordo com seus aspectos, compare também sua avaliação com as dos outros usuários.</p>
        <a href="18/photo_avaliation/2778" title="Avalie a foto" id="evaluate_button" class="btn">AVALIAR</a> &nbsp;
        <a href="18/photo_avaliation_avarage/2778" title="Média das avaliações da foto" id="evaluation_average" class="btn">MÉDIA DAS AVALIAÇÕES</a>
        <br />
        <br />
        -->
				
        <!-- GRUPOS -->
        <!--
        <div id="group_photos">
          <hgroup class="profile_block_title">
            <h3><i class="photos"></i> Grupos que usaram esta foto (5)</h3>
          </hgroup>
          
          <div class="profile_box">
            <div class="gallery_box">
                <a href="group.php" class="gallery_photo">
                    <img src="{{ URL::to("/") }}/placeholders/group-photo-3.jpg" class="gallery_photo" /></a>
            </div>
            <div class="gallery_box">
                <a href="group.php" class="gallery_photo">
                    <img src="{{ URL::to("/") }}/placeholders/group-photo-2.jpg" class="gallery_photo" /></a>
            </div>
            <div class="gallery_box">
                <a href="group.php" class="gallery_photo">
                    <img src="{{ URL::to("/") }}/placeholders/group-photo-1.jpg" class="gallery_photo" /></a>
            </div>
            <div class="gallery_box">
                <a href="group.php" class="gallery_photo">
                    <img src="{{ URL::to("/") }}/placeholders/group-photo-4.jpg" class="gallery_photo" /></a>
            </div>
            <div class="gallery_box">
                <a href="group.php" class="gallery_photo">
                    <img src="{{ URL::to("/") }}/placeholders/group-photo-5.jpg" class="gallery_photo" /></a>
            </div>
          </div>
        </div>
        -->
        
			</div>
      
      
      
			<!--   FIM - SIDEBAR   -->
		</div>
    
		<!--   MODAL   -->
		<div id="mask"></div>
		<div id="form_window">
			<!-- ÁREA DE LOGIN - JANELA MODAL -->
			<a class="close" href="#" title="FECHAR"></a>
			<div id="registration"></div>
		</div>

@stop