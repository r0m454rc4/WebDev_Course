@extends('disseny')
@section('content')
<div class="card mt-5">
  <div class="card-header">
    Afegeix un nou treballador
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
    <form method="post" action="/trebs">
        @csrf
        <!-- https://laravel.com/docs/10.x/csrf -->
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom"/>
        </div>
        <div class="form-group">
            <label for="cognoms">Cognoms</label>
            <input type="text" class="form-control" name="cognoms"/>
        </div>
        <div class="form-group">
            <label for="nif">NIF</label>
            <input type="text" class="form-control" name="nif"/>
        </div>
        <div class="form-group">
            <label for="data_naixement">Data de naixement</label>
            <input type="date" class="form-control" name="data_naixement"/>
        </div>
        <div class="form-group">
            <label for="sexe">Sexe</label>
            <select name="sexe">
			    <option value="D">Dona</option>
			    <option value="H">Home</option>
			</select>
        </div>
        <div class="form-group">
            <label for="adressa">Adreça</label>
            <input type="text" class="form-control" name="adressa"/>
        </div>
        <div class="form-group">
            <label for="tlf_fixe">Telèfon fixe</label>
            <input type="tel" class="form-control" name="tlf_fixe"/>
        </div>
        <div class="form-group">
            <label for="tlf_mobil">Telèfon mòbil</label>
            <input type="tel" class="form-control" name="tlf_mobil"/>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email"/>
        </div>
        <div class="form-group">
            <label for="treball_distancia">Treball a distància</label>
            <select name="treball_distancia">
			    <option value="1">Sí</option>
			    <option value="0">No</option>
			</select>
        </div>
        <div class="form-group">
            <label for="tipus_contracte">Tipus de contracte</label>
            <select name="tipus_contracte">
			    <option value="temporal">Temporal</option>
			    <option value="indefinit">Indefinit</option>
			    <option value="en formació">En formació</option>
			    <option value="en pràctiques">En pràctiques</option>
			</select>
        </div>
        <div class="form-group">
            <label for="data_contractacio">Data de contractació</label>
            <input type="date" class="form-control" name="data_contractacio"/>
        </div>
        <div class="form-group">
            <label for="categoria">Categoria</label>
            <input type="number" class="form-control" name="categoria" min="1"/>
        </div>
        <div class="form-group">
            <label for="nom_feina">Nom de la feina</label>
            <input type="text" class="form-control" name="nom_feina"/>
        </div>
        <div class="form-group">
            <label for="nom">Sou</label>
            <input type="number" class="form-control" name="sou" min="500"/>
        </div>
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
    </form>
  </div>
</div>

<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection
