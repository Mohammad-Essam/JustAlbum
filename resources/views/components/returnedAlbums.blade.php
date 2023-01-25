<div id="movePanel">
    <h3>select the album that will have the deleted album's content</h3>
    <table id="table_move" class="display">
    <thead>
        <tr>
            <th>name</th>
            <th>photos</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach (\App\Models\Album::all()->except($id) as $album)
        <tr>
            <td>{{ $album->name }}</td>
            <td>{{ $album->photos_count }}</td>
            <td style="display: flex;justify-content: center;gap:8px">
                <form method="POST" action="/albums/{{ $id }}/{{ $album->id }}/move-then-delete">
                    <button class="control">Move to this</button>
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<button onclick="modalClose();switchToSurePanel()" class="control">Cancel</button>
</div>
