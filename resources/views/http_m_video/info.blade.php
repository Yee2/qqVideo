@extends('http_m_video.layout')
@section('title', $info->title)
@section('seo_keywords', $info->title.','.$info->tags)
@section('seo_description', $info->descript)
@section('body')
    @include("m_video.info")
@endsection