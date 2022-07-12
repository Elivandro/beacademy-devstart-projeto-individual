<!DOCTYPE html>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="../assets/css/form.css"/>
    <link rel="stylesheet" href="../assets/css/style.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/inputmask.bundle.js"></script>
</head>
<body>
    <header class="header">
        <figure>
            <img src="../assets/img/banner-top.png"/>
        </figure>
        <div class="max-container container">
            <nav class="nav-menu">
                <ul>
                    <li><a href="{{ route('users.login') }}">Conta</a></li>
                    <li><a href="{{ route('index.contact') }}">Contato</a></li>
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
<script src="../assets/js/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>