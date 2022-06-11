@extends('layouts.app')

@section('title','Adicionar usuario')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Adicionar novo serviço no sistema</h4>
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
                <form class="forms-sample" method="POST" action="{{ route('pages.serviceCreate') }}" enctype="multipart/form-data">
                  @csrf  
                  <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nome completo">
                  </div>
                  <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="number" class="form-control" name="price" id="price" placeholder="Preço do serviço">
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