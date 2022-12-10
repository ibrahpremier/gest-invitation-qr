@extends("layout")

@section("content")
<form class="form-horizontal" method="POST" action="{{route('invite.store')}}">
  @csrf
  <div class="row">
    <div class="col-md-10 offset-md-1 ">
      <div class="card">
        <div class="card-header bg-danger">
          Profil de l'invité
          <a href="{{route('invite.edit',$invite->code_unique)}}" class="btn btn-primary float-right"> <i class="fas fa-edit"></i> modifier</a>
        </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="nom"
                      class="col-sm-3 col-md-4 col-form-label">Nom</label>
                    <div class="col-sm-9 col-md-8">
                      <input type="text" class="form-control"  name="nom" id="nom" placeholder="Nom" value="{{$invite->nom}}" readonly>
                    </div>
                  </div>
                
                  
                  <div class="form-group row">
                    <label for="table"
                      class="col-sm-3 col-md-4 col-form-label">Table</label>
                    <div class="col-sm-9 col-md-8">
                      <input type="text" class="form-control"  name="table" id="table" placeholder="N° table" value="@if($invite->table) {{$invite->table->code}} @else Non assigné @endif" readonly>
                    </div>
                  </div>
          
                  <div class="form-group row">
                    <label for="place"
                      class="col-sm-3 col-md-4 col-form-label">nombre de place</label>
                    <div class="col-sm-9 col-md-8">
                      @if($invite->table)
                      <select name="place" id="place" class="form-control" disabled>
                        @for ($i=1; $i<10; $i++)
                        <option @if ($invite->nb_place == $i) selected @endif >{{$i}}</option>
                        @endfor
                      </select>
                      @else 
                      <input type="text" class="form-control" value="Non assigné" readonly>
                      @endif
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
                  <br>
                  <a href="{{route('check',$invite->code_unique)}}" class="btn btn-link text-danger"> <u>Afficher la carte d'invitation </u></a>
            </div>

            <div class="col-5 p-2 text-center">
                <small class="text-bold">CODE QR </small> <br>
                <img height="280" alt='Code barre' src="https://barcode.tec-it.com/barcode.ashx?data={{urlencode(strtoupper($invite->nom)).'%0A%0A'.urlencode('https://invitation.expertizlab.com/check/'.$invite->code_unique)}}&code=MobileQRCode&translate-esc=true&eclevel=L"/>
        </div>
        

      </div>
      <div class="card-footer">

    <a href="{{route('invite.index')}}" class="btn btn-default"> retour</a>
    {{-- <button type="submit" class="btn btn-danger float-right"> ENREGISTRER</button> --}}
      </div>
    </div>
    </div>
  </div>


</form>
@endsection

@section("title")
Profil | Mariage
@endsection
