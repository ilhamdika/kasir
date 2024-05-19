@extends('layouts.main',['title'=>'Dashboard'])
@section('content')
@can('admin')
<!-- @include('home.admin') -->
@include('home.manajer')
@elsecan('manajer')
@include('home.manajer')
@else
@include('home.kasir')
@endcan
@endsection