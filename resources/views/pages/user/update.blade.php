@extends('layouts.app')

@section('title','Actualizar usuario')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Adicionar actualizar usuario no sistema</h4>
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <strong>Sucesso: </strong>{{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('danger'))
                    <div class="alert alert-danger">
                        <strong>Falha: </strong>{{ session()->get('danger') }}
                    </div>
                @endif
                <form class="forms-sample" method="POST" action="{{ route('pages.userUpdate',$user->id) }}" enctype="multipart/form-data">
                  @csrf  
                  <div class="form-group">
                        <label>Foto do usuario</label>
                        <input type="file" name="avatar" value="{{ url("storage/$user->avatar") }}" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" value="{{ $user->avatar }}" disabled placeholder="Carregar uma foto">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Carregar</button>
                          </span>
                        </div>
                    </div>
                  <div class="form-group">
                    <label for="name">Nome completo</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" id="name" placeholder="Nome completo">
                  </div>
                  <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" id="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="address">Endereço</label>
                    <input type="text" class="form-control" name="address" value="{{ $user->address }}" id="address" placeholder="Endereço">
                  </div>
                  <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" name="isAdmin" class="form-check-input" @if ($user->isAdmin > 0) checked @endif> Administrador </label>
                  </div>
                  <button type="submit" class="btn btn-primary col-12 py-3">Adicionar</button>
                </form>
              </div>
            </div>
        </div>
    </div>

@endsection