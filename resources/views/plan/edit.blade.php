@extends('layouts.app-admin', ["current" => "plans"])

@section('title', 'Planos')

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Blank page
    <small>it all starts here</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#">Planos</a></li>
    <li class="active">Editar</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
    <form action="/planos/{{ $plan->id }}" method="POST" role="form">
        @csrf
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Plano</h3>

                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label for="description">Descrição</label>
                <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                    <input type="text" class="form-control" id="description" name="description" placeholder="Digite aqui a descrição."
                    value="{{$plan->description}}">
                    @if($errors->has('description'))
                        <div class="text-danger">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="price">Preço</label>
                <div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
                    <input type="number" class="form-control" id="price" name="price" placeholder="Digite aqui o preço."
                    value="{{$plan->price}}">
                        @if($errors->has('price'))
                            <div class="text-danger">
                                {{ $errors->first('price') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a href="{{ '/planos' }}" class="btn btn-default btn-sm">Voltar</a>
                <button type="submit" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Salvar</button>
            </div>
        <!-- /.box-footer-->
        </div>
      <!-- /.box -->
    </form>
</section>
<!-- /.content -->

@endsection