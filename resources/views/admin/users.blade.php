@extends("layout.layout")
@section("title", "Admin: listar usuarios")

@section("content")
<main class="main">
    <div class="max-container">
        <div class="container">
        @foreach($users as $user)
            <div class="card" style="width: 18rem;">
                <img src="../assets/img/users/foto.png" alt="imagem de {{ $user->name }}" class="profile">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->name }}</h5>
                    <p class="card-text"></p>
                </div>
                <ul class="card-content">
                    <li>{{ $user->email }}</li>
                    <li>{{ $user->cpf }}</li>
                    <li>{{ $user->phone->phone }}</li>
                    <li>{{ $user->address->address }}</li>
                    <li>{{ $user->city }}</li>
                    <li>{{ $user->state }}</li>
                    <li>{{ $user->country }}</li>
                    <li>{{ $user->userType }}</li>
                </ul>
                <div class="card-btn">
                    <a href="#" class="btn">EDITAR</a>
                    <a href="#" class="btn">EXCLUIR</a>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</main>
@endsection