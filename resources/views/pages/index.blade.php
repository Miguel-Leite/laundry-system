@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">4</h3>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <span class="mdi mdi-account-settings icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Funcionarios</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">34</h3>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-warning">
                <span class="mdi mdi-account-multiple  icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Clientes</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">34</h3>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-primary">
                <span class="mdi mdi-format-line-style  icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Vestuarios</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">53</h3>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-info ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Peças para entrega</h6>
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Gráfico dos pagamentos mensais</h4>
        <canvas id="areaChart" style="height:250px"></canvas>
      </div>
    </div>
  </div>
@endsection