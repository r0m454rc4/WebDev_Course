@extends('disseny')
@section('content')
<h1>Dades del treballador</h1>
<div class="mt-5">
  <table class="table table-striped table-bordered table-hover">
	<thead class="thead-dark">
		<tr class="table-primary">
			<th scope="col">CAMP</td>
			<th scope="col">VALOR</td>
        </tr>
	</thead>
	<tbody>
		<tr>
			<td>tid</td>
			<td>{{$dades_treballador->tid}}</td>
		</tr>
		<tr>
			<td>Nom</td>
			<td>{{$dades_treballador->nom}}</td>
		</tr>
		<tr>
			<td>Cognoms</td>
			<td>{{$dades_treballador->cognoms}}</td>
		</tr>
		<tr>
			<td>NIF</td>
			<td>{{$dades_treballador->nif}}</td>
		</tr>
		<tr>
			<td>Data de naixement</td>
			<td>{{$dades_treballador->data_naixement}}</td>
		</tr>
		<tr>
			<td>Sexe</td>
			<td>{{$dades_treballador->sexe}}</td>
		</tr>
		<tr>
			<td>Adreça</td>
			<td>{{$dades_treballador->adressa}}</td>
		</tr>
		<tr>
			<td>Telèfon fixe</td>
			<td>{{$dades_treballador->tlf_fixe}}</td>
		</tr>
		<tr>
			<td>Telèfon mòbil</td>
			<td>{{$dades_treballador->tlf_mobil}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$dades_treballador->email}}</td>
		</tr>
		<tr>
			<td>Fotografia</td>
			<td>{{$dades_treballador->fotografia}}</td>
		</tr>
		<tr>
			<td>Treball a distància</td>
			<td>{{$dades_treballador->dades_treballadorall_distancia == "1" ? 'Sí':'No'}}</td>
		</tr>
		<tr>
			<td>Tipus de contracte</td>
			<td>{{$dades_treballador->tipus_contracte}}</td>
		</tr>
		<tr>
			<td>Data de contractació</td>
			<td>{{$dades_treballador->data_contractacio}}</td>
		</tr>
		<tr>
			<td>Categoria</td>
			<td>{{$dades_treballador->categoria}}</td>
		</tr>
		<tr>
			<td>Nom de la feina</td>
			<td>{{$dades_treballador->nom_feina}}</td>
		</tr>
		<tr>
			<td>Sou</td>
			<td>{{$dades_treballador->sou}}</td>
		</tr>
	</tbody>
  </table>
  <div class="p-6 bg-white border-b border-gray-200">
	<a href="{{ url('dashboard') }}">Torna al dashboard<a/>
  </div>
  <div class="p-6 bg-white border-b border-gray-200">
	<a href="{{ url('trebs') }}">Torna a la llista<a/>
  </div>
<div>
@endsection
