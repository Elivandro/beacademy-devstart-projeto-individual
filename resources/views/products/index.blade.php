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
        <form action="{{ route('products.index') }}" method="GET">
            <div class="form-group-row">
                <div class="form-group">
                    <input type="search" name="search" id="search"/>
                    <label for="search">Nome ou categoria/espécie</label>
                </div>
                <button>BUSCAR</button>
            </div>
        </form>



    </section>
</main>
@endsection