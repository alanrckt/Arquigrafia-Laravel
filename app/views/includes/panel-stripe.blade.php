<div id="panel" class="stripe">

	@foreach($photos as $photo)

		<div class="item h2">
			<div class="layer" data-depth="0.2">
				<a href='{{ URL::to("/photos/{$photo->id}") }}'>
					<img src='{{ URL::to("/arquigrafia-images/{$photo->id}_200h.jpg") }}' title="{{ $photo->name }}">
				</a>
				<div class="item-title">{{ $photo->name }}</div>
			</div>

		</div>

	@endforeach

</div>
<div class="panel-back"></div>
<div class="panel-next"></div>