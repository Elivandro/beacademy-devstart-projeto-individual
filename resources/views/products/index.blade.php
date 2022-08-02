@extends("template.index")
@section("title", "Mostruario")

@section("content")
<main class="main margem-top">
    <form action="{{ route('products.index') }}" method="GET">
        <input type="search" name="search"/>
        <button>BUSCAR</button>
    </form>
    <section>

    </section>
</main>
@endsection