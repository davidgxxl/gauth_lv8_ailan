<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$asunto}}</title>
</head>
<body>
    <table style="with: 100%; max-width: 800px; margin: 0px auto;">
        <tr>
            <td style="text-align: center; padding: 12.5px;">
                <a href="{{route('inicio')}}">
                    <img
                        src="https://www.solucionex.com/sites/default/files/posts/imagen/laravel-8-jetstream.png"
                        style="width: 100%; max-width: 250px;"
                    >
                </a>
            </td>
        </tr>
        <tr>
            <td style="text-align: center; padding: 12.5px;">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima facere pariatur fugiat vero laboriosam iusto sed nisi. Ipsa cupiditate inventore qui explicabo possimus, impedit dolorum architecto amet! Ratione, quod nihil?
                <br><br>
                <h3>{{$codigo_verificacion}}</h3>
            </td>
        </tr>
    </table>
</body>
</html>