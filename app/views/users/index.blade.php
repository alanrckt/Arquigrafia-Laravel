@extends('layouts.default')

@section('head')

<title>Arquigrafia - Usuários</title>

@stop

@section('content')

    <h1>Todos Users</h1>
    
    <ul>
    
    @foreach($users as $user)
    	<li><?php echo link_to("/users/".$user->id, $user->name) ?></li>
    @endforeach
    
    </ul>
@stop