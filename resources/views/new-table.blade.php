@extends("layout")

@section("content")
<form class="form-horizontal" method="POST" action="{{route('table.store')}}">
  @csrf
  <div class="row">
    <div class="col-md-4 offset-md-3 ">
      <div class="card">
        <div class="card-header bg-danger">
          Création d'une table
        </div>
      <div class="card-body">
        
        <div class="form-group row">
          <label for="code"
            class="col-sm-3 col-md-4 col-form-label">Code <span class="text-danger">*</span> </label>
          <div class="col-sm-9 col-md-8">
            <input type="text" class="form-control @error('code') is-invalid @enderror"  name="code" id="code" placeholder="Code" required>
          @error('code')
          <p class="text-danger">{{ $message }}</p>
          @enderror
          </div>
        </div>
        

        <div class="form-group row">
          <label for="place"
            class="col-sm-3 col-md-4 col-form-label">nombre de place <span class="text-danger">*</span></label>
          <div class="col-sm-9 col-md-8">
            <select name="place" id="place" class="form-control">
              @for ($i=1; $i<11; $i++)
              <option>{{$i}}</option>
              @endfor
            </select>
          @error('place')
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
Gest Invitation | Nouvelle table
@endsection
