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
      
      <div class="six columns">
      
        {{ Form::open(array('url' => 'users')) }}
          <div class="two columns alpha"><p>{{ Form::label('name', 'Nome*:') }}</p></div>
          <div class="four columns omega">
            <p>{{ Form::text('name') }} <br>
            {{ $errors->first('name') }}</p>
          </div>
          
          
          <div class="two columns alpha"><p>{{ Form::label('login', 'Login*:') }}</p></div>
          <div class="four columns omega">
            <p>{{ Form::text('login') }} <br>
            {{ $errors->first('login') }}</p>
          </div>
          
          <div class="two columns alpha"><p>{{ Form::label('email', 'E-mail*:') }}</p></div>
          <div class="four columns omega">
            <p>{{ Form::text('email') }}<br>
            {{ $errors->first('email') }}</p>
          </div>
          
          <div class="two columns alpha"><p>{{ Form::label('password', 'Senha*:') }}</p></div>
          <div class="four columns omega">
            <p>{{ Form::password('password') }}<br>
            {{ $errors->first('password') }}</p>
          </div>
          
          <div class="two columns alpha"><p>{{ Form::label('password_confirmation', 'Repita a senha*:') }}</p></div>
          <div class="four columns omega"><p>{{ Form::password('password_confirmation') }}</p></div>
          
          <div class="six columns alpha omega">
          
            <p>Li e aceito os <a href="/18/termsOfService" target="_blank" style="text-decoration: underline;">termos de compromisso</a>: {{ Form::checkbox('terms', 'read') }}</p>
            <p><a href="http://creativecommons.org/licenses/?lang=pt" id="creative_commons" style="text-decoration:underline;">Creative Commons</a></p>
            <p>{{ $errors->first('terms') }}</p>
          
      
            <p>{{ Form::submit("CADASTRAR") }}</p>
          
          </div>
          
        {{ Form::close() }}
        
      </div>
      
    </div>
    
  </div>
    
@stop