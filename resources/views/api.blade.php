<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
           
            $('#testapi').on('submit', function(event){
                event.preventDefault(event);
                $.ajax({
                    url : 'http://localhost/migrate/public/api/auth/login',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(data){
                        console.log(data);
                   }
                });
            })
        });
    </script>
</head>

<body>
    <form id="testapi" action="" method="post">
        <div>
            <label for="">Email</label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <input type="submit" value="SUbmit">
    </form>

</body>

</html>