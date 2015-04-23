@extends('layouts.default')

@section('content')

  <div class="container">

    <div class="registration">
    
    	<!-- LOGIN SIMPLES -->
      <div class="three columns offset-by-four">
    
        <h1>Login</h1>
        
        {{ Form::open() }}
          
          <p>Entre com seu usuário e senha:</p>
          <br>
          <div class="one columns alpha">{{ Form::label('login', 'Usuário:', array('class'=>'right')) }}</div>
          <div class="two columns omega">{{ Form::text('login', '', array('class'=>'right') ) }}</div>
          {{ $errors->first('login') }}
          
          <div class="one columns alpha">{{ Form::label('password', 'Senha:', array('class'=>'right')) }}</div>
          <div class="two columns omega">{{ Form::password('password', array('class'=>'right') ) }}</div>
          
          @if(Session::has('login.message'))
          	<p class="error">{{ Session::pull('login.message') }}</p>
          @endif
          
          <br>
          <p>{{ Form::submit("LOGIN",array('class'=>'btn right')) }}</p>
          
        {{ Form::close() }}
        
        <p>&nbsp;</p>
       
        <a href="{{ $fburl }}">
          <div class="login_externo logo">
            <img id="facebook_login" src="{{ asset('/img/Facebook_logo_square.png') }}">
          </div>
          <div class="login_externo label">
            <p> Login com Facebook </p>
          </div>
        </a>
      <!--   <a id="stoaLogin" href="/stoaLogin" >
          <div class="login_externo logo down">
            <img src="{{ asset('/img/Logo-stoa.png') }}" width="75">
          </div>
          <div class="login_externo label down">
            <p> Login com Stoa </p>
          </div>
        </a>  -->    
      
      </div>      
      
    </div>
    
  </div>
 <!--  
 <div id="mask"></div>
  <div id="form_window">
    <a class="close" href="#" title="FECHAR">Fechar</a>
    <div id="registrationStoa">
      <img src="{{ asset('/img/Logo-stoa.png') }}">
      <div class="login_popup">
        {{ Form::open() }}

            {{ Form::label('login', 'Número USP:') }}
            {{ Form::text('login', '') }}
            {{ $errors->first('login') }}
            
            {{ Form::label('password', 'Senha:') }}
            {{ Form::password('password') }}
            
            @if(Session::has('login.message'))
              <p class="error">{{ Session::pull('login.message') }}</p>
            @endif
            
            <br>
            <p>{{ Form::submit("LOGIN",array('class'=>'btn')) }}</p>
            
        {{ Form::close() }}   
      </div>      
    </div>
  </div> -->
  <script type="text/javascript" src="{{ URL::to("/") }}/js/jquery-1.7.1.min.js"></script>
@stop