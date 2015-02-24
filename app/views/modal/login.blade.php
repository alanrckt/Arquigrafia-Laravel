@extends('layouts.default')

@section('content')

  <div class="container">

    <div class="registration">
    
    	<!-- LOGIN SIMPLES -->
      <div class="three columns">
    
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
          	<p class="error">{{ Session::get('login.message') }}</p>
          @endif
          
          <br>
          <p>{{ Form::submit("LOGIN",array('class'=>'btn right')) }}</p>
          
        {{ Form::close() }}
        
        <p>&nbsp;</p>
      
      </div>
      
      
      <!-- FACEBOOK -->
      <div class="three columns offset-by-one">
      
        <h1>Login com Facebook</h1>
        <p>Utilize o Facebook para criar uma conta ou entrar no Arquigrafia, caso você já tenha criado:</p>
        {{ link_to( $fburl , 'FACEBOOK - LOGIN', array('class'=>'btn right')) }}
      
      </div>
      
    </div>
    
  </div>
    
@stop