@extends('layouts.app')

@section('title','Listar usuario')

@section('content')
<a href="{{ route('pages.toWashCreate') }}" class="btn btn-primary mb-3">Adicionar nova encomenda</a>
<div class="row justify-content-center">
        <div class="col-md-12 col-xs-12 col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>Data de inicio</th>
                              <th>Data final</th>
                              <th>Data da entrega</th>
                              <th>Cliente</th>
                              <th>Vestuario</th>
                              <th>Serviço</th>
                              <th>Total</th>
                              <th></th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($toWashs as $toWash)
                          <tr>
                              <td>{{ $toWash->start_date }}</td>
                              <td>{{ $toWash->end_date }}</td>
                              <td>{{ $toWash->returnned_to_the_client_date }}</td>
                              <td>{{ $toWash->clientname }}</td>
                              <td>{{ $toWash->clothingname }}</td>
                              <td>{{ $toWash->servicename }}</td>
                              <td>{{ $toWash->total }}</td>
                              <td>
                                  <a href="#" class="btn btn-primary" title="Imprimir comprovativo"> <i class="mdi mdi-printer"></i> </a>
                                  <a href="#" class="btn btn-info"  title="Editar encomenda"> <i class="mdi mdi-lead-pencil"></i> </a>
                                  <a href="#" class="btn btn-danger"  title="Apagar encomenda"> <i class="mdi mdi-delete"></i> </a>
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