@extends('layouts.app')

@section('title','Adicionar usuario')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Adicionar nova encomenda no sistema</h4>
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
                <form class="forms-sample" method="POST" action="{{ route('pages.toWashCreate') }}" enctype="multipart/form-data">
                  @csrf  
                  <div class="form-group">
                    <label for="start_date">Data de inicio</label>
                    <input type="date" class="form-control" name="start_date" id="start_date" placeholder="Data de inicio">
                  </div>
                  <div class="form-group">
                    <label for="end_date">Data final</label>
                    <input type="date" class="form-control" name="end_date" id="end_date" placeholder="Data final">
                  </div>
                  <div class="form-group">
                    <label for="returnned_to_the_client_date">Data da entrega</label>
                    <input type="date" class="form-control" name="returnned_to_the_client_date" id="returnned_to_the_client_date" placeholder="Data da entrega">
                  </div>
                  <div class="form-group">
                    <label for="total_paid">Total pago</label>
                    <input type="number" class="form-control" name="total_paid" id="total_paid" placeholder="Total pago: ">
                  </div>
                  <div class="form-group">
                    <label for="clothings_id">Vestuario</label>
                    <select name="clothings_id" id="clothings_id" class="form-control">
                        <option selected disabled>Selecione o vestuario...</option>
                        @foreach ($clothings as $clothing)
                        <option value="{{ $clothing->id }}"><b>Vestuario: </b>{{ $clothing->name }} - <b>Cliente: </b>{{ $clothing->clientname }}</option>                            
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="services_id">Serviço</label>
                    <select name="services_id" id="services_id" class="form-control">
                        <option selected disabled>Selecione o serviço...</option>
                        @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>                            
                        @endforeach
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary col-12 py-3">Adicionar</button>
                </form>
              </div>
            </div>
        </div>
    </div>

@endsection