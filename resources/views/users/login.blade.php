@extends("template.index")
@section("title", "fazer login")

@section("content")
<main class="main">
    <section class="max-container">
        @if(session('danger'))
            <div class="card-success" role="alert">
                {{ session('danger') }}
            </div>
        @endif
        <form action="{{ route('login.index') }}" method="post" class="form" name="signIn">
            @csrf
            <div class="form-group">
                <h4 class="title-form">Acessar conta</h4>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder=" " required autocomplete="off"/>
                    <label for="email">Email</label>
                </div>
                <div class="form-group">
                        <input type="password" name="password" id="password" placeholder=" " class="form-control" required autocomplete="off"/>
                        <label for="password">password</label>
                        <div class="input-group-append">
                            <span class="input-group-text">
                                <a href="#" class="togglePassword">
                                    <i class="fas fa-eye-slash" aria-hidden="true"></i>
                                </a>
                            </span>
                        </div>
                </div>
                <div class="form-group">
                    <a href="#" class="link-forget">Esqueci minha senha</a>
                </div>
                <div class="form-group-btn">
                    <button type="submit" class="btn-empty">LOGAR</button>
                    <a href="{{ route('users.create') }}" class="btn-empty">CADASTRAR</a>
                </div>
            </div>
        </form>
    </section>
</main>
@endsection