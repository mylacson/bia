@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <a href="#"><i class="fa fa-plus"></i> Thêm bàn</a>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {{ Session::get('success') }}
                        </div>
                    @elseif(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> {{__('Thông Báo')}}:</h4>
                            {!! Session::get('error') !!}
                        </div>
                    @elseif(isset($errorMsg))
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4><i class="icon fa fa-ban"></i> {{__('Thông Báo')}}:</h4>
                            {!! $errorMsg !!}
                        </div>
                    @endif
                </div>
                @foreach($devices as $k=> $item)
                    <?php
                    $url = '';
                    if ($item->status == 2) {
                        $class = 'bg-aqua';
                        $title = 'Đang chơi';
                        $icon = 'fa-map-pin';
                    } else if ($item->status == 3) {
                        $class = 'bg-red';
                        $title = 'Đang sửa chữa';
                        $icon = 'fa-times';
                    } else {
                        $class = 'bg-yellow';
                        $title = 'Chưa chơi';
                        $icon = 'ion-person-add';
                        $url = route('startDevice',['id'=>$item->id]);
                    }
                    ?>
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box {{$class}}" urlStart="{{$url}}">
                            <div class="inner">
                                <h3 class="name">{{$item->name}}</h3>
                                <p time-start="{{!empty($item->getPost())?$item->getPost()->time_start:""}}">
                                    {{$title}}
                                </p>
                            </div>
                            <div class="icon">
                                <i class="fa {{$icon}}"></i>
                            </div>
                            <a href="#" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                @endforeach
                {{--<!-- ./col -->--}}
                {{--<div class="col-lg-4 col-xs-6">--}}
                {{--<!-- small box -->--}}
                {{--<div class="small-box ">--}}
                {{--<div class="inner">--}}
                {{--<h3>Đang sửa chửa</h3>--}}

                {{--<p>Bàn 2</p>--}}
                {{--</div>--}}
                {{--<div class="icon">--}}
                {{--<i class="fa fa-times"></i>--}}
                {{--</div>--}}
                {{--<a href="#" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<!-- ./col -->--}}
                {{--<div class="col-lg-4 col-xs-6">--}}
                {{--<!-- small box -->--}}
                {{--<div class="small-box bg-yellow">--}}
                {{--<div class="inner">--}}
                {{--<h3>Chưa chơi</h3>--}}

                {{--<p>Bàn 3</p>--}}
                {{--</div>--}}
                {{--<div class="icon">--}}
                {{--<i class="ion ion-person-add"></i>--}}
                {{--</div>--}}
                {{--<a href="#" class="small-box-footer">Chi tiết <i class="fa fa-arrow-circle-right"></i></a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<!-- ./col -->--}}

            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
