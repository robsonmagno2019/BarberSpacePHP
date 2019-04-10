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
        <li class="active">Durações de Contratos</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Durações de Contratos</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            @if(count($durationContracts) > 0)
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                        <th class="text-center">Descrição</th>
                        <th class="text-center">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($durationContracts as $durationContract)
                            <tr>
                                <td class="text-center">{{ $durationContract->description }}</td>
                                <td class="text-center">
                                    <a href="/durationcontracts/{{ $durationContract->id }}/detalhes" class="btn btn-sm btn-default">Detalhes</a>
                                    <a href="/durationcontracts/editar/{{ $durationContract->id }}" class="btn btn-sm btn-info">Editar</a>
                                    <a href="/durationcontracts/deletar/{{ $durationContract->id }}" class="btn btn-sm btn-danger">Excluír</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4>Nenhuma categoria foi registrada!</h4>
            @endif
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <a href="{{ '/durationcontracts/criar' }}" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Duração de Contrato</a>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection