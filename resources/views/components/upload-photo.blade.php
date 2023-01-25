@props([
    'album' => null,
    'style'=>"",
    'text' =>'Add Photo'
])


<style>
    #photo-upload-form
    {
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        width:100%;
        gap: 8px;
    }
</style>


{{-- <div>
    <form style="background-color: red;position: relative;display:inline-block; width:fit-content" id="photo-upload-form" action="/albums/{{ $album->id }}/photos" method="post" enctype="multipart/form-data">
        hey what
        <input style="opacity:1;background-color: cyan;width:100%;height:100%" type="file" name="photo"  id="" value="insert photo" onchange="this.parentNode.submit()">
        <div style ="{{ $style }};position:absolute;top:0;z-index:-1;">{{ $text }} was sjf sf skj flks jd fsjl fkdjs fkd </div>
        @csrf

    </form>
</div> --}}

<form id="photo-upload-form" {{ $album? "action=/albums/$album->id/photos":'action=photos' }} method="post" enctype="multipart/form-data">
    {{-- <div style="border:1px solid black;width:fit-content;cursor:pointer{{ $style }}" class="uploadBtn" onclick="this.querySelector('#uploadInput').click()">
        <input style="display: none;" type="file" name="photo"  id="uploadInput" value="insert photo" onchange="this.parentNode.parentNode.submit()">
        {{ $text }}
    </div> --}}
        <input class="uploadBtn" style="background-color: transparent" type="file" name="photo"  id="uploadInput">
        <div style="display: flex">
            <input type="text" name="name" placeholder="photo name" required>
            <input class="uploadBtn" type="submit" value="upload">
        </div>
    @csrf
</form>
