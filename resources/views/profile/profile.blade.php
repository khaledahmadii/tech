@extends('layouts.app')
@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Apropos de moi</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Nom d'utilisateur</strong>

                <p class="text-muted">
                  {{$profile->login}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Nom et Prenom</strong>

                <p class="text-muted">{{$profile->nom}} {{$profile->prenom}}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Type</strong>

                <p class="text-muted">  
                    {{ $profile->role }}
                </p>

                <hr>

                <strong><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-password">
                    <i class="far fa-file-alt mr-1"></i> Changer mot de passe
                </button></strong>

              </div>
              <!-- /.card-body -->
            </div>

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
                    <input type="hidden" name="id" id="password-compte-id" value="{{ $profile->id }}">
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