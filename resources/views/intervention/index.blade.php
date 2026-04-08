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
                    <th>Technicien</th>
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
                    <td>{{ $tech->technicien_nom }} {{ $tech->technicien_prenom }}</td>
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
                  </tfoot>

                  <tr>
                    <th>Technicien</th>
                    <th>Id Intervention (Jeton)</th>
                    <th>Type de Raccordement</th>
                    <th>Heure</th>
                    <th>Notre Grille</th>
                    <th>Validé par l'agent</th>
                    <th>Date d'ajout</th>
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
                        <i class="fas fa-plus-circle me-2"></i>Nouveau intervention
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('intervention.add') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">technicien</label>
                                <div class="form-group">
                                  <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" name="technicien" style="width: 100%;">
                                    <option value="" >-- Choisir un technicien --</option>

                                     @foreach($tech_list as $t)
                                    <option value="{{ $t->id }}">{{ $t->nom }} {{ $t->prenom }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                         </div>
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Id d'intervention (jeton)</label>
                                <input type="text" class="form-control" id="jeton" name="jeton" required>
                            </div>
                            <div class="col-md-6 mb-3">
                               <label for="title" class="form-label">Type de raccordement</label>
                                <select class="form-select form-control" id="type_rac" name="type_rac" required>
                                    @foreach($racc as $r)
                                        <option value="{{ $r->id }}">{{ $r->nom }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">heure</label>
                                <select class="form-select form-control" id="heure" name="heure" required>
                                                                    <option value="8H">8h</option>
                                                                    <option value="9H">9h</option>
                                                                    <option value="10H">10h</option>
                                                                    <option value="11H">11h</option>
                                                                    <option value="12H">12h</option>
                                                                    <option value="13H">13h</option>
                                                                    <option value="14H">14h</option>
                                                                    <option value="15H">15h</option>
                                                                    <option value="16H">16h</option>

                                </select>                                    </div>
                                
                                
                            <div class="col-md-6 mb-3">
                            <label class="form-label" for="title">Id validé par l'agent <span style="color: red;">*</span></label>
                                <div class="form-group">
                                    <select class="form-control" id="edit-valid" name="valid" required>
                                    <option value="">-- Choisir une option --</option>
                                    <option value="oui">Oui</option>
                                    <option value="non">Non</option>
                                    </select>
                                </div>



                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="extraCheckbox" name="has_extra">
                                    <label class="form-check-label" for="extraCheckbox">Sur une notre grille</label>
                                </div>
                            </div>
                            <!-- Champ texte caché par défaut, affiché si checkbox cochée -->
                            <div class="col-md-6 mb-3" id="extraInputContainer" style="display: none;">
                                <label for="extra_input" class="form-label">Grille</label>
                                    <select class="form-select form-control" id="notre" name="notre">
                                    @foreach($tech_list as $t)
                                    <option value="{{ $t->id }}">{{ $t->nom }} {{ $t->prenom }}</option>
                                    @endforeach                            
                                    </select>    
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
                    <h4 class="modal-title">Modifier l'intervention</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form id="editInterventionForm" action="{{ route('intervention.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="edit-intervention-id">
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="edit-jeton">Jeton</label>
                        <input type="text" class="form-control" id="edit-jeton" name="jeton" placeholder="Jeton">
                      </div>
                      <div class="form-group">
                        <label for="edit-type-rac">Type de raccordement</label>
                        <div class="input-group">
                          <select class="form-control" id="edit-type-rac-name" name="type_rac">
                            @foreach($racc as $r)
                              <option value="{{ $r->id }}">{{ $r->nom }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="edit-heure">Heure</label>
                                <select class="form-select form-control" id="edit-heure" name="heure" required>
                                                                    <option value="8H">8h</option>
                                                                    <option value="9H">9h</option>
                                                                    <option value="10H">10h</option>
                                                                    <option value="11H">11h</option>
                                                                    <option value="12H">12h</option>
                                                                    <option value="13H">13h</option>
                                                                    <option value="14H">14h</option>
                                                                    <option value="15H">15h</option>
                                                                    <option value="16H">16h</option>

                                </select>                      </div>



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
        $('#extra_input').attr('required', true);
      } else {
        $('#extraInputContainer').hide();
        $('#extra_input').removeAttr('required').val('');
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