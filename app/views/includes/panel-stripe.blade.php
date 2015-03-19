			<div id="panel" class="stripe">
		
				<?php $i = rand(0,10);?>
		
				@foreach($photos as $photo)
		
					<?php
						$i++;
						$size = 1; 
						/*if ($i%5 == 3) $size = 2;
						if ($i%10 == 8) $size = 3;*/
						if ($i%7 == 6) $size = 2;
						if ($i%21 == 6) $size = 3;
					?>

					<!-- <div class="item h<?php echo $size; ?>"> -->
					<div class="item h2">
						<div class="layer" data-depth="0.2">
							<a href='{{ URL::to("/photos/{$photo->id}") }}'>
								<img src='{{ URL::to("/arquigrafia-images/{$photo->id}_view.jpg") }}' title="{{ $photo->name }}">
							</a>
							<div class="item-title">{{ $photo->name }}</div>
						</div>

					</div>

				@endforeach
		
			</div>
			<div class="panel-back"></div>
			<div class="panel-next"></div>