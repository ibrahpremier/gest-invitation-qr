@extends("layout")

@section("content")
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>N°</th>
          {{-- <th>Code QR</th> --}}
          <th>Nom</th>
          <th>Table</th>
          <th>nbre d'entrées</th>
          <th>Téléphone</th>
          {{-- <th>#</th> --}}
        </tr>
        </thead>
        <tbody>
          @foreach ($invites as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            {{-- <td class="text-center">
              <img height="50" alt='Code barre' src="https://barcode.tec-it.com/barcode.ashx?data={{strtoupper($item->nom.'+'.$item->prenom).'%0A%0A'.urlencode('https://invitation.expertizlab.com/check/'.$item->code_unique)}}&code=MobileQRCode&translate-esc=true&eclevel=L"/> <br>
       <a class="btn btn-link btn-sm" href="{{route('invite.show',$item->code_unique)}}"><i class="fa fa-eye"></i> {{$item->code_unique}}</a>
            </td> --}}
            <td><a class="btn btn-link btn-sm" href="{{route('invite.show',$item->code_unique)}}">{{$item->nom}}</a></td>
            <td class="text-center">@if($item->table) <a class="btn btn-link btn-sm" href="{{route('table.show',$item->table->id)}}">Table {{$item->table->code}}</a> @else <em>non assigné</em> @endif</td>
            <td class="text-center">{{$item->nb_place}}</td>
            <td>{{$item->telephone}}</td>
            {{-- <td>{{$item->photo}}</td> --}}
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