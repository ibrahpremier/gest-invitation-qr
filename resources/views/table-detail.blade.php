@extends("layout")

@section("content")
  <div class="row">
    <div class="col-md-10 offset-md-1 ">
      <div class="card">
        <div class="card-header bg-danger row">
            <div class="col-6">
          <h4> <span class="text-primary bg-light p-2 rounded">Table {{$table->code}}
            @if($table->disponible==0)<i class="fas fa-check-circle text-success"></i> @endif </span> 
        </h4>
          <span class="badge badge-light">{{$table->disponible}} libres/ {{$table->place}} </span> <br>
            <small>Liste des occupants</small>
            </div>
            <div class="col-6">
                @if ($table->disponible>0)
                    <a href="{{route('invite.add_to_table_frm')}}" class="btn mt-5 btn-light btn-sm float-right" data-toggle="modal" data-target="#modal-lg"> <i class="fas fa-plus"></i> Ajouter un invité à la table</a>
                @else
                    <button class="btn mt-5 btn-light btn-sm float-right" disabled> <i class="fas fa-plus"></i> Ajouter un invité à la table</button>
                @endif

            </div>
        </div>
      <div class="card-body">
        
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>N°</th>
          <th>Nom</th>
          {{-- <th>N° Table</th> --}}
          <th>nbre d'entrées</th>
          <th>Téléphone</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($table->invites as $item)
          <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->nom}}</td>
            {{-- <td class="text-center">{{$item->table->code}}</td> --}}
            <td class="text-center">{{$item->nb_place}}</td>
            <td>{{$item->telephone}}</td>
            <td class="text-center"><a class="btn btn-danger btn-sm" href="{{route('invite.remove-to-table',$item->id)}}"><i class="fas fa-minus-circle"></i> Retirer</a></td>
          </tr>
              
          @endforeach
        </tbody>
      </table>

      </div>
    </div>
    </div>
  </div>


  <div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-danger">
          <h4 class="modal-title">Ajouter un inviter sur la <span class="text-primary bg-light p-2 rounded">table {{$table->code}}</span>  </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="table1_body">
                  <table id="table1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Nom</th>
                      <th>Téléphone</th>
                      {{-- <th>Nbre d'entrées</th> --}}
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($invites_free as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nom}}</td>
                        <td>{{$item->telephone}}</td>
                        {{-- <td class="text-center">
                        
                    <div class="form-group row">
                        <div class="col-sm-9 col-md-8">
                          <select name="place_{{$loop->iteration}}" id="place_{{$loop->iteration}}" class="form-control" readonly>
                            @for ($i=1; $i<10; $i++)
                            <option>{{$i}}</option>
                            @endfor
                          </select>
                        @error('place')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                      </div>
                          
                        </td> --}}
                        <td>
                            <span class="btn btn-primary btn-sm" id="btn_add_{{$loop->iteration}}" onclick="addToTable({{$item->id}},'{{$item->nom}}')"> Selectionner <i class="fas fa-caret-right"></i>  </span>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

        </div>
        <div class="card-body row" id="card_name" style="display: none">

            <div class="card col-md-6 offset-md-3">
                <div class="card-header">
                    <input type="text" class="form-control" id="seleted_name" readonly>
                </div>
                <form id="select_form" method="post" action="{{route('invite.save-add-to-table')}}">
                    @csrf
                    <input type="hidden" name="table_id" value="{{$table->id}}">
                    <input type="hidden" name="invite_id" id="invite_id" >
                <div class="card-body">
                        <div class="form-group row">
                            <label for="nb_place" class="col-sm-3 col-md-6 col-form-label">nombre de place <span class="text-danger">*</span></label>
                            <div class="col-sm-9 col-md-8">
                            <select name="nb_place" id="nb_place" class="form-control">
                                @for ($i=1; $i<$table->disponible+1; $i++)
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
                    <span class="btn btn-default" onclick="cancel()"> <i class="fas fa-times"></i> Annuler</span>
                    <button type="submit" class="btn btn-primary float-right"> <i class="fas fa-save"></i> Enregistrer</button>
                </div>
                </form>
              </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section("title")
Gest Invitation | Table
@endsection

@section('bouton-action')
    <ol class="breadcrumb">
      <li class="breadcrumb-item"> <a href="{{route('table.index')}}">Gestion des tables</a></li>
      <li class="breadcrumb-item active">Table {{$table->code}}</li>
    </ol>
@endsection

@section("custom_script")
<script>
  $(document).ready(function(){
    $("#table1").DataTable({
    //   dom: 'Bfrtip',
      buttons: ["excel", "pdf"],
      language: {
          "url": 'assets/datatable_fr.json'
      },
      paging: false,
      aaSorting: []
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });


    function addToTable(id,nom){
         $("#table1_body").hide();
         $("#seleted_name").val(nom);
         $("#card_name").show();
         $("#invite_id").val(id);
    }
    function cancel(){
         $("#table1_body").show();
         $("#card_name").hide();
    }
</script>
@endsection
