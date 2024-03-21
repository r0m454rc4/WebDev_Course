@extends('disseny')
@section('content')
<h1>Llista d'empleats</h1>
<div class="mt-5">
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td>tid</td>
          <td>Nom</td>
          <td>Cognoms</td>
          <td>Accions sobre la taula</td>
        </tr>
    </thead>
    <tbody>
        @foreach($dades_treballadors as $treb)
        <tr>
            <td>{{$treb->tid}}</td>
            <td>{{$treb->nom}}</td>
            <td>{{$treb->cognoms}}</td>
            <td class="text-left">
            <a href="{{ route('trebs.edit', $treb->tid)}}" class="btn btn-primary btn-sm">Edita</a>
            <form action="{{ route('trebs.destroy', $treb->tid)}}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">
                Esborra
              </button>
            </form>
            <a href="{{ route('trebs.show', $treb->tid)}}" class="btn btn-info btn-sm">Mostra</a>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
<div class="p-6 bg-white border-b border-gray-200">
	<a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection
