@extends('admin.layouts.layout')

@section('css')
<style>
    .active-top-show {
        background-color: #fff !important;
    }

    #nav-tabContent {
        padding-top: 10px;
    }
</style>
@endsection

@section('content')
<div class="page-wrapper" style="min-height: 319px;">
    <div class="container-fluid">
        <div class="row page-titles">
            <div class="col-md-8 col-8 align-self-center">
                <h3 class="text-themecolor m-b-0 m-t-0">
                    Добавить вид спорта
                </h3>
            </div>
            <div class="col-md-4 col-4 align-self-center text-right">
                <a href="/admin/sporttype" class="btn btn-danger">Назад</a>
            </div>
        </div>
        <div class="row">
            @if(empty($sporttype))
            <form class="col-lg-12 col-md-12 row" action="/admin/sporttype" method="POST" enctype="multipart/form-data">
                @else
                <form class="col-lg-12 col-md-12 row" action="/admin/sporttype/{{ $sporttype->st_id }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @endif
                    @csrf
                    <div class="col-lg-8 col-md-12">
                        <div class="card">
                            <div class="card-block">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="box-body">
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="form-group">
                                            <label>Название</label>
                                            <input type="text" class="form-control" name="st_name"
                                                value="{{ !empty($sporttype) ? $sporttype->st_name : old('st_name') }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>Сортировка</label>
                                            <input type="number" class="form-control" name="st_sort_num"
                                                value="{{ !empty($sporttype) ? $sporttype->st_sort_num : old('st_sort_num') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="box box-primary" style="padding: 30px; text-align: center">
                                    <div class="tab-pane fade show active" id="img-ru" role="tabpanel"
                                        aria-labelledby="img-ru-tab">
                                        <div style="padding: 20px; border: 1px solid #c2e2f0">
                                            <img class="image-src" id="blah1"
                                                src="{{ !empty($sporttype) ? $sporttype->st_img : old('st_img') }}"
                                                style="width: 100%; " />
                                        </div>
                                        <div style="background-color: #c2e2f0;height: 40px;margin: 0 auto;width: 2px;">
                                        </div>
                                        <label class="btn btn-primary label-img" for="imgInp1">
                                            <input id="imgInp1" type="file" name="st_img" class="d-none">
                                            <i class="fa fa-plus"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 text-right">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                inpid = $(input).attr('id');
                inpid = inpid[inpid.length - 1];
                imgId = '#blah' + inpid;
                $(imgId).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp1").change(function () {
        readURL(this);
    });
</script>
@endsection