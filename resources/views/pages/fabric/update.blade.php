@extends('layouts.app')

@section('title','Actualizar categoria')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Actualizar tecido no sistema</h4>
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
                <form class="forms-sample" method="POST" action="{{ route('pages.fabricCreate') }}" enctype="multipart/form-data">
                  @csrf  
                  <div class="form-group">
                    <label for="exampleInputUsername1">Nome</label>
                    <input type="text" class="form-control" name="name" id="exampleInputUsername1" placeholder="Nome completo">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputDescription">Descrição</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary col-12 py-3">Adicionar</button>
                </form>
              </div>
            </div>
        </div>
    </div>

@endsection