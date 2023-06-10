<!DOCTYPE html>
<html lang="en">

<head>
    <title>qr code start {{ $data->name }}</title>

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://fonts.cdnfonts.com/css/conthrax" rel="stylesheet">
    <style>
        @page {
            margin: 0px 0px 0px;
        }

        body {
            font-family: calibri !important;
            background: url("{{ asset('assets/media/bg/bg-station.jpg') }}");
            background-size: cover;
        }

        table,
        td,
        th {
            border: 0.2px solid black;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        img {
            display: block;
            margin-top: 35%;
        }

        #start_location {
            text-align: center;
            color: #78d230;
            text-transform: uppercase;
            font-size: 30px;
            margin-bottom: 0px;
            margin-top: 30px;
            font-family: 'Conthrax' !important;
        }

        #scan {
            color: #283a49;
            text-align: center;
            font-family: 'Poppins' !important;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div style="text-align: center;margin-top:auto">
        <img src="data:image/svg;base64,{!! base64_encode(
            QrCode::format('svg')->size(310)->generate($data->qr_code),
        ) !!}">
    </div>
    <p id="start_location">START {{ $data->name }}</p>
    <p id="scan">SCAN UNTUK MULAI</p>

</body>

</html>
