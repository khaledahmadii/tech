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
                                <label for="notre" class="form-label">Grille</label>
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

