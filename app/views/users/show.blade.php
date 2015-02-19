@extends('/layouts.default')

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

<script type="text/javascript" src="{{ URL::to("/") }}/js/friend.js"></script>
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
			  @if ( !empty($user->institution) )
				<br>Instituição: {{ $user->institution }}</p>
			  @endif
	        </div>
	      	<div class="count">Fotos compartilhadas ({{ count($photos) }})</div>
	      </div>
	    </div>
    
    <!-- GALERIA DO USUÁRIO -->
    <div id="user_gallery">
      
      <div class="wrap">
        <div id="stripe">
          
          <?php $i = 0; ?>
          
          @foreach($photos as $photo)
          
            <?php
              $i++;
              $size = 1; 
              if ($i%5 == 3) $size = 2;
              if ($i%10 == 8) $size = 3;
            ?>
            
            <div class="item h<?php echo $size; ?>"><div class="layer" data-depth="0.2">
              <a href='{{ URL::to("/photos/{$photo->id}") }}'>
              <img src='{{ URL::to("/arquigrafia-images/{$photo->id}_view.jpg") }}' title='{{ $photo->name }}'>
              </a>
            </div></div>
            
          @endforeach
          
        </div>
        <div class="panel-back"></div>
        <div class="panel-next"></div>
      </div>
    
    </div>
    
    <!-- USUÁRIO -->
    <div class="container">
    	<div class="four columns">
      	<hgroup class="profile_block_title">
        	<h3><i class="profile"></i>Perfil</h3>
        </hgroup>
      	<ul>
			@if ( !empty($user->name) )
				<li><strong>Nome:</strong> {{ $user->name}}</li>
			@endif
			@if ( !empty($user->secondName) )
				<li><strong>Sobrenome:</strong>{{ $user->secondName }}</li>
			@endif
        </ul>
        <br>
        <ul>
			@if ( !empty($user->scholarity) )
				<li><strong>Escolaridade:</strong> {{ $user->scholarity }}</li>
			@endif
			@if ( !empty($user->institution) )
				<li><strong>Instituição:</strong> {{ $user->institution }}</li>
			@endif
			@if ( !empty($user->course) )
				<li><strong>Curso:</strong> {{ $user->course }}</li>
			@endif
			@if ( !empty($user->occupation) )
				<li><strong>Ocupação:</strong> {{ $user->occupation }}</li>
			@endif
        </ul>
      </div>
      
      <div class="four columns">
      	<hgroup class="profile_block_title">
        	<h3><i class="follow"></i>Seguindo ({{$user->following->count()}})</h3>
    			<a href="#" id="small" class="profile_block_link">Ver todos</a>
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
          <a href="#" id="small" class="profile_block_link">Ver todos</a>
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
      
	  <br>
	  
	  <?php if ($user->oldPassword != null) { ?>
            <div class="twelve columns albums">
				<hgroup class="profile_block_title">
					<h3><i class="photos"></i> <!--Minhas galerias--> Meus álbuns</h3>
				</hgroup>				     
				<p>No momento seus álbuns não estão disponíveis, mas não se preocupe, estão armazenados com segurança no nosso sistema e em breve será disponibilizado.</p>

						<!--
						<div class="profile_box">
						  <div class="gallery_box">
							  <a href="album.php" class="gallery_photo">
								  <img src="{{ URL::to("/") }}/placeholders/album-1.jpg" class="gallery_photo"></a>
							  <a href="album.php" class="name">Favoritos (12)</a>
							  <br>
						  </div>
						  <div class="gallery_box">
							  <a href="album.php" class="gallery_photo">
								  <img src="{{ URL::to("/") }}/placeholders/album-2.jpg" class="gallery_photo"></a>
							  <a href="album.php" class="name">CITINET/ARQUIGRAFIA (9)</a>
							  <br>
						  </div>
						  <div class="gallery_box">
							  <a href="album.php" class="gallery_photo">
								  <img src="{{ URL::to("/") }}/placeholders/album-3.jpg" class="gallery_photo"></a>
							  <a href="album.php" class="name">HISTÓRIA (12)</a>
							  <br>
						  </div>
						  <div class="gallery_box">
							  <a href="album.php" class="gallery_photo">
								  <img src="{{ URL::to("/") }}/placeholders/album-4.jpg" class="gallery_photo"></a>
							  <a href="album.php" class="name">Sapucaí (103)</a>
							  <br>
						  </div>
						  <div class="gallery_box">
							  <a href="album.php" class="gallery_photo">
								  <img src="{{ URL::to("/") }}/placeholders/album-2.jpg" class="gallery_photo"></a>
							  <a href="album.php" class="name"><i class="stack"></i> (5)</a>
							  <br>
						  </div>
						</div>
						-->
        
			</div><!-- fim dos albums -->
		<?php } ?>
    
    </div>
    
    <!-- FOOTER -->
    <?php //include "includes/footer.php"; ?>
    
		<!--   MODAL   -->
		<div id="mask"></div>
		<div id="form_window">
			<!-- ÁREA DE LOGIN - JANELA MODAL -->
			<a class="close" href="#" title="FECHAR"></a>
			<div id="registration"></div>
		</div>

@stop
