@extends("layout")

@section("content")
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped table-responsive">
        <thead>
        <tr>
          <th>N°</th>
          <th>Nom</th>
          <th>Téléphone</th>
          <th>nbre d'entrées</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($invites as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nom}}</td>
            <td>{{$item->telephone}}</td>
            <td class="text-center">
            
        <div class="form-group row">
            <div class="col-sm-9 col-md-8">
              <select name="place" id="place" class="form-control">
                @for ($i=1; $i<10; $i++)
                <option>{{$i}}</option>
                @endfor
              </select>
            @error('place')
            <p class="text-danger">{{ $message }}</p>
            @enderror
            </div>
          </div>
              
            </td>
            <td>
                <a class="btn btn-success btn-xs" href=""> Ajouter</a>
            </td>
          </tr>
              
          @endforeach
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
@endsection

@section("title")
    Invités | Mariage 
@endsection

@section("entete")
    Liste des invités
@endsection


@section("custom_script")
<script>
  $(document).ready(function(){
    $("#example1").DataTable({
      dom: 'Bfrtip',
      buttons: ["excel", "pdf"],
      paging: false,
      language: {
          "url": 'assets/datatable_fr.json'
      },
      aaSorting: []
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection