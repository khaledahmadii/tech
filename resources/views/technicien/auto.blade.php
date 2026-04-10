@extends('layouts.app')
@section('styles')
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')


<div class="card">
              <div class="card-header">
                <h3 class="card-title">Revenue des Employés</h3>
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Revenu Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($techniciens as $t)
                        <tr>
                            <td>{{ $t->nom }}</td>
                            <td>{{ $t->prenom }}</td>
                            <td>{{ $t->revenu_total }} Euro</td>
                            <td>

                                <a class="btn btn-sm btn-danger" href="{{ route('compte.delete', $t->id) }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette intervention ?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <!-- Optionnel : tfoot si vous voulez un pied de tableau -->
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Revenu Total</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->






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
var table = $("#example1").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        dom: 'Bfrtip', // pour afficher les boutons
        language: {
            processing:     "Traitement en cours...",
            search:         "Rechercher :",
            lengthMenu:     "Afficher _MENU_ entrées",
            info:           "Affichage de _START_ à _END_ sur _TOTAL_ entrées",
            infoEmpty:      "Aucune donnée disponible",
            infoFiltered:   "(filtré à partir de _MAX_ entrées totales)",
            loadingRecords: "Chargement en cours...",
            zeroRecords:    "Aucun enregistrement trouvé",
            emptyTable:     "Aucune donnée disponible dans le tableau",
            paginate: {
                first:      "Premier",
                previous:   "Précédent",
                next:       "Suivant",
                last:       "Dernier"
            },
            aria: {
                sortAscending:  ": activer pour trier la colonne par ordre croissant",
                sortDescending: ": activer pour trier la colonne par ordre décroissant"
            }
        },
        buttons: [
            { extend: 'csv', text: 'CSV' },
            { extend: 'excel', text: 'Excel' },
            { extend: 'pdf', text: 'PDF' },
            { extend: 'print', text: 'Imprimer' },
        ],
        columnDefs: [
            { className: "text-center", targets: "_all" } // centre toutes les colonnes
        ]
    });
    table.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('.edit-compte').on('click', function () {
      var button = $(this);
      $('#edit-compte-id').val(button.data('id'));
      $('#edit-login').val(button.data('login'));
      $('#edit-nom').val(button.data('nom'));
      $('#edit-prenom').val(button.data('prenom'));
      $('#edit-presta').val(button.data('presta')).trigger('change');
      $('#edit-role').val(button.data('role')).trigger('change');
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