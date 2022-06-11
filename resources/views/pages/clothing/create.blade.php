@extends('layouts.app')

@section('title','Adicionar usuario')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Adicionar novo vestuario no sistema</h4>
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
                <form class="forms-sample" method="POST" action="{{ route('pages.clothingCreate') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="clothing_name">Nome</label>
                        <input type="text" class="form-control" name="clothing_name" id="clothing_name" placeholder="Nome completo">
                    </div>
                    <div class="form-group">
                        <label for="color">Cor</label>
                        <input type="text" class="form-control" name="color" id="color" placeholder="Cor do vestuario">
                    </div>
                    <div class="form-group">
                        <label for="size">Tamanho</label>
                        <input type="number" class="form-control" name="size" id="size" placeholder="Tamanho do vestuario">
                    </div>
                    <div class="form-group">
                        <label for="iron">Ferro</label>
                        <input type="text" class="form-control" name="iron" id="iron" placeholder="Ferro">
                    </div>
                    <div class="form-group">
                        <label>Foto do vestuario</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Carregar uma foto">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Carregar</button>
                          </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="categories_id">Categoria</label>
                        <select name="categories_id" id="categories_id" class="form-control">
                            <option selected disabled>Selecione uma categoria...</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="fabrics_id">Tecido</label>
                        <select name="fabrics_id" id="fabrics_id" class="form-control">
                            <option selected disabled>Selecione um tecido...</option>
                            @foreach($fabrics as $fabric)
                                <option value="{{ $fabric->id }}">{{ $fabric->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Descrição</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <br>
                    <h5>Dados do cliente</h5>  
                    <hr class="bg-light">
                    <div class="form-group">
                        <label for="client_name">Nome do cliente</label>
                        <input type="text" class="form-control" name="client_name" id="clothing_name" placeholder="Nome completo">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail do cliente</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Endereço e-mail">
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefone do cliente</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Nº de telefone">
                    </div>
                    <div class="form-group">
                        <label for="address">Endereço do cliente</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Endereço">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success col-12 py-3">Adicionar</button>
                </form>
              </div>
            </div>
        </div>
    </div>

@endsection