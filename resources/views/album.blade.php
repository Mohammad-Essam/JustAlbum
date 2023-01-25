<link rel="stylesheet" href="/css/photos.css">
<div class="whole-album">
    <h2>{{ $album->name }}</h2>
    <x-upload-photo  />
    <div class="photos-container">
        @foreach ($album->photos as $photo)
        <x-photo :photo="$photo" />
        @endforeach
    </div>
</div>
