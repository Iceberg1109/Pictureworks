<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background: linear-gradient(60deg, rgba(255, 165, 150, 0.5) 5%, rgba(0, 228, 255, 0.35));
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 400;
                height: 100%;
                margin: 0;
            }

            div.container {
                padding: 20px;
                width: 30%;
                height: 80%;
                background-color: white;
                position: absolute;
                top: 80px;
                left: 35%;
                box-shadow: 5px 5px 8px #666;
            }
            
            .label {
                font-size: 20px;
                min-width: 130px;
                font-weight: bold;
                float: left;
            }

            .value {
                font-size: 23px;
                font-weight: bold;
                float: left;
            }

            li {
                font-size: 23px;
            }

            a:link, a:visited {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                position: absolute;
                top: 20px;
                left: 35%;
                width: 30%;
                text-align: center;
                font-size: 20px;
            }

            a:hover, a:active {
                background-color: #45a049;
            }
        </style>
    </head>
    <body>
        <a href="/">To the form</a>
        <div class="container">
            @if ($found == true)
                <div style="overflow: auto;margin-top: 20px;">
                    <div class="label">User ID : </div>
                    <div class="value">{{$id}}</div>
                </div>
                <div style="overflow: auto;margin-top: 20px;">
                    <div class="label">Password : </div>
                    <div class="value">{{$password}}</div>
                </div>
                <div style="overflow: auto;margin-top: 20px;">
                    <div class="label">Comment : </div>
                    
                    <ul style="float: left;margin-top: 0px;" >
                        @foreach($comment as $data)
                            <li style="margin-left: -17px;">{{ $data }}</li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div style="font-weight: bold;font-size: 30px;text-align: center;">User not found</div>
            @endif
        </div>
    </body>
</html>
