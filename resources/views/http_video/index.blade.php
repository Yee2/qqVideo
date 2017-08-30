@extends('http_video.layout')
@section('title', '最新免费在线播放电影')
@section('seo_keywords', config('site.keywords'))
@section('seo_description', config('site.description'))
@section('body')
    @include('video.index')
@endsection