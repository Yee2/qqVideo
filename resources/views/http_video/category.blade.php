@extends('http_video.layout')
@section('title', $cateName.'_第'.$page.'页')
@section('seo_keywords', $cateName)
@section('body')
    @include('video.category')
@endsection