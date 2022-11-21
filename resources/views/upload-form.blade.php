@extends("layout")

@section("content")
<form class="form-horizontal" method="POST" action="{{route('inviter.import')}}" enctype="multipart/form-data">
  @csrf
  <div class="row">
    <div class="col-md-5 offset-md-3 ">
      <div class="card">
        <div class="card-header bg-primary">
          Chargement depuis un fichier
        </div>
      <div class="card-body">
        
        <div class="form-group row">
          <label for="liste" class="col-sm-4 col-md-5 col-form-label">Fichier EXCEL/CSV <span class="text-danger">*</span> </label>
          <div class="col-sm-8 col-md-7">
            <input type="file" class="form-control @error('liste') is-invalid @enderror"  name="liste" id="liste" placeholder="liste" required>
          @error('liste')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          </div>
        </div>
        

      </div>
      <div class="card-footer">

    <a href="{{route('invite.index')}}" class="btn btn-danger"> annuler</a>
    <button type="submit" class="btn btn-primary float-right"> ENREGISTRER</button>
      </div>
    </div>
    </div>
  </div>


</form>
@endsection

@section("title")
Invoice | Formulaire
@endsection
