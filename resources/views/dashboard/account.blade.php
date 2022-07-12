@extends("template.index")
@section("title", "Painel de ". Auth::user()->name)


@section("content")
<main class="main">
    <section class="max-container">
        @if(isset($message))
            {{ $message }}
        @endif
        {{ Auth::user()->name }}
        <br/>
        {{ Auth::user()->email }}
    </section>
</main>
@endsection