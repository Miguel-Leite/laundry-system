@extends('layouts.app')

@section('title','Listar usuario')

@section('content')
<a href="{{ route('pages.userCreate') }}" class="btn btn-primary mb-3">Adicionar novo usuario</a>
<div class="row justify-content-center">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Nome</th>
                              <th>Email</th>
                              <th>Endereço</th>
                              <th>Administrador</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($users as $user)
                          <tr>
                              <td scope="row">{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->address }}</td>
                              <td> @if ($user->isAdmin > 0) Sim @else Não @endif </td>
                              <td>
                                  <a href="{{ route('pages.userUpdate',$user->id) }}" class="btn btn-info"> <i class="mdi mdi-lead-pencil"></i> </a>
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