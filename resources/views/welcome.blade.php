@extends('businessTemplate.app')

@section('content')
<h1 class="mt-4">Įmonės paieška</h1>
@include('businessTemplate/_partials/errors')
<div class="row">
<form action="/" method="POST">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ieškokite įmonės pagal kodą, pvm kodą, pavadinimą.</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="search" aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Ieškoti</button>
</form>
</div>

@if (Request::isMethod('post'))
    @if(count($results) > 0)
    <h3 class="mt-3">Paieškos rezultatai:</h3>
    <ul>
            @foreach ($results as $result)
                <li><a href="/business/{{ $result->id }}">{{ $result->title }}</a></li>
            @endforeach
        </ul>
    @else
        <p>Nieko nerasta, patikslinkite paiešką!</p>
    @endif
@endif

@endsection