@extends('disseny')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        Actualització de dades
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{ route('trebs.update', $dades_treballador->tid) }}">
			@csrf
            @method('PATCH')
            <div class="form-group">
				<label for="nom">Nom</label>
				<input type="text" class="form-control" name="nom" value="{{ $dades_treballador->nom }}" />
			</div>
			<div class="form-group">
				<label for="cognoms">Cognoms</label>
				<input type="text" class="form-control" name="cognoms" value="{{ $dades_treballador->cognoms }}"/>
			</div>
			<div class="form-group">
				<label for="nif">NIF</label>
				<input type="text" class="form-control" name="nif" value="{{ $dades_treballador->nif }}"/>
			</div>
			<div class="form-group">
				<label for="data_naixement">Data de naixement</label>
				<input type="date" class="form-control" name="data_naixement" value="{{ $dades_treballador->data_naixement }}"/>
			</div>
			<div class="form-group">
				<label for="sexe">Sexe</label>
				<select name="sexe">
					<option value="D" {{ $dades_treballador->sexe == "D" ? 'selected' : ''}}>Dona</option>
					<option value="H" {{ $dades_treballador->sexe == "H" ? 'selected' : ''}}>Home</option>
				</select>
			</div>
			<div class="form-group">
				<label for="adressa">Adreça</label>
				<input type="text" class="form-control" name="adressa"  value="{{ $dades_treballador->adressa }}"/>
			</div>
			<div class="form-group">
				<label for="tlf_fixe">Telèfon fixe</label>
				<input type="tel" class="form-control" name="tlf_fixe"  value="{{ $dades_treballador->tlf_fixe }}"/>
			</div>
			<div class="form-group">
				<label for="tlf_mobil">Telèfon mòbil</label>
				<input type="tel" class="form-control" name="tlf_mobil"  value="{{ $dades_treballador->tlf_mobil }}"/>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email"  value="{{ $dades_treballador->email }}"/>
			</div>
			<div class="form-group">
				<label for="fotografia">Fotografia</label>
				<input type="image" class="form-control" name="fotografia" value="{{ $dades_treballador->fotografia }}"/>
			</div>
			<div class="form-group">
				<label for="treball_distancia">Treball a distància</label>
				<select name="treball_distancia">
					<option value="1" {{ $dades_treballador->treball_distancia == "1" ? 'selected' : ''}}>Sí</option>
					<option value="0" {{ $dades_treballador->treball_distancia == "0" ? 'selected' : ''}}>No</option>
				</select>
			</div>
			<div class="form-group">
				<label for="tipus_contracte">Tipus de contracte</label>
				<select name="tipus_contracte">
					<option value="{{ $dades_treballador->tipus_contracte }}" 'selected'></option>
					<option value="temporal" {{ $dades_treballador->tipus_contracte == "temporal" ? 'selected' : ''}}>Temporal</option>
					<option value="indefinit" {{ $dades_treballador->tipus_contracte == "indefinit" ? 'selected' : ''}}>Indefinit</option>
					<option value="en formació" {{ $dades_treballador->tipus_contracte == "en formació" ? 'selected' : ''}}>En formació</option>
					<option value="en pràctiques" {{ $dades_treballador->tipus_contracte == "en pràctiques" ? 'selected' : ''}}>En pràctiques</option>
				</select>
			</div>
			<div class="form-group">
				<label for="data_contractacio">Data de contractació</label>
				<input type="date" class="form-control" name="data_contractacio"  value="{{ $dades_treballador->data_contractacio }}"/>
			</div>
			<div class="form-group">
				<label for="categoria">Categoria</label>
				<input type="number" class="form-control" name="categoria" min="1"  value="{{ $dades_treballador->categoria }}"/>
			</div>
			<div class="form-group">
				<label for="nom_feina">Nom de la feina</label>
				<input type="text" class="form-control" name="nom_feina"  value="{{ $dades_treballador->nom_feina }}"/>
			</div>
			<div class="form-group">
				<label for="nom">Sou</label>
				<input type="number" class="form-control" name="sou" min="500"  value="{{ $dades_treballador->sou }}"/>
			</div>
			<button type="submit" class="btn btn-block btn-primary">Envia</button>
        </form>
    </div>
</div>
<br><a href="{{ url('trebs') }}">Accés directe a la Llista d'empleats</a
@endsection
