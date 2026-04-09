@extends('layouts.app')
@section('styles')
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@if (session('success'))
    <div class="alert alert-success  alert-dismissible fade show position-fixed p-2" role="alert" style="top: 1rem; right: 1rem; min-width: 250px; max-width: 320px; z-index: 1060; box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);">
        {{ session('success') }}
    </div>
@endif
@section('content')


<div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des interventions</h3>
              </div>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                  <i class="fas fa-plus me-2"></i> Ajouter une intervention
                </button>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                      @if (session('user_role') === 'Administrateur')
                    <th>Technicien</th>
                    @endif
                    <th>Id Intervention (Jeton)</th>
                    <th>Type de Raccordement</th>
                    <th>Heure</th>
                    <th>Notre Grille</th>
                    <th>Validé par l'agent</th>
                    <th>Date d'ajout</th>
                    <th>Actions</th>

                  </tr>
                  </thead>
                  <tbody>
                    @foreach($techs as $tech)
                  <tr>
                    @if (session('user_role') === 'Administrateur')
                    <td>{{ $tech->technicien_nom }} {{ $tech->technicien_prenom }}</td>
                    @endif
                    <td>{{ $tech->jeton }}</td>
                    <td>{{ $tech->racc_nom }}</td>
                    <td>{{ $tech->heure }}</td>
                    <td>{{ $tech->notre_grille }}</td>
                    <td>{{ $tech->valid}}</td>
                    <td>{{ $tech->date_int }}</td>
                    <td>
                      <button type="button" class="btn btn-sm btn-primary edit-intervention" data-toggle="modal" data-target="#modal-edit"
                        data-id="{{ $tech->intervention_id }}"
                        data-jeton="{{ $tech->jeton }}"
                        data-type-rac-id="{{ $tech->type_rac }}"
                        data-heure="{{ $tech->heure }}"
                        data-notre="{{ $tech->notre_grille }}"
                        data-valid="{{ $tech->valid }}"
                      >
                        <i class="fas fa-edit"></i>
                      </button>
                      <a class="btn btn-sm btn-danger" href="{{ route('intervention.delete', $tech->intervention_id) }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette intervention ?')"><i class="fas fa-trash"></i></a>
                    </td>   
                  </tr>
                  @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

@if (session('user_role') === 'Administrateur') 
@include('intervention.admin-modal')
@else
@include('intervention.user-modal')
@endif
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
    $("#example1").DataTable({
      "responsive": true, 
      "lengthChange": false, 
      "autoWidth": false,
      "order": [[6, 'desc']],
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('.edit-intervention').on('click', function () {
      var button = $(this);
      $('#edit-intervention-id').val(button.data('id'));
      $('#edit-jeton').val(button.data('jeton'));
      $('#edit-type-rac-name').val(button.data('type-rac-id')).trigger('change');
      $('#edit-heure').val(button.data('heure')).trigger('change');
      $('#edit-notre').val(button.data('notre'));
    });


    $('#extraCheckbox').on('change', function(){
      if (this.checked) {
        $('#extraInputContainer').show();
        $('#notre').attr('required', true);
      } else {
        $('#extraInputContainer').hide();
        $('#notre').removeAttr('required').val('');

      }
    });

    // Fermeture automatique de l'alerte success après 4 secondes
    setTimeout(function() {
      $('.alert.alert-success').fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
      });
    }, 1000);
    
  });
</script>
@endsection