@extends("layout_check")

@section("content")

@if ($invite)
    

  <div class="row">
    <div class="col-md-10 offset-md-1 ">
      <div class="card">
        <div class="card-header bg-info">
          MARIAGE DE .... | Profil invité
          {{-- <a href="{{route('invite.edit',$invite->code_unique)}}" class="btn btn-danger float-right">modifier</a> --}}
        </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="nom"
                      class="col-sm-3 col-md-4 col-form-label">Nom</label>
                    <div class="col-sm-9 col-md-8">
                      <input type="text" class="form-control @error('nom') is-invalid @enderror"  name="nom" id="nom" placeholder="Nom" value="{{$invite->nom}}" readonly>
                    @error('nom')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                  </div>
                  
                  {{-- <div class="form-group row">
                    <label for="prenom"
                      class="col-sm-3 col-md-4 col-form-label">Prénom(s)</label>
                    <div class="col-sm-9 col-md-8">
                      <input type="text" class="form-control @error('prenom') is-invalid @enderror"  name="prenom" id="prenom" placeholder="prénom(s)"  value="{{$invite->prenom}}" readonly>
                    @error('prenom')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                  </div> --}}
                  
                  <div class="form-group row">
                    <label for="table"
                      class="col-sm-3 col-md-4 col-form-label">N° table</label>
                    <div class="col-sm-9 col-md-8">
                      <input type="text" class="form-control @error('table') is-invalid @enderror"  name="table" id="table" placeholder="N° table" value="{{$invite->table}}" readonly>
                    @error('table')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                  </div>
          
                  <div class="form-group row">
                    <label for="place"
                      class="col-sm-3 col-md-4 col-form-label">nombre de place</label>
                    <div class="col-sm-9 col-md-8">
                      <select name="place" id="place" class="form-control" disabled>
                        @for ($i=1; $i<10; $i++)
                        <option @if ($invite->nb_place == $i) selected @endif >{{$i}}</option>
                        @endfor
                      </select>
                    @error('place')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                  </div>
          
          
                  <div class="form-group row">
                    <label for="telephone"
                      class="col-sm-3 col-md-4 col-form-label">N° téléphone</label>
                    <div class="col-sm-9 col-md-8">
                      <input type="text" class="form-control @error('table') is-invalid @enderror"  name="telephone" id="telephone" placeholder="N° téléphone" value="{{$invite->telephone}}" readonly>
                    @error('telephone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                  </div>
            </div>

            <div class="col-5 p-2 text-center">
                <small class="text-bold">CODE QR </small> <br>
                <img height="280" alt='Code barre' src="https://barcode.tec-it.com/barcode.ashx?data={{strtoupper($invite->nom.'+'.$invite->prenom).'%0A%0A'.urlencode('https://invitation.expertizlab.com/check/'.$invite->code_unique)}}&code=MobileQRCode&translate-esc=true&eclevel=L"/>
        </div>
        

      </div>
      <div class="card-footer">

    {{-- <a href="{{route('invite.index')}}" class="btn btn-default"> retour</a> --}}
    {{-- <button type="submit" class="btn btn-primary float-right"> ENREGISTRER</button> --}}
      </div>
    </div>
    </div>
  </div>
@else

<div class="row">
    <div class="col-md-10 offset-md-1 ">
      <div class="card">
        <div class="card-header bg-info">
          MARIAGE DE .... | Profil invité
          {{-- <a href="{{route('invite.edit',$invite->code_unique)}}" class="btn btn-danger float-right">modifier</a> --}}
        </div>
      <div class="card-body">
        <div class="row">

            <div class="col-5 p-2 text-center">
                <h3>Profil invité introuvable </h3>
            </div>
        </div>
        

      </div>
      <div class="card-footer">

    {{-- <a href="{{route('invite.index')}}" class="btn btn-default"> retour</a> --}}
    {{-- <button type="submit" class="btn btn-primary float-right"> ENREGISTRER</button> --}}
      </div>
    </div>
    </div>
  </div>
@endif
@endsection

@section("title")
Profil | Mariage
@endsection
