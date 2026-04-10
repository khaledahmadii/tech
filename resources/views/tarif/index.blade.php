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
                <h3 class="card-title">Liste des Tarifs</h3>
              </div>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                  <i class="fas fa-plus me-2"></i> Ajouter un prix
                </button>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Raccordement</th>
                            <th>prix pour les salariés</th>
                            <th>prix pour les auto-entrepreneur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tarifs as $tarif)
                        <tr>
                            <td>{{ $tarif->rac->nom }}</td>
                            <td>{{ $tarif->prix_salarie }}</td>
                            <td>{{ $tarif->prix_auto }}</td>
                            <td>
                                <button type="button" class="btn btn-md btn-primary edit-tarif" data-toggle="modal" data-target="#modal-edit"
                                    data-id="{{ $tarif->id }}"
                                    data-racc-id="{{ $tarif->id_rac }}"
                                    data-racc="{{ $tarif->rac->nom }}"
                                    data-salarie="{{ $tarif->prix_salarie }}"
                                    data-auto="{{ $tarif->prix_auto }}"
                                >

                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-sm btn-danger" href="{{ route('tarif.delete', $tarif->id) }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce tarif ?')"><i class="fas fa-trash"></i></a>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <!-- Optionnel : tfoot si vous voulez un pied de tableau -->
                    
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            @if($raccSansTarif->isNotEmpty())
            <div class="card mt-4">
              <div class="card-header">
                <h3 class="card-title">Raccordements sans tarif</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Raccordement</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($raccSansTarif as $racc)
                        <tr>
                            <td>{{ $racc->nom }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
            @endif


            <!-- modal d'ajout -->

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="monModalLabel">
                        <i class="fas fa-plus-circle me-2"></i>Nouveau Prix
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('tarif.add') }}">
                        @csrf
                        <div class="row">
                                                             
                            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="id_rac" style="width: 100%;">
                                    <option value="" >-- Choisir un raccordement --</option>

                                     @foreach($raccSansTarif as $rst)
                                    <option value="{{ $rst->id }}">{{ $rst->nom }}</option>
                                    @endforeach
                                  </select>
                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">Prix pour les salariés</label>
                                <input type="text" class="form-control" id="prix_salarie" name="prix_salarie" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="title" class="form-label">Prix pour les auto-entrepreneurs</label>
                                <input type="text" class="form-control" id="prix_auto" name="prix_auto" required>
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
                    <h4 class="modal-title">Modifier le prix</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form id="editInterventionForm" action="{{ route('tarif.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="edit-id">
                    <input type="hidden" name="id_rac" id="edit-racc-id">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="edit-racc">Raccordement</label>
                        <input type="text" class="form-control" id="edit-racc" name="rac" placeholder="Nom d'utilisateur" disabled>
                      </div>
                      <div class="form-group">
                        <label for="edit-nom">prix pour les salariés </label>
                        <input type="text" class="form-control" id="edit-salarie" name="prix_salarie" placeholder="prix pour les salariés" required>
                      </div>
                      <div class="form-group">
                        <label for="edit-auto">prix pour les auto-entrepreneurs</label>
                        <input type="text" class="form-control" id="edit-auto" name="prix_auto" placeholder="prix pour les auto-entrepreneurs" required>
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
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
  $(function () {


    $('.edit-tarif').on('click', function () {
      var button = $(this);
      $('#edit-id').val(button.data('id'));
      $('#edit-racc-id').val(button.data('racc-id'));
      $('#edit-racc').val(button.data('racc'));
      $('#edit-salarie').val(button.data('salarie'));
      $('#edit-auto').val(button.data('auto'));

    });

    $('#modal-password').on('show.bs.modal', function () {
      $('#password-compte-id').val($('#edit-compte-id').val());
    });


    $('#extraCheckbox').on('change', function(){
      if (this.checked) {
        $('#extraInputContainer').show();
        $('#extra_input').attr('required', true);
      } else {
        $('#extraInputContainer').hide();
        $('#extra_input').removeAttr('required').val('');
      }
    });
    setTimeout(function() {
      $('.alert.alert-success').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
      });
    }, 500);


  });
</script>
@endsection