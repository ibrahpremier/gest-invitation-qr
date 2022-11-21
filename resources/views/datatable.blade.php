@extends("layout")

@section("content")
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>N°</th>
          <th>Code QR</th>
          <th>Nom</th>
          <th>N° Table</th>
          <th>Nombre de place reservé</th>
          <th>Téléphone</th>
          <th>#</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($invites as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td class="text-center">
              <img height="50" alt='Code barre' src="https://barcode.tec-it.com/barcode.ashx?data={{strtoupper($item->nom.'+'.$item->prenom).'%0A%0A'.urlencode('https://invitation.expertizlab.com/check/'.$item->code_unique)}}&code=MobileQRCode&translate-esc=true&eclevel=L"/> <br>
       <a class="btn btn-link btn-sm" href="{{route('invite.show',$item->code_unique)}}"><i class="fa fa-eye"></i> {{$item->code_unique}}</a>
            </td>
            <td>{{$item->nom}}</td>
            <td>{{$item->table}}</td>
            <td>{{$item->nb_place}} entrée(s)</td>
            <td>{{$item->telephone}}</td>
            <td>{{$item->photo}}</td>
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
<a class="btn btn-primary btn-flat" href="{{route('invite.create')}}">
    <i class="fas fa-plus"></i> 
    Ajouter un invité
</a>
<a class="btn btn-info btn-flat" href="{{route('inviter.import-form')}}">
    <i class="fas fa-plus"></i> 
    Charger une liste
</a>
@endsection

@section("custom_script")
<script>
  $(document).ready(function(){
    $("#example1").DataTable({
      dom: 'Bfrtip',
      buttons: ["excel", "pdf"],
      language: {
          "url": 'assets/datatable_fr.json'
      },
      aaSorting: []
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection