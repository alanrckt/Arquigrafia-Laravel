<?php $i = rand(0,10);?>

@foreach($photos as $photo)

<?php
  $i++;
  $size = 1; 
  if ($i%7 == 6) $size = 2;
  if ($i%21 == 6) $size = 3;
?>

<div class="item h<?php echo $size; ?>">
	<div class="layer" data-depth="0.2">
    <a href='{{ URL::to("/photos/{$photo->id}") }}'>
     <?php if ($size==1) $path = '/arquigrafia-images/'. $photo->id . '_home.jpg'; 
     else $path = '/arquigrafia-images/'. $photo->id . '_view.jpg';?>
     <img src="{{ asset( $path ) }}" title="{{ $photo->name }}">
    </a>
    <div class="item-title">{{ $photo->name }}</div>
	</div>
</div>

@endforeach
