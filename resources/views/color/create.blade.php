@extends('layouts.app-admin', ["current" => "cores"])

@section('title', 'Cores')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Blank page
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Cores</a></li>
    <li class="active">Novo</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <form action="/categorias" method="POST" role="form">
    @csrf
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Nova Cor</h3>

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
                    <label for="name">Nome</label>
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Digite aqui o nome da cor.">
                        @if($errors->has('name'))
                            <div class="text-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="code">Código</label>
                    <div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
                        <input type="text" class="form-control" id="code" name="code" placeholder="Digite aqui o código da cor.">
                        @if($errors->has('code'))
                            <div class="text-danger">
                                {{ $errors->first('code') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
      <!-- /.box-body -->
        <div class="box-footer">
            <a href="{{ '/cores' }}" class="btn btn-default btn-sm">Voltar</a>
            <button type="submit" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Salvar</button>
        </div>
        <!-- /.box-footer-->
    </div>
      <!-- /.box -->
  </form>
</section>
<!-- /.content -->

@endsection