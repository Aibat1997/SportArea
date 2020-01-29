@extends('admin.layouts.layout')

@section('css')
<style>
td img{
  width: 85px;
  height: 85px;
}
</style>
@endsection

@section('content')
<div class="page-wrapper" style="min-height: 319px;">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0 d-inline-block">
          <a>Виды спорта</a>
        </h3>
      </div>
      <div class="col-md-4 col-4 align-self-center text-right">
        <a href="/admin/sporttype/create" class="btn btn-success">Добавить</a>
      </div>
    </div>

    <div class="row white-bg">
      <div class="col-md-12">
        <div class="box-body">
          <div class="table-responsive">
            <table id="showed" class="table table-bordered table-striped">
              <thead>
                <tr style="border: 1px">
                  <th style="width: 30px">№</th>
                  <th>Фото</th>
                  <th>Название</th>
                  <th>Дата</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach ($sporttype as $key=>$value)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td><img src="{{ $value->st_img }}" alt=""></td>
                  <td>{{ $value->st_name }}</td>
                  <td>{{ $value->updated_at }}</td>
                  <td>
                    <a href="javascript:void(0)" onclick="remove(this,'{{ $value->st_id }}','sporttype')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                  <td><a href="/admin/sporttype/{{ $value->st_id }}/edit"><i class="fas fa-pen"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('js')
@endsection