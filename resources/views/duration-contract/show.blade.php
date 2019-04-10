@extends('layouts.app-admin', ["current" => "duration-contract"])

@section('title', 'Durações de Contratos')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Blank page
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Durações de Contratos</a></li>
        <li class="active">Detalhes</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Detalhes da Duração de Contrato</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <p>Data de Criação: {{$durationContract->createdate}}</p>
            <p>Descrição: {{$durationContract->description}}</p>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a href="{{ '/durationcontracts' }}" class="btn btn-sm btn-default">Voltar</a>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection