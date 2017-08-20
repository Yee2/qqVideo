@extends('http_m_video.layout')
@section('title', $cateName.'_第'.$page.'页')
@section('seo_keywords', $cateName)
@section('body')
    @include('m_video.category')
@endsection