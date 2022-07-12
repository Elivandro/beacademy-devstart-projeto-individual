@extends("template.index")
@section("title", "Entrar em contato")

@section("content")
<main class="main">
    <section class="max-container">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                @foreach($errors->all() as $error)
                    {{ $error }}
                    <br/>
                @endforeach
            </div>
        @endif
        @if(isset($message))
            <div class="card-success">
                {{ $message }}
            </div>
        @endif
        <form action="{{ route('users.store') }}" method="post" class="form" name="register">
            @csrf
            <div class="form-group-column">
                <h4 class="title-form">Entre em contato</h4>
                <div class="form-group-row">
                    <div class="form-group">
                        <input type="text" name="name" id="nome" placeholder=" " required/>
                        <label for="nome">Nome Completo</label>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" id="phone" placeholder=" " required/>
                        <label for="telefone">Telefone</label>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder=" " required/>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-group">
                        <textarea name="text" id="textarea" placeholder=" " required></textarea>
                        <label for="textarea">Endereço</label>
                    </div>
                </div>
                <div class="form-group-btn">
                    <button type="submit" class="btn-empty">Enviar mensagem</button>
                </div>
            </div>
        </form>
    </section>
</main>
@endsection