<!DOCTYPE html >
<html lang="">
<head>
    <title> Purchase Details </title>
</head>
<body>
<h1>{{ $details['title'] }}</h1>
<p>{{ $details['body'] }}</p>

<h3>Purchased Products:</h3>
<ul>
    @foreach ($details['products'] as $product)
        <li>
            Name: {{ $product->name }},
            Price: {{ $product->price }},
            Quantity: {{ $product->quantity }}
            <!-- Add more product fields as required -->
        </li>
    @endforeach
</ul>

<p>Thank you</p>
</body>
</html>
