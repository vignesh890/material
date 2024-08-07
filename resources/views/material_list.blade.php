<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material List</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Material List</h1>
        <button id="addButton" class="btn"><a class="btn" href="/add_material">Add Material</a></button>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Material Name</th>
                    <th>Category</th>
                    <th>price</th>
                    <th>Discount_type</th>
                    <th>Discount</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="personTableBody">
            @foreach($lists as $list)
                    <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td>{{$list->category}}</td>
                    <td>{{$list->price}}</td>
                    <td>{{$list->discount_type}}</td>
                    <td>{{$list->discount}}</td>
                    <td>
                        <button class="btn edit"><a class="btn edit" href="{{ url('/material_edit/' . $list->id) }}">Edit</a></button>
                        <button class="btn delete"><a onclick="return confirm('are you sure to delete?');" class="btn delete" href="{{ url('/material_delete/' . $list->id) }}">Delete</a></button>
                    </td>
                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>
</html>
