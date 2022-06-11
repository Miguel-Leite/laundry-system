@extends('layouts.app')

@section('title','Listar usuario')

@section('content')
<a href="{{ route('pages.serviceCreate') }}" class="btn btn-primary mb-3">Adicionar novo serviço</a>
<div class="row justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th style="width: 600px;">Serviço</th>
                              <th>Preço</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($services as $service)    
                          <tr title="{{ $service->description }}">
                              <td scope="row">{{ $service->id }}</td>
                              <td>{{ $service->name }}</td>
                              <td>{{ $service->price }}</td>
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