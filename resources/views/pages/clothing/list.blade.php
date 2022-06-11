@extends('layouts.app')

@section('title','Listar usuario')

@section('content')
<a href="{{ route('pages.clothingCreate') }}" class="btn btn-primary mb-3">Adicionar novo vestuario</a>
<div class="row justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Vestuario</th>
                              <th>Cor</th>
                              <th>Tamanho</th>
                              <th>Ferro</th>
                              <th>Cliente</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($clothings as $clothing)   
                          <tr>
                              <td scope="row">{{ $clothing->id }}</td>
                              <td>{{ $clothing->name }}</td>
                              <td>{{ $clothing->color }}</td>
                              <td>{{ $clothing->size }}</td>
                              <td>{{ $clothing->iron }}</td>
                              <td>{{ $clothing->clientname }}</td>
                              <td>
                                  <a href="#" class="btn btn-info"> <i class="mdi mdi-lead-pencil"></i> </a>
                                  <a href="#" class="btn btn-danger"> <i class="mdi mdi-delete"></i> </a>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
    </div>
@endsection