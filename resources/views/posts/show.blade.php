@extends('layaout.app')
@php
$title='show'
@endphp
@section('contents')
<div class="container mx-auto">
  <div class="w-1/2 mx-auto mt-5 bg-white shadow-md rounded-lg overflow-hidden">
    <div class="bg-gray-100 p-4">
      <h5 class="text-lg font-semibold">Post Info</h5>
    </div>
    <div class="p-4">
      <h5 class="text-lg font-semibold">Title: {{$post->title}}</h5>
      <p class="text-gray-700">Description: {{$post->description}}</p>
    </div>
  </div>

  <div class="w-1/2 mx-auto mt-5 bg-white shadow-md rounded-lg overflow-hidden">
    <div class="bg-gray-100 p-4">
      <h5 class="text-lg font-semibold">Post Creator Info</h5>
    </div>
    <div class="p-4">
      <h3 class="text-lg font-semibold">Name: {{$post->user->name}}</h3>
      <h5 class="text-md font-semibold">Email: {{$post->user->email}}</h5>
      <p class="text-gray-700">Created At: {{$post->created_at->toDayDateTimeString()}}</p>
    </div>
  </div>
</div>
@endsection