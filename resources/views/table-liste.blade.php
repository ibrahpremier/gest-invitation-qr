@extends("layout")

@section("content")
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>#</th>
          <th>Table</th>
          <th>Nbre de place</th>
          <th>Diponible(s)</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($tables as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td><a class="btn btn-link btn-sm" href="{{route('table.show',$item->id)}}">
              Table {{$item->code}} 
              @if($item->disponible==0)<i class="fas fa-check-circle text-success"></i> @endif 
            </a></td>
            <td class="text-center">{{$item->place}}</td>
            <td class="text-center">{{$item->disponible}}</td>
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
    Liste des Tables
@endsection

@section("bouton-action")
<a class="btn btn-danger btn-flat" href="{{route('table.create')}}">
    <i class="fas fa-plus"></i> 
    Ajouter une table
</a>
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