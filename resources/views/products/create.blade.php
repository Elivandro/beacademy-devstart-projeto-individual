@extends("template.index")
@section("title", "Mostruario")

@section("content")
<main class="main margem-top">
<form action="" method="post" class="form" name="register">
            @csrf
            <div class="form-group-column">
                <h4 class="title-form">Cadastrar Produto</h4>
                <div class="form-group-row">
                    <div class="form-group">
                        <input type="text" name="name" id="nome" placeholder=" " required/>
                        <label for="nome">Nome</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="description" id="description" placeholder=" " required/>
                        <label for="description">Descrição</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="specie" id="email" placeholder=" " required/>
                        <label for="specie">Espécie</label>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-group">
                        <input type="text" name="district" id="district" placeholder=" " required/>
                        <label for="district">Bairro</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="zipcode" id="zipcode" placeholder=" " required/>
                        <label for="zipcode">CEP</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="city" id="city" placeholder=" " required/>
                        <label for="city">Cidade</label>
                    </div>
                </div>
                <div class="form-group-row">
                    <div class="form-group">
                        <input type="text" name="state" id="state" placeholder=" " required/>
                        <label for="state">Estado</label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="country" id="country" placeholder=" " required/>
                        <label for="country">País</label>
                    </div>
                    <div class="form-group">
                        <input type="date" name="birthday" id="birthday" placeholder=" " required/>
                        <label for="birthday">Nascimento</label>
                    </div>
                </div>
                <div class="form-group-btn">
                    <button type="submit" class="btn-empty">CADASTRAR</button>
                </div>
            </div>
        </form>

    <section>

    </section>
</main>
@endsection