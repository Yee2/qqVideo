@extends('http_video.layout')
@section('title', $cateName.'_第'.$page.'页')
@section('seo_keywords', $cateName)
@section('body')
    @if(!$data['isMobile'])
        @include('m_video.category')
    @else
        @include('video.category')
    @endif
@endsection