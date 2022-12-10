@extends("layout_check")

@section("content")

    <style>
      .title1{
        font-family:cursive;
        
      }
    </style>
  <div class="row">
    <div class="col-md-10 offset-md-1 ">
      <div class="card">
        <div class="card-header bg-danger">

            <h5 class="p-2 bg-light">Invitation</h5>
          <h3 style="font-family:cursive; font-weigth:bold">Mariage de NGABA OKOUM & MARIETTE</h3>
        </div>
      <div class="card-body">
      <div class="row pb-2">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <a class="btn btn-danger btn-block btn-lg" href="{{route('print_vierge')}}" target="blank"><i class="fas fa-download"></i> Télécharger la carte d'invitation</a>
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
@endsection

@section("title")
Profil | Mariage
@endsection
