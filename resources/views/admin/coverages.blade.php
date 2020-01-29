@extends('admin.layouts.layout')

@section('css')

@endsection

@section('content')
<div class="page-wrapper" style="min-height: 319px;">
  <div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-8 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0 d-inline-block">
          <a>Тип покрытия</a>
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
                    <input type="text" class="form-control" name="tc_name" />
                  </div>
                  <div class="form-group col-lg-3">
                    <label>Сортировка</label>
                    <input type="number" class="form-control" name="tc_sort_num" />
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
                @foreach ($coverages as $value)
                <tr>
                  <td>{{ $value->tc_id }}</td>
                  <td>{{ $value->tc_name }}</td>
                  <td>{{ $value->tc_sort_num }}</td>
                  <td>
                    <a href="javascript:void(0)" onclick="remove(this,'{{ $value->tc_id }}','coverages')">
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
    $.post("/admin/coverages", {
      tc_name: $('input[name=tc_name]').val(),
      tc_sort_num: $('input[name=tc_sort_num]').val(),
      _token: '{{csrf_token()}}'
    }, function (response) {
      $('tbody').append(
        "<tr><td>" + response.tc_id + "</td>" +
        "<td>" + response.tc_name + "</td>" +
        "<td>" + response.tc_sort_num + "</td>" +
        "<td><a href=\"javascript:void(0)\" onclick=\"remove(this,'" + response.tc_id + "','coverages')\"><i class=\"fas fa-trash\"></i></a></td></tr>"
      );
    });
  });
</script>
@endsection