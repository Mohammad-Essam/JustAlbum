@props(
    ['albums']
)

    <table id="table_id" class="display">
        <thead>
            <tr>
                <th>Album name</th>
                <th>Number of photos</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($albums as $album)
            <tr>
                <td>{{ $album->name }}</td>
                <td>{{ $album->photos_count }}</td>
                <td style="display: flex;justify-content: center;gap:8px">
                    <a class="control" href="/albums/{{ $album->id }}/photos" target="_blank">Open</a>
                    @if ($album->photos_count > 0)
                    <button onclick="openDialog({{ $album->id }})" class="control">Delete</button>
                    @else
                    <form method="POST" action="/albums/delete">
                        @csrf
                        <input type="hidden" id="albumToDelete" name="album_id" value={{ $album->id }}>
                        <input class="control" type="submit" value="Delete">
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
