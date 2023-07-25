@extends('layouts.layout')
@section('title')
    Explore | EventSync
@endsection

@section('content')
    @include('components.explore_navbar')
    @include('auth.sign_in')
    @include('auth.get_started')
@endsection
