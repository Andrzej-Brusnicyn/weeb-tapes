<div>
<!DOCTYPE html>
<html>
<head>
    <title>All Tapes</title>
</head>
<body>
    <h1>All Tapes</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Artist</th>
                <th>Description</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tapes as $tape)
            <tr>
                <td>{{ $tape->id }}</td>
                <td>{{ $tape->title }}</td>
                <td>{{ $tape->artist }}</td>
                <td>{{ $tape->description }}</td>
                <td>{{ $tape->price }}</td>
                <td>{{ $tape->stock }}</td>
                <td>{{ $tape->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
</div>
