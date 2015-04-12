@extends('layouts.default')

@section('head')

{{ HTML::style('/css/style.css'); }}

<title>Arquigrafia - {{ $photos->name }}</title>

<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to("/") }}/css/checkbox.css" />

<!--   JQUERY   -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<!-- Google Maps API -->
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	//MAP AND GEOREFERENCING CREATION AND SETTING
	var geocoder;
	var map;
	
	function initialize() {
		var street = "{{ $photos->street }}";
		var district = "{{ $photos->district }}";
		var city = "{{ $photos->city }}";
		var state = "{{ $photos->state }}";
		var country = "{{ $photos->country }}";
		var address;
		if (street) address = street + "," + district + "," + city + "-" + state + "," + country;
		else if (district) address = district + "," + city + "-" + state + "," + country;
		else address = city + "-" + state + "," + country;
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
				console.log("Geocode was not successful for the following reason: " + status);
			}
		});
	}
	
	initialize();
	
});
</script>

<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to("/") }}/css/jquery.fancybox.css" />

<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/photo.js"></script>


@stop

	@section('content')
  
    @if (Session::get('message'))
      <div class="container">
        <div class="twelve columns">
          <div class="message">{{ Session::get('message') }}</div>
        </div>
      </div>
    @endif

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
              <span class="right"><i id="comments"></i> <small>{{$commentsCount}}</small>
              </span>


              <?php if (Auth::check() && Auth::user()->id == $photos->user_id) { ?>  
               	<span class="right">
        					<a id="delete_button" href="{{ URL::to('/photos/' . $photos->id) }}" title="Excluir imagem"></a>
              	</span>
              <?php } ?>
             
            </div>
					</div>
					<!--   FIM - NOME / STATUS DA FOTO   -->
					
          <!--   FOTO   -->
					<a class="fancybox" href="{{ URL::to("/arquigrafia-images")."/".$photos->id."_view.jpg" }}" title="{{ $photos->name }}" ><img class="single_view_image" style="" src="{{ URL::to("/arquigrafia-images")."/".$photos->id."_view.jpg" }}" /></a>
 

				</div>				
				
				<!--   BOX DE BOTOES DA IMAGEM   -->
				<div id="single_view_buttons_box">
					
					<?php if (Auth::check()) { ?>
						
	            <ul id="single_view_image_buttons">						             
							
					<li><a href="{{ URL::to('/albums/get/list/' . $photos->id) }}" title="Adicione aos seus álbuns" id="plus"></a></li>
            
					<li><a href="{{ asset('photos/download/'.$photos->id) }}" title="Faça o download" id="download" target="_blank"></a></li>  

					<li><a href="{{ URL::to('/photos/' . $photos->id . '/evaluate' ) }}" title="Avalie {{$architectureName}}" id="evaluate" ></a></li>  

				</ul>
            
             <?php } else { ?>
              <div class="six columns alpha">Faça o login para fazer o download e comentar as imagens.</div>
            <?php } ?>
            
						<ul id="single_view_social_network_buttons">
						<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4fdf62121c50304d"></script>				
							
							<li><a href="#" class="google addthis_button_google_plusone_share"><span class="google"></span></a></li>
							<li><a href="#" class="facebook addthis_button_facebook"><span class="facebook"></span></a></li>
							<li><a href="#" class="twitter addthis_button_twitter"><span class="twitter"></span></a></li>
						</ul>
					
				</div>
				<!--   FIM - BOX DE BOTOES DA IMAGEM   -->
        
        <div class="tags">
        	<h3>Tags:</h3>

					<p>
        
          <p>
          @if (isset($tags))
            @foreach($tags as $tag)
              @if ($tag->id == $tags->last()->id)
                {{ $tag->name }}
              @else
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
          
          <p>Ninguém comentou sobre {{$architectureName}}. Seja o primeiro!</p>
          
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
            <p>Faça o <a href="{{ URL::to('/users/login') }}">Login</a> e comente sobre {{$architectureName}}</p>
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
					
          <hgroup class="profile_block_title">
            <h3><i class="info"></i> Informações</h3>
            &nbsp; &nbsp;
        	<?php if (Auth::check() && Auth::user()->id == $photos->user_id) { ?>
        	   	<a href= '{{"/photos/" . $photos->id . "/edit" }}' title="Editar informações da imagem">
                <img src="{{ asset("img/edit.png") }}" width="16" height="16"/>
        	</a>
        	<?php } ?>
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
						{{ $photos->imageAuthor }}						
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
			

        <h4>Licença:</h4>                
				<a href="http://creativecommons.org/licenses/by/3.0/deed.pt_BR" target="_blank" >
					<img src="{{ asset('img/ccIcons/by88x31.png') }}" id="ccicons" alt="license" />
				</a>
				</br>

         <!-- GOOGLE MAPS -->
        <h4>Localização:</h4>
        <div id="map_canvas" class="single_view_map" style="width:300px; height:250px;"></div> 
        </br>        
        
        <!-- AVALIAÇÃO -->
        <?php if (Auth::check()) { ?>
          <a href="{{ URL::to('/photos/' . $photos->id . '/evaluate' ) }}">
        <?php } ?>
        
        	@if (empty($average)) 
            <h4>Avaliação:</h4>                   
        		<img src="/img/GraficoFixo.png"  /> 
        	 @else			      
             <h4>Média de Avaliações d{{$architectureName}}:</h4>            
        <!-- Google Charts -->
          <div>
            <script type="text/javascript" src="https://www.google.com/jsapi"></script>            
            <div id="chart_div"><div>            
            <script>
            
              google.load('visualization', '1', {packages: ['corechart', 'line']});
              google.setOnLoadCallback(drawCurveTypes);
              
              function drawCurveTypes() {
                var data = new google.visualization.DataTable();
                data.addColumn('number', 'Pontuação');
                data.addColumn('number', 'Média de avaliações');
                
                @if(Auth::check() && isset($userEvaluations) && !$userEvaluations->isEmpty())
                  data.addColumn('number', 'Sua avaliação');
                @endif
                <?php $count = 0; ?>
                data.addRows([

                  @foreach($average as $avg)
                      [
                        {{ $count . ', ' }}
                        {{ $avg->avgPosition }}
                        @if(isset($userEvaluations) && !$userEvaluations->isEmpty())
                          <?php  $userEvaluation = $userEvaluations->get($count); ?>
                          {{ ', ' .  $userEvaluation->evaluationPosition }}
                        @endif
                      ],
                      <?php $count++ ?>
                  @endforeach
                ]);

                var options = {
                  orientation: 'vertical',
                  legend: {
                    position: 'bottom',
                  },
                  pointSize: 6,
                  hAxis: {
                    viewWindow: {min: 0, max: 100}
                  },
                  vAxis: {
                    ticks: [
                        <?php $count = 0?>
                        @foreach($binomials as $binomial)
                          {v: {{ $count }}, f: '{{ $binomial->firstOption . "-" . $binomial->secondOption }}' },
                          <?php $count++; ?>
                        @endforeach
                      ]
                  },
                  series: {
                    0: { color: '#999999' },
                    1: { color: '#000000' }
                  }
                };
          
                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                chart.draw(data, options);
              }
              
            </script>
          </div>
        
        </div>
        
        <br class="clear">
        
       </div>
       @endif
       <?php if (Auth::check()) { ?>
           </a>
        <?php } ?>      

        <?php if (Auth::check()) { ?>
           @if (isset($userEvaluations) && !$userEvaluations->isEmpty())
          	<a href='{{"/photos/" . $photos->id . "/evaluate" }}' title="Avaliar" id="evaluate_button" class="btn">
          		Clique aqui para alterar sua avaliação</a> &nbsp;
           @else
           		@if (empty($average)) 
           			<a href='{{"/photos/" . $photos->id . "/evaluate" }}' title="Avaliar" id="evaluate_button" class="btn">Seja o primeiro a avaliar {{$architectureName}}</a> &nbsp;
           		@else
           			<a href='{{"/photos/" . $photos->id . "/evaluate" }}' title="Avaliar" id="evaluate_button" class="btn">Avalie você também {{$architectureName}}</a> &nbsp;
           		@endif
           @endif
        <?php } else { ?>
        	@if (empty($average)) 
            	<p>Faça o <a href="{{ URL::to('/users/login') }}">Login</a> e seja o primeiro a avaliar {{$architectureName}}</p>
            @else
            	<p>Faça o <a href="{{ URL::to('/users/login') }}">Login</a> e avalie você também {{$architectureName}}</p>
            @endif

        <?php } ?>      
			<!--   FIM - SIDEBAR   -->
		</div>
    
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