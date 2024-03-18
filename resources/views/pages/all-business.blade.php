@extends('businessTemplate.app')

@section('content')
<h1 class="mt-4">{{ __('Visos įmonės') }}</h1>
 @if($companies)
      <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Pavadinimas</th>
          <th scope="col">Adresas</th>
          <th scope="col">El. paštas</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($companies as $value)
          <tr>
            <td>{{ $value->id }}</td>
            <td><a href="/business/{{ $value->id }}">{{ $value->title }}</a></td>
            <td>{{ $value->address }}</td>
            <td>{{ $value->email }}</td>
            <td>
              @if($value->user_id == Auth::id())
              <a href="/business/update/{{ $value->id }}" class="btn btn-success">{{ __('Redaguoti') }}</a>
              <a href="/business/delete/{{ $value->id }}" class="btn btn-danger" onClick="confirm('Ar tikrai?');">{{ __('Šalinti') }}</a>
              @endif
            </td>
          </tr>
       @endforeach
        </tbody>
        </table>
        {{ $companies->links() }}
    @else
    <h1 class="mt-5">Sąrašas tuščias, pridėkite įmonę.</h1>
    @endif
@endsection