@extends('businessTemplate.app')

@section('content')
<button class="mt-3 btn btn-primary" onClick="history.back()">Atgal</button>
<hr/>
<h1 class="mt-4">{{ __('Įmonės informacija') }}</h1>
<ul>
    <li>{{ __('Pavadinimas:')}} {{$business->title}}</li>
    <li>{{ __('Kodas:')}} {{$business->code}}</li>
    <li>{{ __('PVM Kodas:')}} {{$business->vat_code}}</li>
    <li>{{ __('Adresas:')}} {{$business->address}}</li>
    <li>{{ __('Tel. numeris:')}} {{$business->phone}}</li>
    <li>{{ __('El. paštas:')}} {{$business->email}}</li>
    <li>{{ __('Veikla:')}} {{$business->activity}}</li>
    <li>{{ __('Vadovas:')}} {{$business->manager}}</li>
</ul>
@if($business->user_id == Auth::id())
<hr/>
<a href="/business/update/{{ $business->id }}" class="btn btn-success">{{ __('Redaguoti') }}</a>
<a href="/business/delete/{{ $business->id }}" class="btn btn-danger" onClick="confirm('Ar tikrai?');">{{ __('Šalinti') }}</a>
@endif
@endsection