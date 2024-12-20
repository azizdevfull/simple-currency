<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency App</title>
</head>

<body>
    <h1>Products</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price (USD)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Convert Price</h2>
    <form action="/convert" method="POST">
        @csrf
        <input type="number" name="price" placeholder="Enter price" required>
        <select name="currency">
            @foreach($currencies as $currency)
                <option value="{{ $currency->code }}">{{ $currency->code }}</option>
            @endforeach
        </select>
        <button type="submit">Convert</button>
    </form>
</body>

</html>