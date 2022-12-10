@extends("layout_check")

@section("content")

@if ($invite)

    <style>
      .title1{
        font-family:cursive;
        
      }
    </style>
  <div class="row">
    <div class="col-md-10 offset-md-1 ">
      <div class="card">
        <div class="card-header bg-danger">

          <h3 style="font-family:cursive">Mariage de NGABA OKOUM & MARIETTE</h3>
          <h5 class="p-2 bg-light">Invitation</h5>
        </div>
      <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="nom"
                      class="col-sm-3 col-md-4 col-form-label" style="font-family:cursive">Nom</label>
                    <div class="col-sm-9 col-md-8">
                      <input type="text" style="font-family:cursive" class="form-control @error('nom') is-invalid @enderror"  name="nom" id="nom" placeholder="Nom" value="{{$invite->nom}}" readonly>
                    @error('nom')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="table"
                      class="col-sm-3 col-md-4 col-form-label" style="font-family:cursive">N° table</label>
                    <div class="col-sm-9 col-md-8">
                      <input type="text" style="font-family:cursive" class="form-control @error('table') is-invalid @enderror"  name="table" id="table" placeholder="N° table" value="{{$invite->table->code}}" readonly>
                    @error('table')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                  </div>
          
                  <div class="form-group row">
                    <label for="place"
                      class="col-sm-3 col-md-4 col-form-label" style="font-family:cursive">nombre de place</label>
                    <div class="col-sm-9 col-md-8">
                      <select name="place" id="place" class="form-control" style="font-family:cursive" disabled>
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
                      class="col-sm-3 col-md-4 col-form-label" style="font-family:cursive">N° téléphone</label>
                    <div class="col-sm-8 col-md-8">
                      <input type="text" style="font-family:cursive" class="form-control @error('table') is-invalid @enderror"  name="telephone" id="telephone" placeholder="N° téléphone" value="{{$invite->telephone}}" readonly>
                    @error('telephone')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                  </div>
            </div>

            <div class="col-6 p-2 text-center">
                <img height="190" alt='Code barre' src="https://barcode.tec-it.com/barcode.ashx?data={{strtoupper($invite->nom.'+'.$invite->prenom).'%0A%0A'.urlencode('https://invitation.expertizlab.com/check/'.$invite->code_unique)}}&code=MobileQRCode&translate-esc=true&eclevel=L"/>
            </div>
            {{-- <div class="col-5 p-2 text-center">
              
              <button type="submit" class="btn btn-danger btn-block btn-lg">Enregistrer l'entrée</button>
            </div> --}}
        

      </div>
      <div class="row pb-2">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <a class="btn btn-danger btn-block btn-lg" href="{{route('print',$invite->code_unique)}}" target="blank"><i class="fas fa-download"></i> Télécharger la carte d'invitation</a>
        </div>
        <div class="col-md-3"></div>
      </div>
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-12 text-center">
          <img width="100%" src="{{asset('assets/dist/img/crea-invit.jpg')}}">
        </div>
        <div class="col-md-1"></div>
      </div>
      <div class="card-footer row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          {{-- <button type="submit" class="btn btn-danger btn-block btn-lg">Enregistrer l'entrée</button> --}}
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
    </div>
  </div>
@else

<div class="row">
    <div class="col-md-10 offset-md-1 ">
      <div class="card">
        <div class="card-header bg-danger">
          <h3 style="font-family:cursive">Mariage de NGABA OKOUM & MARIETTE</h3>
          <h5 class="p-2 bg-light">Invitation</h5>
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
    {{-- <button type="submit" class="btn btn-danger float-right"> ENREGISTRER</button> --}}
      </div>
    </div>
    </div>
  </div>
@endif
@endsection

@section("title")
Profil | Mariage
@endsection
