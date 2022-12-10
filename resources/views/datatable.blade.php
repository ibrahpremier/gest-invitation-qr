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
          <th>Numéro de table</th>
          <th>Nombre d'entrées</th>
          <th>Téléphone</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($invites as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td><a class="btn btn-link btn-sm text-left" href="{{route('invite.show',$item->code_unique)}}">{{$item->nom}}</a></td>
            <td class="text-center">@if($item->table) <a class="btn btn-link btn-sm" href="{{route('table.show',$item->table->id)}}">Table {{$item->table->code}}</a> @else <em>non assigné</em> @endif</td>
            <td class="text-center">{{$item->nb_place}}</td>
            <td>{{$item->telephone}}</td>
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

@section("bouton-action")
<a class="btn btn-danger btn-flat" href="{{route('invite.create')}}">
    <i class="fas fa-plus"></i> 
    Créer un invité
</a>
{{-- <a class="btn btn-info btn-flat" href="{{route('invite.import-form')}}">
    <i class="fas fa-plus"></i> 
    Charger une liste
</a> --}}
{{-- <a class="btn btn-default btn-flat" target="blank" href="{{route('print-all')}}">
    <i class="fas fa-print"></i> 
    Imprimer les cartes
</a> --}}
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