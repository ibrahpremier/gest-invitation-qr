@extends("layout")

@section("content")
<form class="form-horizontal" method="POST" action="{{route('invite.update',$invite->id)}}">
  @csrf
 @method('PUT')
  <div class="row">
    <div class="col-md-5 offset-md-3 ">
      <div class="card">
        <div class="card-header bg-danger">
          Modification des informations de l'invité
        </div>
      <div class="card-body">
        
        <div class="form-group row">
          <label for="nom"
            class="col-sm-3 col-md-4 col-form-label">Nom <span class="text-danger">*</span> </label>
          <div class="col-sm-9 col-md-8">
            <input type="text" class="form-control @error('nom') is-invalid @enderror"  name="nom" id="nom" placeholder="Nom" value="{{$invite->nom}}"  required>
          @error('nom')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          </div>
        </div>
        
        {{-- <div class="form-group row">
          <label for="prenom"
            class="col-sm-3 col-md-4 col-form-label">Prénom(s) <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-md-8">
            <input type="text" class="form-control @error('prenom') is-invalid @enderror"  name="prenom" id="prenom" placeholder="prénom(s)" value="{{$invite->prenom}}"  required>
          @error('prenom')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          </div>
        </div> --}}
        
        {{-- <div class="form-group row">
          <label for="table"
            class="col-sm-3 col-md-4 col-form-label">Table <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-md-8">
            <select name="table" id="table" class="form-control @error('table') is-invalid @enderror">
              @foreach ($tables as $item )
                <option value="{{$item->id}}" @if($item->code == $invite->table->code) selected @endif>{{$item->code}} ({{$item->disponible}} dispo.)</option>
              @endforeach 
            </select>
          @error('table')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          </div>
        </div> --}}

        {{-- <div class="form-group row">
            <label for="nb_place"
              class="col-sm-3 col-md-4 col-form-label">nombre de place <span class="text-danger">*</span></label>
            <div class="col-sm-9 col-md-8">
              <select name="nb_place" id="nb_place" class="form-control">
                @for ($i=1; $i<10; $i++)
                <option @if ($invite->nb_place == $i) selected @endif >{{$i}}</option>
                @endfor
              </select>
            @error('nb_place')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
        </div> --}}


        <div class="form-group row">
          <label for="telephone"
            class="col-sm-3 col-md-4 col-form-label">N° téléphone</label>
          <div class="col-sm-9 col-md-8">
            <input type="text" class="form-control @error('table') is-invalid @enderror"  name="telephone" id="telephone" placeholder="N° téléphone"  value="{{$invite->telephone}}">
          @error('telephone')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          </div>
        </div>

      </div>
      <div class="card-footer">

    <a href="{{route('invite.index')}}" class="btn btn-danger"> annuler</a>
    <button type="submit" class="btn btn-danger float-right"> ENREGISTRER</button>
      </div>
    </div>
    </div>
  </div>


</form>
@endsection

@section("title")
Invoice | Formulaire
@endsection
