@extends('dashboard.master')

@section('content')
<h1>Cadastrar Rede</h1>

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))

        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="fechar">&times;</a></p>
        @endif
    @endforeach
</div> <!-- end .flash-message -->

<p>
    <a href="{{ route('redes.create') }}" class="btn btn-success">
        Adicionar Rede
    </a>
</p>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>IP Rede</th>
                <th>CIDR</th>
                <th colspan="2">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($redes as $rede)
            <tr>
                <td>{{ $rede->id }}</td>
                <td>{{ $rede->nome }}</td>
                <td>{{ $rede->iprede }}</td>
                <td>{{ $rede->cidr }}</td>
                <td>
                    <a href="{{action('RedeController@edit', $rede->id)}}" class="btn btn-warning">Editar</a>
                </td>
                <td>
                    <form action="{{action('RedeController@destroy', $rede->id)}}" method="post">
                      {{csrf_field()}}
                      <input name="_method" type="hidden" value="DELETE">
                      <button class="delete-item btn btn-danger" type="submit">Deletar</button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection