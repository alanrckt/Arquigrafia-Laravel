@foreach($photos as $photo)
  <div class="item h1"><div class="layer" data-depth="0.2">
      <a href="{{ URL::to('/arquigrafia-images/' . $photo->id) }}">
        <img src="{{ URL::to('/arquigrafia-images/' . $photo->id . '_view.jpg') }}" 
        width="600" height="405" title="{{ $photo->name }}">
      </a>
  </div></div>
@endforeach