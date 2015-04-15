@extends('layouts.default')

@section('head')

{{ HTML::style('/css/style.css'); }}

<title>Arquigrafia - {{ $photos->name }}</title>

<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to("/") }}/css/checkbox.css" />

<!--   JQUERY   -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
              <!-- <span><i id="graph"></i> <small>65 visualizações e 0 avaliações</small></span> -->
              <span class="right"><i id="comments"></i> <small>{{$commentsCount}}</small>
              </span>


              <?php /*if (Auth::check() && Auth::user()->id == $photos->user_id) { ?>  
               	<span class="right">
        					<a id="delete_button" href="{{ URL::to('/photos/' . $photos->id) }}" title="Excluir imagem"></a>
              	</span>
              <?php } */?>
             
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
							<!-- <li><a href="#" title="Adicione aos seus favoritos" id="add_favourite"></a></li>
							<li><a href="#" title="Denuncie esta foto" id="denounce"></a></li>-->
              
							<!--<li><a href="18/photo_avaliation/2778" title="Avalie a foto" id="eyedroppper"></a></li>-->
							<li><a href="{{ URL::to('/albums/get/list/' . $photos->id) }}" title="Adicione aos seus álbuns" id="plus"></a></li>
            
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
        
        <!-- AVALIAÇÃO -->
               
        <h3>Avaliação d{{$architectureName}}</h3> 
        
			 
        <p>Avalie a arquitetura apresentada nesta imagem de acordo com seus aspectos, compare também sua avaliação com as dos outros usuários.</p>
               
        <!-- FORMULÁRIO DE AVALIAÇÃO -->
        <div id="evaluation_box">
        
          <?php if (Auth::check()) { ?>
              
            {{ Form::open(array('url' => "photos/{$photos->id}/saveEvaluation")) }}
            
              <?php 
                $count = $binomials->count() - 1;
                // fazer um loop para cada e salvar como uma avaliação
                foreach ($binomials->reverse() as $binomial) { ?>
                  
                  <p>
                    {{ Form::label('value-'.$binomial->id, $binomial->firstOption) }}<br>
                    @if (isset($userEvaluations) && !$userEvaluations->isEmpty())
                      <?php $userEvaluation = $userEvaluations->get($count) ?>
                      {{ Form::input('range', 'value-'.$binomial->id, $userEvaluation->evaluationPosition, ['min'=>'0','max'=>'100']) }}
                    @else
                      {{ Form::input('range', 'value-'.$binomial->id, $binomial->defaultValue, ['min'=>'0','max'=>'100']) }}
                    @endif
                    <?php $count-- ?>
                     {{ Form::label('value-'.$binomial->id, $binomial->secondOption) }}<br>
                  </p>
                  
              <?php } ?>
              
               <a href="{{ URL::to('/photos/' . $photos->id) }}" class='btn right'>CANCELAR</a>&nbsp;&nbsp;
              {{ Form::submit('AVALIAR', ['id'=>'evaluation_button','class'=>'btn right']) }} 
                
            {{ Form::close() }}
            
            
          <?php } else { ?>
            @if (empty($average)) 
              <p>Faça o <a href="{{ URL::to('/users/login') }}">Login</a> e seja o primeiro a avaliar {{$architectureName}}</p>
            @else
              <p>Faça o <a href="{{ URL::to('/users/login') }}">Login</a> e avalie você também {{$architectureName}}</p>
            @endif            
          <?php } ?>
        
        </div>

      </br>
        
        <!-- MÉDIA DE AVALIAÇÕES -->
        @if (!empty($average))            
            
          <h3>Média de Avaliações d{{$architectureName}}</h3>
          

          <div id="evaluation_average">
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
            
            <div id="chart_div"><div>            
            <script>
            
                  google.load('visualization', '1.1', {packages: ['line', 'corechart']});
    google.setOnLoadCallback(drawChart);

    function drawChart() {

      var materialChart;
      var classicChart;
      var button = document.getElementById('change-chart');
      var materialDiv = document.getElementById('material');
      var classicDiv = document.getElementById('classic');

      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Month');
      data.addColumn('number', "Average Temperature");
      data.addColumn('number', "Average Hours of Daylight");

      data.addRows([
        [new Date(2014, 0),  -.5,  5.7],
        [new Date(2014, 1),   .4,  8.7],
        [new Date(2014, 2),   .5,   12],
        [new Date(2014, 3),  2.9, 15.3],
        [new Date(2014, 4),  6.3, 18.6],
        [new Date(2014, 5),    9, 20.9],
        [new Date(2014, 6), 10.6, 19.8],
        [new Date(2014, 7), 10.3, 16.6],
        [new Date(2014, 8),  7.4, 13.3],
        [new Date(2014, 9),  4.4,  9.9],
        [new Date(2014, 10), 1.1,  6.6],
        [new Date(2014, 11), -.2,  4.5]
      ]);

      var materialOptions = {
        chart: {
          title: 'Average Temperatures and Daylight in Iceland Throughout the Year'
        },
        width: 900,
        height: 500,
        series: {
          // Gives each series an axis name that matches the Y-axis below.
          0: {axis: 'Temps'},
          1: {axis: 'Daylight'}
        },
        axes: {
          // Adds labels to each axis; they don't have to match the axis names.
          y: {
            Temps: {label: 'Temps (Celsius)'},
            Daylight: {label: 'Daylight'}
          }
        }
      };

      var classicOptions = {
        title: 'Average Temperatures and Daylight in Iceland Throughout the Year',
        width: 900,
        height: 500,
        // Gives each series an axis that matches the vAxes number below.
        series: {
          0: {targetAxisIndex: 0},
          1: {targetAxisIndex: 1}
        },
        vAxes: {
          // Adds titles to each axis.
          0: {title: 'Temps (Celsius)'},
          1: {title: 'Daylight'}
        },
        hAxis: {
          ticks: [new Date(2014, 0), new Date(2014, 1), new Date(2014, 2), new Date(2014, 3),
                  new Date(2014, 4),  new Date(2014, 5), new Date(2014, 6), new Date(2014, 7),
                  new Date(2014, 8), new Date(2014, 9), new Date(2014, 10), new Date(2014, 11)
                 ]
        },
        vAxis: {
          viewWindow: {
            max: 30
          }
        }
      };

      materialChart = new google.charts.Line(materialDiv);
      classicChart = new google.visualization.LineChart(classicDiv);

      classicChart.draw(data, classicOptions);
      materialChart.draw(data, materialOptions);

      button.onclick = function () {
        materialDiv.classList.toggle('hide');
        classicDiv.classList.toggle('hide');

        if (materialDiv.classList.contains('hide')) {
          button.innerText = 'Change to Material';
        } else {
          button.innerText = 'Change to Classic';
        }

      };
    }
              
            </script>
            
            
          </div>
        
        </div>
        
        <br class="clear">
        
			</div>
      
     </div> 
     @endif 
      
			<!--   FIM - SIDEBAR   -->
		</div>
    
		<!--   MODAL   -->
		<div id="mask"></div>
		<div id="form_window">
			<!-- ÁREA DE LOGIN - JANELA MODAL -->
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