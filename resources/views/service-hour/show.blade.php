@extends('layouts.app-admin', ["current" => "service-hours"])

@section('title', 'Horários de Serviços')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Blank page
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#">Horários de Serviços</a></li>
        <li class="active">Detalhes</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Detalhes do Horário de Serviço</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <p>Data de Criação: {{$serviceHour->createdate}}</p>
            <p>Descrição: {{$serviceHour->description}}</p>
            <p>Período: {{$serviceHour->period_id}}</p>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ '/horario-de-servicos' }}" class="btn btn-default btn-sm">Voltar</a>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->

@endsection