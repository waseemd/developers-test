@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <table class="table table-hover">

            <thead>

              <th>Company Name</th>

              <th>Email</th>

              <th>Website</th>

              <th>Actions</th>

            </thead>

            <tbody>
            @foreach($companies as $company)

                    <tr>

                      <td>{{$company->name}} </td>

                      <td>{{$company->email}} </td>

                      <td><a href="{{ $company->website }}">{{ $company->website}}</a> </td>

                      <td><a href="{{ route('company.edit', $company->id) }}" class="btn btn-default">Edit</a></td>
                    </tr>
            @endforeach

            </tbody>

        </table>
        {{ $companies->links() }} 
        </div>
    </div>
</div>
@endsection
