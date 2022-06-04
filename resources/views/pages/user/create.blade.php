@extends('layouts.app')

@section('title','Adicionar usuario')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Adicionar novo usuario no sistema</h4>
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
                <form class="forms-sample" method="POST" action="{{ route('pages.userCreate') }}" enctype="multipart/form-data">
                  @csrf  
                  <div class="form-group">
                        <label>Foto do usuario</label>
                        <input type="file" name="avatar" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Carregar uma foto">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Carregar</button>
                          </span>
                        </div>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Nome completo</label>
                    <input type="text" class="form-control" name="name" id="exampleInputUsername1" placeholder="Nome completo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputUsername1">Endereço</label>
                    <input type="text" class="form-control" name="address" id="exampleInputUsername1" placeholder="Endereço">
                  </div>
                  <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                      <input type="checkbox" name="isAdmin" class="form-check-input"> Administrador </label>
                  </div>
                  <button type="submit" class="btn btn-primary mr-2">Adicionar</button>
                </form>
              </div>
            </div>
        </div>
    </div>

@endsection