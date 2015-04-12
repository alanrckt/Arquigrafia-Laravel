@extends('/layouts.default')

@section('head')

<title>Arquigrafia - Seu universo de imagens de arquitetura</title>

<!--   JQUERY - Google Ajax API CDN (Also supports SSL via HTTPS)   -->
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-ui-1.8.17.custom.min.js"></script>

<!-- Google Maps API -->
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<!-- ISOTOPE -->
<script src="{{ URL::to("/") }}/js/jquery.isotope.min.js"></script>

<script type="text/javascript" src="{{ URL::to("/") }}/js/panel.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="{{ URL::to("/") }}/css/checkbox.css" />
@stop

@section('content')
		<?php //include "includes/header.php"; ?>

		<!--   HEADER DO USUÁRIO   -->
		<div class="container">
	      <div id="user_header" class="twelve columns">
          
          <?php if ($user->photo != "") { ?>
            <img class="avatar" src="{{ asset($user->photo) }}" class="user_photo_thumbnail"/>
          </a>
          <?php } else { ?>
            <img class="avatar" src="{{ asset("img/avatar-60.png") }}" width="60" height="60" class="user_photo_thumbnail"/>
          <?php } ?>
          
	        <div class="info">

	          <h1>{{ $user->name}} {{ $user->secondName}}</h1>
			  @if ( !empty($user->city) )
				<p>Cidade: {{ $user->city }}
			  @endif
			  @if ( !empty($user->site) )
				<br>Site pessoal: {{ $user->site }}</p>
			  @endif
	        </div>
	      	<div class="count">Fotos compartilhadas ({{ count($photos) }})</div>
	      </div>
	    </div>
    
    <!-- GALERIA DO USUÁRIO -->
    <div id="user_gallery">
      
    	@if($photos->count() > 0)
	      <div class="wrap">
   	   		@include('includes.panel-stripe')
      	</div>
      @else
      	<div class="container row">
      		<div class="six columns">
	      		<p>
	      			Você ainda não tem fotos no seu perfil. Faça o upload de uma imagem 
	      			<a href="{{ URL::to('/photos/upload') }}">aqui</a>
	      		</p>
      		</div>
      	</div>
      @endif
    
    </div>
    
    <!-- USUÁRIO -->
    <div class="container row">
    	<div class="four columns">
      	<hgroup class="profile_block_title">
        	<h3><i class="profile"></i>Perfil</h3> &nbsp; &nbsp;
        	<?php if (Auth::check() && Auth::user()->id == $user->id) { ?>
        	<a href= '{{"/users/" . $user->id . "/edit" }}' title="Editar perfil" >
        		<img src="{{ asset("img/edit.png") }}" width="16" height="16" />
        	</a>
        	<?php } ?>
        </hgroup>
      	<ul>
			@if ( !empty($user->name) )
				<li><strong>Nome completo: </strong> {{ $user->name}}</li>
			@endif
			<!--@if ( !empty($user->secondName) )
				<li><strong>Sobrenome:</strong>{{ $user->secondName }}</li>
			@endif-->
        </ul>
        <br>
        <ul>
        	@if ( !empty($user->lastName) )
				<li><strong>Apelido: </strong>{{ $user->lastName }}</li>
			@endif
			@if ( !empty($user->birthday) && $user->visibleBirthday == 'yes')
				<li><strong>Data de nascimento: </strong>{{ $user->birthday }}</li>
			@endif
			@if ( !empty($user->gender) )
				<li><strong>Sexo: </strong>{{ $user->gender == 'female' ? 'Feminino' : 'Masculino' }}</li>
			@endif
			@if ( !empty($user->email) && $user->visibleEmail == 'yes')
				<li><strong>E-mail: </strong>{{ $user->email }}</li>
			@endif
			@if ( !empty($user->country) )
				<li><strong>País: </strong>{{ $user->country }}</li>
			@endif
			@if ( !empty($user->state) )
				<li><strong>Estado: </strong>{{ $user->state }}</li>
			@endif
			@if ( !empty($user->city) )
				<li><strong>Cidade: </strong>{{ $user->city }}</li>
			@endif
			@if ( !empty($user->scholarity) )
				<li><strong>Escolaridade: </strong> {{ $user->scholarity }}</li>
			@endif
			@if ( $user->occupation != null && $user->occupation->institution != null )
				<li><strong>Instituição: </strong>{{ $user->occupation->institution}}</li>
			@endif
			@if ( $user->occupation != null && $user->occupation->occupation != null )
				<li><strong>Ocupação: </strong>{{ $user->occupation->occupation}}</li>
			@endif
			@if ( !empty($user->site) )
				<li><strong>Site pessoal: </strong> {{ $user->site }}</li>
			@endif			
        </ul>
      </div>
      
      <div class="four columns">
      	<hgroup class="profile_block_title">
        	<h3><i class="follow"></i>Seguindo ({{$user->following->count()}})</h3>
    			<!--<a href="#" id="small" class="profile_block_link">Ver todos</a>-->
   	 		</hgroup>
        <!--   BOX - AMIGOS   -->
    		<div class="profile_box">			
				@foreach($user->following as $following)
					<a href= {{ '/users/' .  $following->id }} >
					<?php if ($following->photo != "") { ?>					
						<img width="40" height="40" class="avatar" src="{{ asset($following->photo) }}" class="user_photo_thumbnail"/>
					<?php } else { ?>
						<img width="40" height="40" class="avatar" src="{{ asset("img/avatar-60.png") }}" width="60" height="60" class="user_photo_thumbnail"/>
					<?php } ?>
					</a>
					
				@endforeach           
			</div>
        
      </div>
      
      <div class="four columns">
      	<hgroup class="profile_block_title">
          <h3><i class="follow"></i>Seguidores ({{$user->followers->count()}})</h3>
          <!--<a href="#" id="small" class="profile_block_link">Ver todos</a>-->
        </hgroup>
    		<!--   BOX - AMIGOS   -->
		<div class="profile_box">
          <!--   LINHA - FOTOS - AMIGOS   -->
          <!--   FOTO - AMIGO   -->
          
          @foreach($user->followers as $follower)
					<a href= {{ '/users/' .  $follower->id }} >
					<?php if ($follower->photo != "") { ?>					
						<img width="40" height="40" class="avatar" src="{{ asset($follower->photo) }}" class="user_photo_thumbnail"/>
					<?php } else { ?>
						<img width="40" height="40" class="avatar" src="{{ asset("img/avatar-60.png") }}" width="60" height="60" class="user_photo_thumbnail"/>
					<?php } ?>
					</a>
		@endforeach   
		
		</div>
        
      </div>
      
    </div>
    
    	    <!-- MEUS ALBUNS -->
	<div class="container">
				
			<div class="twelve columns albums">
				<hgroup class="profile_block_title">
					<h3><i class="photos"></i>Meus álbuns</h3>
				</hgroup>
				<?php $albums = $user->albums; ?>
				
				<div class="profile_box">
					@if ($albums->count() > 0)
						@foreach($albums as $album)
							<div class="gallery_box">
								<a href="{{ URL::to("/albums/" . $album->id) }}" class="gallery_photo" title="{{ $album->title }}">
									@if (isset($album->cover_id))
										<img src="{{ URL::to("/arquigrafia-images/" . $album->cover_id . "_home.jpg") }}" class="gallery_photo" />
									@else
										<div class="gallery_photo">
											<div class="no_cover">
												<p> Álbum sem capa </p>
											</div>
										</div>
									@endif
								</a>
								<a href="{{ URL::to("/albums/" . $album->id) }}" class="name">
									{{ $album->title . ' ' . '(' . $album->photos->count() . ')' }}
								</a>
								<br />
							</div>
						@endforeach
					@else
						<p>
						Você ainda não tem nenhum álbum. Crie um <a href="{{ URL::to('/albums/create') }}">aqui</a>
						</p>
					@endif
				</div>
			
			</div>
	
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
