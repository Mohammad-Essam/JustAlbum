<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>
    <script defer>
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );
    </script>
<link rel="stylesheet" href="/css/index.css">
</head>
<body>

    <x-modal />

    <div class="add-album">
        <form method="POST" action="/albums">
            <label for="Name">Name:</label>
            <input type="text" name="name" required>
            <input class="control" type="submit" style="margin-left: auto" value="Add New Album">
            @csrf
        </form>
    </div>

    <x-albums_table :albums="$albums" />

</body>
</html>
