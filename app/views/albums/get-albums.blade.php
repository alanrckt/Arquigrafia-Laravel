	<?php $album_counter = 0; $total_album = $albums->count() ?>
	{{ Form::open(array('url' => URL::to('/albums/photo/add'))) }}
		{{ Form::hidden('_photo', $photo_id) }}
		<div id="albums_list" class="list">
				<h2> Seus Álbuns </h2>
				<p class="row"> Selecione os álbuns em que a imagem será inserida</p>
				<table class="form-table" width="100%" border="0" cellspacing="0" cellpadding="0">
					@foreach($albums as $album)
						@if ($album_counter % 3 == 0)
							<tr>
						@endif
						<td width="33%">
							<input type="checkbox"  id="{{ 'album_' . $album->id }}" 
								name="albums[]" value="{{ $album->id }}">
							 <label for="{{ 'album_' . $album->id }}"></label>
							<p>{{ $album->title }}</p>
						</td>
						@if($album_counter %3 == 2)
							</tr>
						@endif
						<?php $album_counter++ ?>
					@endforeach
					
					@if($album_counter %3 > 0)
						@while($album_counter %3 > 0)
							<td width="33%"></td>
							<?php $album_counter++; ?>
						@endwhile
						</tr>
					@endif
				</table>
		</div>
		<p>{{ Form::submit("ADICIONAR AOS ÁLBUNS", array('class'=>'btn')) }}</p>
	{{ Form::close() }}

	<style>
		@foreach($albums as $album)
			{{ '#album_' . $album->id . ' + label' }}
			{
				@if ($album->cover_id != null)
					background: url('{{"/arquigrafia-images/" . $album->cover_id . "_home.jpg" }}');
				@else
					background: url('{{"/img/registration_no_cover.png" }}');
				@endif
			}
		@endforeach
	</style>

