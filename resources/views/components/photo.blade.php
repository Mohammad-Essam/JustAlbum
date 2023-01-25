<div class="image">
    <a target="_blank" href="/{{ $photo->path }}"><img src="/{{ $photo->path }}" alt="" srcset=""></a>
    <form method="POST" action="{{ $photo->id }}/delete">
        <p style="margin-top: auto">{{ $photo->name }}</p>
        <input type="submit" value="Delete">
        @csrf
    </form>
</div>
