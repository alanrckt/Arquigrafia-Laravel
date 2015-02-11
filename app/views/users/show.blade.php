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
          
          <?php if ($users->photo != "") { ?>
            <img class="avatar" src="{{ asset($users->photo) }}" class="user_photo_thumbnail"/>
          </a>
          <?php } else { ?>
            <img class="avatar" src="{{ asset("img/avatar-60.png") }}" width="60" height="60" class="user_photo_thumbnail"/>
          <?php } ?>
          
	        <div class="info">

	          <h1>{{ $users->name}} {{ $users->secondName}}</h1>

	          <p>Cidade: {{ $users->city }}<br>Instituição: {{ $users->institution }}</p>
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
              <img src='{{ URL::to("/img/photos/{$photo->nome_arquivo}") }}' title='{{ $photo->name }}'>
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
        	<li><strong>Nome:</strong> {{ $users->name}}</li>
          <li><strong>Sobrenome:</strong>{{ $users->secondName }}</li>
        </ul>
        <br>
        <ul>
        	<li><strong>Escolaridade:</strong> {{ $users->scholarity }}</li>
          <li><strong>Instituição:</strong> {{ $users->institution }}</li>
          <li><strong>Curso:</strong> {{ $users->course }}</li>
          <li><strong>Ocupação:</strong> {{ $users->occupation }}</li>
        </ul>
      </div>
      
      <div class="four columns">
      	<hgroup class="profile_block_title">
        	<h3><i class="follow"></i>Seguindo (12)</h3>
    			<a href="#" id="small" class="profile_block_link">Ver todos</a>
   	 		</hgroup>
        <!--   BOX - AMIGOS   -->
    		<div class="profile_box">
        
          <div>
            <a href="{{ URL::to("/") }}/users/3" class="friend_photo"><img title="Fernando Gobbo" src="{{ URL::to("/") }}/profile/b554beaa-1b5d-4d6f-b40d-b039fa9219e6_view.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Fernando Gobbo</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/5" class="friend_photo"><img title="João Francisco" src="{{ URL::to("/") }}/profile/128-2.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Ilka</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/6" class="friend_photo"><img title="Ruth Cuiá Troncarelli" src="{{ URL::to("/") }}/profile/c2982c9b-ed00-4185-9dc4-513aca4a55f4_view.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Ruth Cuiá Troncarelli</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/2" class="friend_photo"><img title="Fabiana" src="{{ URL::to("/") }}/profile/bb9c9f2f-6527-4cd3-a91d-d96115ecf5b0_view.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Fabiana</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/3" class="friend_photo"><img title="Straus" src="{{ URL::to("/") }}/profile/9f4ffc8a-c912-4d15-a021-bda37e3a08e9_view.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">straus</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/3" class="friend_photo"><img title="Fernanda" src="{{ URL::to("/") }}/profile/a2f7570f-b235-4622-8402-7f6cf00013c0_view.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Fernanda</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/9" class="friend_photo"><img title="Lívia Perez" src="{{ URL::to("/") }}/profile/5df3d2dd-b2fd-4791-bd5b-c0511d135117_view.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Lívia Perez</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/5" class="friend_photo"><img title="Eliana De Azevedo Marques" src="http://profile.ak.fbcdn.net/hprofile-ak-prn1/27337_100001010303440_2938_s_view.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Eliana De Azevedo Marques</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/3" class="friend_photo"><img title="Fernando Gobbo" src="{{ URL::to("/") }}/profile/b554beaa-1b5d-4d6f-b40d-b039fa9219e6_view.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Fernando Gobbo</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/5" class="friend_photo"><img title="Ilka" src="{{ URL::to("/") }}/profile/c6d5f0e2-d3fc-4ab8-843e-28a3877c7a4d_view.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Ilka</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/5" class="friend_photo"><img title="Raquel Silva" src="{{ URL::to("/") }}/profile/128-3.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Ruth Cuiá Troncarelli</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/7" class="friend_photo"><img title="Fabiana" src="{{ URL::to("/") }}/profile/bb9c9f2f-6527-4cd3-a91d-d96115ecf5b0_view.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Fabiana</span> --></a>
          </div>
          
          
				</div>
        
      </div>
      
      <div class="four columns">
      	<hgroup class="profile_block_title">
          <h3><i class="follow"></i>Seguidores (7)</h3>
          <a href="#" id="small" class="profile_block_link">Ver todos</a>
        </hgroup>
    		<!--   BOX - AMIGOS   -->
				<div class="profile_box">
          <!--   LINHA - FOTOS - AMIGOS   -->
          <!--   FOTO - AMIGO   -->
          
          <div>
            <a href="{{ URL::to("/") }}/users/5" class="friend_photo"><img title="Fabiana" src="{{ URL::to("/") }}/profile/bb9c9f2f-6527-4cd3-a91d-d96115ecf5b0_view.jpg" class="friend_photo" /><!--<span class="default_list_friend_f ">Fabiana</span> --></a>
          </div>
          <div>
            <a href="{{ URL::to("/") }}/users/3" class="friend_photo"><img  title="Ilka" src="{{ URL::to("/") }}/profile/c6d5f0e2-d3fc-4ab8-843e-28a3877c7a4d_view.jpg" class="friend_photo" /><!-- <span class="default_list_friend_f ">Ilka</span>  --></a>
        	</div>
        	<div>
            <a href="{{ URL::to("/") }}/users/6" class="friend_photo"><img  title="Ruth Cuiá Troncarelli" src="{{ URL::to("/") }}/profile/c2982c9b-ed00-4185-9dc4-513aca4a55f4_view.jpg" class="friend_photo" /><!-- <span class="default_list_friend_f ">Ruth Cuiá Troncarelli</span>  --></a>
        	</div>
        	<div>
            <a href="{{ URL::to("/") }}/users/9" class="friend_photo"><img  title="Gustavo Antonio de Oliveira" src="{{ URL::to("/") }}/profile/248e2469-af48-4caa-b235-3615e9650501_view.jpg" class="friend_photo" /><!-- <span class="default_list_friend_f ">Gustavo Antonio de Oliveira</span>  --></a>
        	</div>
          <div>
            <a href="{{ URL::to("/") }}/users/5" class="friend_photo"><img  title="Dolor Amet" src="{{ URL::to("/") }}/profile/128-1.jpg" class="friend_photo" /><!-- <span class="default_list_friend_f ">Ilka</span>  --></a>
        	</div>
        	<div>
            <a href="{{ URL::to("/") }}/users/3" class="friend_photo"><img  title="Fernando Gobbo" src="{{ URL::to("/") }}/profile/b554beaa-1b5d-4d6f-b40d-b039fa9219e6_view.jpg" class="friend_photo" /><!-- <span class="default_list_friend_f ">Fernando Gobbo</span>  --></a>
        	</div>
        	<div>
            <a href="{{ URL::to("/") }}/users/3" class="friend_photo"><img  title="Fernanda" src="{{ URL::to("/") }}/profile/a2f7570f-b235-4622-8402-7f6cf00013c0_view.jpg" class="friend_photo" /><!-- <span class="default_list_friend_f ">Fernanda</span>  --></a>
        	</div>
          <div>
            <a href="{{ URL::to("/") }}/users/5" class="friend_photo"><img  title="Lero Ipsum" src="{{ URL::to("/") }}/profile/128-2.jpg" class="friend_photo" /><!-- <span class="default_list_friend_f ">Ilka</span>  --></a>
        	</div>
        	<div>
            <a href="{{ URL::to("/") }}/users/6" class="friend_photo"><img  title="Ruth Cuiá Troncarelli" src="{{ URL::to("/") }}/profile/c2982c9b-ed00-4185-9dc4-513aca4a55f4_view.jpg" class="friend_photo" /><!-- <span class="default_list_friend_f ">Ruth Cuiá Troncarelli</span>  --></a>
        	</div>
		
	</div>
        
      </div>
      
      <div class="twelve columns albums">
      	<hgroup class="profile_block_title">
      		<h3><i class="photos"></i> Minhas galerias</h3>
        </hgroup>
        
        <p>No momento suas galerias não estão disponiveis, mas não se preocupe, estarão disponíveis em breve.</p>

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
        
      </div><!-- fim dos albuns -->
    
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
