@extends('http_m_se.layout')
@section('title', $info->title)
@section('body')
    <div class="col-xs-12">
        <div class="panel panel-default contentLeft">
            <div class="panel-header">
                <div class="col-xs-12">
                    <ol class="breadcrumb">
                        <li>
                            <a href="./">首页</a>
                        </li>
                        <li>
                            <a href="{{route('se.category', ['id' => $info->type_id])}}">{{$info['typeName']}}</a>
                        </li>
                        <li class="active">{{$info->title}}</li>
                    </ol>
                </div>
            </div>
            <div class="panel-body dataInfo">
                <div class="panel-body">
                    <div class="row">
                        <video src="{{$info->file_url}}" controls="controls" style="width: 100%;" autoplay="true"></video>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection