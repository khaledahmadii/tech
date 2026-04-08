@extends('layouts.app')
@section('styles')
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show position-fixed p-2" role="alert" style="top: 1rem; right: 1rem; min-width: 250px; max-width: 320px; z-index: 1060; box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);">
        {{ session('success') }}
    </div>
@endif
<div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des Raccordements</h3>
              </div>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                  <i class="fas fa-plus me-2"></i> Ajouter un raccordement
                </button>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nom</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($raccs as $racc)
                        <tr>
                            <td>{{ $racc->id }}</td>
                            <td>{{ $racc->nom }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary edit-racc" data-toggle="modal" data-target="#modal-edit"
                                    data-id="{{ $racc->id }}"
                                    data-nom="{{ $racc->nom }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-sm btn-danger" href="{{ route('racc.delete', $racc->id) }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce raccordement ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->






 <!-- modal d'ajout -->

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="monModalLabel">
                        <i class="fas fa-plus-circle me-2"></i>Nouveau Raccordement
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('racc.add') }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">Nom Raccordement</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                        </div>
                        
                                                
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


      
<!-- Modal de modification -->
            <div class="modal fade" id="modal-edit">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Modifier le raccordement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form id="editInterventionForm" action="{{ route('racc.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="edit-racc-id">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="edit-nom">Nom de raccordement</label>
                        <input type="text" class="form-control" id="edit-nom" name="nom" placeholder="Nom de raccordement" required>
                      </div>




                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                  </form>
                </div>
                <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->


@endsection
@section('scripts')



<script>
  $(function () {


    $('.edit-racc').on('click', function () {
      var button = $(this);
      $('#edit-racc-id').val(button.data('id'));
      $('#edit-nom').val(button.data('nom'));

    });





    setTimeout(function() {
      $('.alert.alert-success').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
      });
    }, 500);


  });
</script>
@endsection