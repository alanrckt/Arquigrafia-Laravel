@extends('layouts.default')

@section('content')

  <div class="container">

    <div id="registration">
    
      <h1>Login</h1>
      
      {{ Form::open() }}
        
        <p>{{ Form::label('login', 'Login:') }}</p>
        <p>{{ Form::text('login') }}</p>
        {{ $errors->first('login') }}
        
        <p>{{ Form::label('password', 'Senha:') }}</p>
        <p>{{ Form::password('password') }}</p>
        {{ $errors->first('password') }}
    
        <p>{{ Form::submit("LOGIN") }}</p>
        
      {{ Form::close() }}
      
    </div>
    
  </div>
    
@stop