<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Katalog Anto Aquarium & Art</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .container {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-bottom: 32px;
        }

        .row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1, h3, h4, h5, h6, p {
            margin: 0;
        }

        hr {
            margin-top: 12px;
            margin-bottom: 12px;
        }

        .grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr); /* ✅ GANTI JADI 3 */
    gap: 16px;
}

        .card {
            display: flex;
            flex-direction: column;
            gap: 8px;
            border: 1px solid #6B7280; /* gray-500 */
            border-radius: 4px;
            padding: 8px;
        }

        .card img {
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: center;
        }

        .card-content {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .btn {
            background-color: #3B82F6; /* blue-500 */
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 8px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <h3>Katalog</h3>
            <h5>Cemangga kidul, RT.04/RW.04, Branjang Tengah, Branjang, Kec. Ungaran Bar., Kabupaten Semarang, Jawa Tengah 50519</h5>
        </div>

        <div class="row">
            <h1>Anto Aquarium & Art</h1>
            <h4>087860368474</h4>
        </div>

        <hr>
    </div>

    <table style="width: 100%; border-collapse: separate;" cellspacing="16">

    @foreach ($products->chunk(3) as $row)
        <tr>
            @foreach ($row as $product)
                @php
                    $image = storage_url($product->image);
                    $price = 'Rp. ' . number_format($product->retail_price, 0, ',', '.');
                @endphp
                <td style="vertical-align: top; padding: 16px; border: 1px solid #6B7280; width: 33%;">
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        <img src="{{ $image }}" alt="{{ $product->name }}" style="width: 100%; height: auto; object-fit: cover; object-position: center;">

                        <div>
                            <h6 style="margin: 0 0 4px 0;">{{ $product->name }}</h6>
                            <p style="margin: 0 0 8px 0;">{{ $price }}</p>
                        </div>
                    </div>
                </td>
            @endforeach

            {{-- Isi kolom kosong jika tidak sampai 3 --}}
            @for ($i = $row->count(); $i < 3; $i++)
                <td style="padding: 16px; width: 33%;"></td>
            @endfor
        </tr>
    @endforeach
</table>


</body>
</html>
