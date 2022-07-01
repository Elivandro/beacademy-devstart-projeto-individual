@extends("layout.layout")
@section("title", "Página de cadastro")

@section("content")
<main class="main">
    <section class="max-container">
        <form action="/users" method="post" class="form" name="register">
            @csrf
            <div class="form-group">
                <h4 class="title-form">Criar conta</h4>
                <div class="form-group">
                    <input type="text" name="name" id="nome" placeholder=" " required autocomplete="off"/>
                    <label for="nome">Nome Completo</label>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" id="phone" placeholder=" " pattern="\([0-9]{2}\)[0-9]{1}-[0-9]{4}-[0-9]{4}" required autocomplete="off"/>
                    <label for="telefone">Telefone</label>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder=" " required autocomplete="off"/>
                    <label for="email">Email</label>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder=" " required autocomplete="off"/>
                    <label for="password">password</label>
                </div>
                <div class="form-group">
                    <input type="number" name="cpf" id="cpf" placeholder=" " required autocomplete="off"/>
                    <label for="cpf">CPF</label>
                </div>
                <div class="form-group">
                    <input type="text" name="address" id="address" placeholder=" " required autocomplete="off"/>
                    <label for="address">Endereço</label>
                </div>
                <div class="form-group">
                    <input type="text" name="district" id="district" placeholder=" " required autocomplete="off"/>
                    <label for="district">Bairro</label>
                </div>
                <div class="form-group">
                    <input type="text" name="city" id="city" placeholder=" " required autocomplete="off"/>
                    <label for="city">Cidade</label>
                </div>
                <div class="form-group">
                    <input type="text" name="state" id="state" placeholder=" " required autocomplete="off"/>
                    <label for="state">Estado</label>
                </div>
                <div class="form-group">
                    <input type="text" name="country" id="country" placeholder=" " required autocomplete="off"/>
                    <label for="country">País</label>
                </div>
                <div class="form-group">
                    <input type="date" name="birthday" id="birthday" placeholder=" " required autocomplete="off"/>
                    <label for="birthday">Nascimento</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-empty">CADASTRAR</button>
                    <a href="/users/login" class="btn-empty">ENTRAR</a>
                </div>
            </div>
        </form>
    </section>
</main>
@endsection