<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Styles -->
        <style>
            html, body {
                background: linear-gradient(60deg, rgba(255, 165, 150, 0.5) 5%, rgba(0, 228, 255, 0.35));
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

            input[type=submit], button {
                width: 100%;
                background-color: #4CAF50;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            input[type=submit]:hover, button {
                background-color: #45a049;
            }

            div {
                border-radius: 5px;
                background-color: #f2f2f2;
                padding: 20px;
                width: 40%;
                position: absolute;
                top: 150px;
                left: 30%;
                box-shadow: 5px 5px 8px #666;
            }
        </style>
    </head>
    <body>
        <div>
            <form action="api/addComment/" method="post">
                @csrf
                <label for="id">User ID</label>
                <input type="text" name="id" placeholder="User ID...">
                
                <label for="password">Password</label>
                <input type="text" name="password" placeholder="User password...">

                <label for="comment">Comment</label>
                <input type="text" name="comment" placeholder="Comment...">

                <input type="submit">

            </form>
            <button>View Detail</button>

        </div>
    </body>
    <script type="text/javascript">
        $(document).on('submit', 'form', function(e){
            e.preventDefault(); //1

            var $this = $(this); //alias form reference
            
            $.ajax({ //2
                url: $this.prop('action'),
                method: 'post',
                dataType: 'json',  //3
                data: $this.serialize(), //4
                success: function (response) {
                    console.log(response.result);
                    if (response.result == "success")
                        alert("Success!");
                    else
                        alert("No user found!")
                },
                error: function(e) {
                    console.log(e);
                }
            });
        });
        $('button').click(function() {
            console.log("aaa", $('input[name=id]').val());

            if ($('input[name=id]').val() != "")
                location.href = "/user/" + $('input[name=id]').val();
            else
                alert("Enter the id");
        });
    </script>
</html>
