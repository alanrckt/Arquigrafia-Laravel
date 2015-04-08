<div id="panel" class="stripe">

	@foreach($photos as $photo)

		<div class="item h2">
			<div class="layer" data-depth="0.2">
				<a href='{{ URL::to("/photos/{$photo->id}") }}'>
					<img src='{{ URL::to("/arquigrafia-images/{$photo->id}_200h.jpg") }}' title="{{ $photo->name }}">
				</a>
				<div class="item-title">
					<p>{{ $photo->name }}</p>
					@if (Auth::check() && Auth::id() == $photo->user_id)
						<a id="title_delete_button" class="title_delete photo" href="{{ URL::to('/photos/' . $photo->id) }}" title="Excluir imagem"></a>
						<a id="title_edit_button" href="{{ URL::to('/photos/' . $photo->id . '/edit')}}" title="Editar imagem"></a>
					@endif
				</div>
			</div>

		</div>

	@endforeach

</div>
<div class="panel-back"></div>
<div class="panel-next"></div>