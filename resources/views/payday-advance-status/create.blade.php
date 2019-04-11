@extends('layouts.app-admin', ["current" => "payday-advance"])

@section('title', 'Status dos Vales')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Blank page
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Status dos Vales</a></li>
    <li class="active">Novo</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <form action="/status-dos-vales" method="POST" role="form">
    @csrf
    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Novo Status do Vale</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
          <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="box-body">
          <div class="form-group">
            <label for="description">Descrição</label>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
            <input type="text" class="form-control" id="description" name="description" placeholder="Digite aqui o status do pedido.">
            @if($errors->has('description'))
              <div class="text-danger">
                {{ $errors->first('description') }}
              </div>
            @endif
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="{{ '/status-dos-vales' }}" class="btn btn-default btn-sm">Voltar</a>
        <button type="submit" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Salvar</button>
      </div>
      <!-- /.box-footer-->
    </div>
      <!-- /.box -->
  </form>
</section>
<!-- /.content -->

@endsection