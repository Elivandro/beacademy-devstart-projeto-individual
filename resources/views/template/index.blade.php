<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="{{ asset('/assets/css/form.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}"/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
    <header class="header">
        <figure>
            <img src="{{ asset('assets/img/banner-top.png') }}"/>
        </figure>
        <div class="max-container container">
            <nav class="nav-menu">
                <ul>
                    <li><a href="{{ route('users.login') }}">Conta</a></li>
                    @if(Auth::User())
                    <li class="nav-item p-2"><a href="{{ route('logout.index') }}" class="btn btn-outline-dark">Logout</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </header>

    @yield("content")

    <footer class="footer">
        <div class="max-container">
            <h4>Paylivre & beAcademy - DevStart! &copy;</h4>
        </div>
    </footer>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
</html>