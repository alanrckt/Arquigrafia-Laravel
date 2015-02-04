@extends('layouts.default')

@section('content')

  <div class="container">

    <div id="registration">
    
      <h1>Cadastro</h1>
      <p>Faça seu cadastro para poder compartilhar imagens no Arquigrafia.<br>
      <small>* Todos os campos a seguir são obrigatórios.</small>
      </p>
      
      <?php 
      /*
      foreach ($errors->all('<p>:message</p>') as $message) {
        echo $message;
      }
      */
      ?>
      
      {{ Form::open(array('url' => 'users')) }}
        <p>{{ Form::label('name', 'Nome*:') }}</p>
        <p>{{ Form::text('name') }}</p>
        {{ $errors->first('name') }}
        
        <p>{{ Form::label('login', 'Login*:') }}</p>
        <p>{{ Form::text('login') }}</p>
        {{ $errors->first('login') }}
        
        <p>{{ Form::label('email', 'E-mail*:') }}</p>
        <p>{{ Form::text('email') }}</p>
        {{ $errors->first('email') }}
        
        <p>{{ Form::label('password', 'Senha*:') }}</p>
        <p>{{ Form::text('password') }}</p>
        {{ $errors->first('password') }}
        
        <p>{{ Form::label('password_confirmation', 'Repita a senha*:') }}</p>
        <p>{{ Form::text('password_confirmation') }}</p>
        
        <p>Li e aceito os <a href="/18/termsOfService" target="_blank" style="text-decoration: underline;">termos de compromisso</a>: 
        {{ Form::checkbox('terms', 'read') }} <br> <br><a href="http://creativecommons.org/licenses/?lang=pt" id="creative_commons" style="text-decoration:underline;">Creative Commons</a></p>
    
        <p>{{ Form::submit("CADASTRAR") }}</p>
        
      {{ Form::close() }}
      
    </div>
    
  </div>
    
@stop