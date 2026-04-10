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
                <h3 class="card-title">Liste des Comptes</h3>
              </div>
                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-lg">
                  <i class="fas fa-plus me-2"></i> Ajouter un compte
                </button>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Nom d'utilisateur</th>
                            <th>Prestataire</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->nom }}</td>
                            <td>{{ $user->prenom }}</td>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->prestataire->nom }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary edit-compte" data-toggle="modal" data-target="#modal-edit"
                                    data-id="{{ $user->id }}"
                                    data-nom="{{ $user->nom }}"
                                    data-prenom="{{ $user->prenom }}"
                                    data-login="{{ $user->login }}"
                                    data-presta="{{ $user->presta }}"
                                    data-role="{{ $user->role }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-sm btn-danger" href="{{ route('compte.delete', $user->id) }}" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette intervention ?')">
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
                            <th>Nom d'utilisateur</th>
                            <th>Prestataire</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->



 <!-- modal d'ajout -->

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="monModalLabel">
                        <i class="fas fa-plus-circle me-2"></i>Nouveau Compte
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('compte.add') }}">
                        @csrf
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="login" name="login" required>
                            </div>
                            <div class="col-md-6 mb-3">
                               <label for="title" class="form-label">Prestataire</label>
                                <select class="form-select form-control" id="presta" name="presta"  required>
                                    @foreach($presta as $p)
                                        <option value="{{ $p->id }}">{{ $p->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                               <label for="title" class="form-label">Type</label>
                                <select class="form-select form-control" id="role" name="role" required>
                                        <option value="Administrateur">Administrateur</option>
                                        <option value="auto-entrepreneur">auto-entrepreneur</option>
                                        <option value="salarie">Salarié</option>
                                </select>

                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" required>
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
                    <h4 class="modal-title">Modifier le compte</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form id="editInterventionForm" action="{{ route('compte.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="edit-compte-id">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="edit-login">Nom d'utilisateur</label>
                        <input type="text" class="form-control" id="edit-login" name="login" placeholder="Nom d'utilisateur" required>
                      </div>
                      <div class="form-group">
                        <label for="edit-nom">Nom</label>
                        <input type="text" class="form-control" id="edit-nom" name="nom" placeholder="Nom" required>
                      </div>
                      <div class="form-group">
                        <label for="edit-prenom">Prenom</label>
                        <input type="text" class="form-control" id="edit-prenom" name="prenom" placeholder="Prenom" required>
                      </div>
                      <div class="form-group">
                            <label for="edit-presta">Prestataire</label>
                                <div class="input-group">

                                <select class="form-select form-control" id="edit-presta" name="presta"  required>
                                    @foreach($presta as $p)
                                        <option value="{{ $p->id }}">{{ $p->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                     </div>
                      <div class="form-group">
                        <label for="edit-role">Rôle</label>
                        <div class="input-group">
                          <select class="form-select form-control" id="edit-role" name="role" required>
                                        <option value="Administrateur">Administrateur</option>
                                        <option value="auto-entrepreneur">auto-entrepreneur</option>
                                        <option value="salarie">Salarie</option>
                          </select>
                        </div>
                      </div>




                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-password">Modifier mot de passe</button>
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

<!-- Modal de changement de mot de passe -->
            <div class="modal fade" id="modal-password">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Changer le mot de passe</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form action="{{ route('compte.updatePassword') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="password-compte-id">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="new-password">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="new-password" name="password" required>
                      </div>
                      <div class="form-group">
                        <label for="confirm-password">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="confirm-password" name="password_confirmation" required>
                      </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                      <button type="submit" class="btn btn-primary">Changer</button>
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