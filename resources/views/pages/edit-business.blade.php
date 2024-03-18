@extends('businessTemplate.app')

@section('content')
<h1 class="mt-4">{{ __('Redaguoti įmonę') }}</h1>
@include('businessTemplate/_partials/errors')
<div class="row">
<form method="POST" action="/business/update/{{$business->id}}/save">
       @csrf
      <div class="mb-3">
      <label for="name" class="form-label">Pavadinimas</label>
        <input type="text" class="form-control" id="name" name="title" value="{{$business->title}}">
      </div>
      <div class="mb-3">
      <label for="code" class="form-label">Įmonės kodas</label>
        <input type="text" class="form-control" id="code" name="code" value="{{$business->code}}">
      </div>
      <div class="mb-3">
      <label for="vatCode" class="form-label">PVM kodas</label>
        <input type="text" class="form-control" id="vatCode" name="vat_code" value="{{$business->vat_code}}">
      </div>
      <div class="mb-3">
        <label for="adress" class="form-label">Adresas</label>
        <input type="text" class="form-control" id="adress" name="address" value="{{$business->address}}">
      </div>
      <div class="mb-3">
      <label for="phone" class="form-label">Tel. numeris</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{$business->phone}}">
      </div>
      <div class="mb-3">
      <label for="email" class="form-label">El. paštas</label>
        <input type="email" class="form-control" id="email" name="email" value="{{$business->email}}">
      </div>
      <div class="mb-3">
      <label for="activity" class="form-label">Veikla</label>
        <input type="text" class="form-control" id="activity" name="activity" value="{{$business->activity}}">
      </div>
      <div class="mb-3">
      <label for="manager" class="form-label">Vadovas</label>
        <input type="text" class="form-control" id="manager" name="manager" value="{{$business->manager}}">
      </div>
      <button type="submit" name="save" class="btn btn-primary">{{ __('Saugoti' )}}</button>
    </form>
</div>
@endsection