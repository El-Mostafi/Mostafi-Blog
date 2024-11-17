@extends('layaout.app')
@php
$title='edite';
@endphp
@section('contents')
@livewire('form-update',['title'=>$mypost])
@endsection
