@extends("template.index")
@section("title", "Recuperar senha")

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
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group-column">
                <h4 class="title-form">Recuperar senha</h4>
                <div class="form-group-row">
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder=" " required/>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="form-group-btn">
                    <button type="submit" class="btn-empty">Solicitar Recuperação</button>
                </div>
            </div>
        </form>
    </section>
</main>
@endsection