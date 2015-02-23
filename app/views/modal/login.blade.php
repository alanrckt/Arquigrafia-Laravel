@extends('layouts.default')

@section('content')

  <div class="container">

    <div id="registration">
    
    	<!-- LOGIN SIMPLES -->
      <div class="three columns">
    
        <h1>Login</h1>
        
        {{ Form::open() }}
          
          <p>{{ Form::label('login', 'Login:') }} {{ Form::text('login', '', array('class'=>'right') ) }}</p>
          {{ $errors->first('login') }}
          
          <p>{{ Form::label('password', 'Senha:') }} {{ Form::password('password', array('class'=>'right') ) }}</p>
          
          @if(Session::has('login.message'))
          	<p>{{ Session::get('login.message') }}</p>
          @endif
          
          <br>
          <p>{{ Form::submit("LOGIN",array('class'=>'btn right')) }}</p>
          
        {{ Form::close() }}
        
        <p>&nbsp;</p>
      
      </div>
      
      
      <!-- FACEBOOK -->
      <div class="three columns offset-by-three">
      
        <h1>Login com Facebook</h1>
        <p>Utilize o Facebook para criar uma conta ou entrar no Arquigrafia, caso você já tenha criado:</p>
        {{ link_to( $fburl , 'FACEBOOK - LOGIN', array('class'=>'btn right')) }}
      
      </div>
      
    </div>
    
  </div>
    
@stop