@extends('layouts.default')

@section('content')

  <div class="container">

    <div id="registration">
    
      <div class="three columns">
    
        <h1>Login</h1>
        
        {{ Form::open() }}
          
          <p>{{ Form::label('login', 'Login:') }} {{ Form::text('login', '', array('class'=>'right') ) }}</p>
          {{ $errors->first('login') }}
          
          <p>{{ Form::label('password', 'Senha:') }} {{ Form::password('password', array('class'=>'right') ) }}</p>
          {{ $errors->first('password') }}
          
          <br>
          <p>{{ Form::submit("LOGIN",array('class'=>'btn right')) }}</p>
          
        {{ Form::close() }}
        
        <p>&nbsp;</p>
      
      </div>
      
    </div>
    
  </div>
    
@stop