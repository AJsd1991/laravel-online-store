@inject('cost', 'App\Service\Cost\Contracts\CostInterface')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title></title>
    </head>
    <style>
table {
    border-collapse: collapse;
    border-spacing: 0;
    width: 100%;
    border: 1px solid #ddd;
}

th, td {
    text-align: left;
    padding: 8px;
}
body {
    font-family:  sans-serif;
}

span {
    font-size: 17px;
}

tr:nth-child(even){background-color: #f2f2f2}
    </style>
    <body>

        <div>
            <p>Order ID : <span>{{ $order->id }}</span></p>
            <p>Ship to : <span>{{ auth()->user()->address }}</span></p>
        </div>
        <div style="overflow-x:auto;">
            <table>
                <tr>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>

                </tr>
                @foreach($order->products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>${{$product->showPrice()}}</td>
                    <td>{{$product->pivot->quantity}}</td>
                    <td>${{number_format($product->price * $product->pivot->quantity, 2)}}</td>
                </tr>
                @endforeach
                @foreach($cost->getSummary() as $description => $price)
                <tr>
                    <td>{{$description}}</td>
                    <td>${{number_format($price, 2)}}</td>
                </tr>
                @endforeach
                <tr>
                    <td>Total</td>
                    <td>${{number_format($cost->getTotalCosts(), 2)}}</td>
                </tr>
            </table>
        </div>
    </body>
</html>
