@extends('admin.adminlayout')

@section('page-header')
    Dashboard <small>Home</small>
@stop

@section('content')

    <div class="row" >
        <div class="col-md-12">
            <div class="panel panel-default"  >
                <div class="panel-body" >
                    Welcome {{ Auth::user()->name }} !!! It is me :)
                </div>
            </div>
        </div>
    </div>
@stop
