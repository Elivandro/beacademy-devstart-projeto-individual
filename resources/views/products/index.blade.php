@extends("template.index")
@section("title", "Mostruario")

@section("content")
<main class="main">
    <section class="max-container">
        @if($errors->any())
            <div class="card-success" role="alert">
                <div>
                    <strong>Atenção!</strong>
                        @foreach($errors->all() as $error)
                        <div>
                            {{ $error }}
                        </div>
                        @endforeach
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
            </div>
        @endif
        <section>
            <form action="{{ route('products.index') }}" method="GET" class="form">
                <div class="form-group-row">
                    <div class="form-group">
                        <input type="search" name="search" id="search"/>
                        <label for="search">Faça uma busca!</label>
                    </div>
                    <button type="submit" class="btn-sm">BUSCAR</button>
                </div>
            </form>
        </section>
        <section>
            <div>
                produtos
            </div>
        </section>

    </section>
</main>
@endsection