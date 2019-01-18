@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <a href="#"><i class="fa fa-dashboard"></i> Thêm bàn</a>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                @foreach($devices as $item)
                    <?php
                    if ($item->status == 1) {
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
                    }
                    ?>
                    <div class="col-lg-6 col-xs-6">
                        <!-- small box -->
                        <div class="small-box {{$class}}">
                            <div class="inner">
                                <h3>{{$title}}</h3>

                                <p>{{$item->name}}</p>
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
