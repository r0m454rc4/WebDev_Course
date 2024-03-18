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
            <td>NIF</td>
            <td>Data de naixement</td>
            <td>Sexe</td>
            <td>Adreça</td>
            <td>Telèfon fixe</td>
            <td>Telèfon mòbil</td>
            <td>Email</td>
            <td>Fotografia</td>
            <td>Treball a distància</td>
            <td>Tipus de contracte</td>
            <td>Data de contractació</td>
            <td>Categoria</td>
            <td>Nom de la feina</td>
            <td>Sou</td>
        </tr>
    </thead>
    <tbody>
    @foreach($dades_treballadors as $treb)
        <tr>
            <td>{{$treb->tid}}</td>
            <td>{{$treb->nom}}</td>
            <td>{{$treb->cognoms}}</td>
            <td>{{$treb->nif}}</td>
            <td>{{$treb->data_naixement}}</td>
            <td>{{$treb->sexe}}</td>
            <td>{{$treb->adressa}}</td>
            <td>{{$treb->tlf_fixe}}</td>
            <td>{{$treb->tlf_mobil}}</td>
            <td>{{$treb->email}}</td>
            <td>{{$treb->fotografia}}</td>
            <td>{{$treb->treball_distancia}}</td>
            <td>{{$treb->tipus_contracte}}</td>
            <td>{{$treb->data_contractacio}}</td>
            <td>{{$treb->categoria}}</td>
            <td>{{$treb->nom_feina}}</td>
            <td>{{$treb->sou}}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
<div>
@endsection
