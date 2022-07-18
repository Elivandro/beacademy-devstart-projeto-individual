@extends("template.index")
@section("title", "Painel de ". Auth::user()->name)

@section("content")
<main class="main">
    <section class="max-container">
        @if(session()->has('destroy'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Atenção!</strong> {{ session()->get('destroy') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(session()->has('create'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Atenção!</strong> {{ session()->get('create') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="card-container">
            <div class="card-header">
                @if(Auth::user()->image)
                    <img src="{{ asset('storage/'.$user->image) }}" width="150px"/>
                @else
                    <img src="{{ asset('storage/assets/profile/avatar.jpg') }}" width="150px"/>
                @endif
            </div>
            <div>
                {{ Auth::user()->name }}
            </div>
            <div class="card-body">
                <div>
                    {{ Auth::user()->email }}
                </div>
                <div>
                    {{ formatDateTime(Auth::user()->birthday) }}
                </div>
                <div>
                    {{ formatCnpjCpf(Auth::user()->cpf) }}
                </div>
                <br/>
                <div>
                    <div>
                        <h3>Telefones:</h3>
                        <a href="{{ route('regphone.index') }}">Adicionar Telefones</a>
                    </div>
                    @foreach(Auth::user()->Phones as $phone)
                    <div>
                        {{ formatPhoneNumber($phone->phone) }}
                        {{ $phone->description }}
                    </div>
                    <div>
                        <form action="{{ route('phone.destroy', $phone->id) }}" method="POST">
                                @method("DELETE")
                                @csrf
                                <a href="#{{ $phone->id }}">EDITAR</a>
                                <button type="submit">EXCLUIR</button>
                        </form>
                    </div>
                    <br/>
                    @endforeach
                </div>
                <br/>
                <div>
                    <div>
                        <h3>Endereços:</h3>
                        <a href="{{ route('regaddress.index') }}">Adicionar Endereços</a>
                    </div>
                    @foreach(Auth::user()->Addresses as $address)
                    <div>
                        {{  $address->address }}
                        {{  $address->district }}
                        {{  formatCep($address->zip_code) }}
                        {{  $address->city }}
                        {{  $address->state }}
                        {{  $address->country }}
                    </div>
                    <div>
                        <form action="{{ route('address.destroy', $address->id) }}" method="POST">
                            @method("DELETE")
                            @csrf
                            <a href="#{{ $address->id }}">EDITAR</a>
                            <button type="submit">EXCLUIR</button>
                        </form>
                    </div>
                    <br/>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>
@endsection