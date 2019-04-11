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
        <li class="active">Horários de Serviços</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Horários de Serviços</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            @if(count($serviceHours) > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th class="text-center">Descrição</th>
                        <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($serviceHours as $serviceHour)
                            <tr>
                                <td class="text-center">{{ $serviceHour->description }}</td>
                                <td class="text-center">
                                    <a href="/horario-de-servicos/{{ $serviceHour->id }}/detalhes" class="btn btn-sm btn-default">Detalhes</a>
                                    <a href="/horario-de-servicos/editar/{{ $serviceHour->id }}" class="btn btn-sm btn-info">Editar</a>
                                    <a href="/horario-de-servicos/deletar/{{ $serviceHour->id }}" class="btn btn-sm btn-danger">Excluír</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4>Nenhum horário de serviço foi registrado!</h4>
            @endif
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a href="{{ '/horario-de-servicos/criar' }}" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Horário de Serviço</a>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection