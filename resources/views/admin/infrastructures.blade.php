@extends('admin.layouts.layout')

@section('css')

@endsection

@section('content')
<div class="page-wrapper" style="min-height: 319px;">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0 d-inline-block">
          <a>Инфраструктура</a>
        </h3>
      </div>
    </div>
    <div class="row white-bg">
      <div class="col-md-12">
        <div class="box-body">
          <div class="col-lg-12 col-md-12">
            <div class="card">
              <div class="card-block">
                <div class="box-body d-flex align-items-center">
                  <div class="form-group col-lg-3">
                    <label>Название</label>
                    <input type="text" class="form-control" name="inf_name" />
                  </div>
                  <div class="form-group col-lg-3">
                    <label>Сортировка</label>
                    <input type="number" class="form-control" name="inf_sort_num" />
                  </div>
                  <div class="form-group col-lg-3 m-b-0">
                    <button id="send" class="btn btn-primary">Сохранить</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table id="showed" class="table table-bordered table-striped">
              <thead>
                <tr style="border: 1px">
                  <th style="width: 30px">№</th>
                  <th>Название</th>
                  <th>Сортировка</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                @foreach ($infrastructures as $value)
                <tr>
                  <td>{{ $value->inf_id }}</td>
                  <td>{{ $value->inf_name }}</td>
                  <td>{{ $value->inf_sort_num }}</td>
                  <td>
                    <a href="javascript:void(0)" onclick="remove(this,'{{ $value->inf_id }}','infrastructures')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
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
<script>
  $('#send').click(function () {
    $.post("/admin/infrastructures", {
      inf_name: $('input[name=inf_name]').val(),
      inf_sort_num: $('input[name=inf_sort_num]').val(),
      _token: '{{csrf_token()}}'
    }, function (response) {
      $('tbody').append(
        "<tr><td>" + response.inf_id + "</td>" +
        "<td>" + response.inf_name + "</td>" +
        "<td>" + response.inf_sort_num + "</td>" +
        "<td><a href=\"javascript:void(0)\" onclick=\"remove(this,'" + response.inf_id + "','infrastructures')\"><i class=\"fas fa-trash\"></i></a></td></tr>"
      );
    });
  });
</script>
@endsection