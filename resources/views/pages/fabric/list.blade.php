@extends('layouts.app')

@section('title','Listar usuario')

@section('content')
<a href="{{ route('pages.fabricCreate') }}" class="btn btn-primary mb-3">Adicionar novo tecido</a>
<div class="row justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th style="width: 800px;">Tecido</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($fabrics as $fabric)  
                            <tr title="{{ $fabric->description }}">
                                <td scope="row">{{ $fabric->id }}</td>
                                <td>{{ $fabric->name }}</td>
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