<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Product List</h1>
        <div>
            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        </div>
        <div>
            <div>
                <a href="{{ route('product.create') }}" class="btn btn-primary">Create a Product</a>
                
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('product.edit', ['product' => $product->id]) }}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                        <form method="post" action="{{ route('product.destroy', ['product' => $product->id]) }}">
                             @csrf
                             @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

