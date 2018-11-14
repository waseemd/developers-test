@extends('layouts.app')

@section('content')
<div class="container">
  <div class="header">
    Add Company
  </div>
  <div class="row">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('company.update', $company->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
          <div class="form-group">
              <label for="name">Company Name:</label>
              <input type="text" class="form-control" name="name" value={{ $company->name }}>
          </div>
          <div class="form-group">
              <label for="email">Company Email :</label>
              <input type="text" class="form-control" name="email"  value={{ $company->email }}>
          </div>
          <div class="form-group">
              <label for="logo">Company Logo :</label>
              <input type="file" class="form-control" name="logo">
          </div>
          <div class="form-group">
              <label for="website">Company Website:</label>
              <input type="text" class="form-control" name="website" value={{ $company->website }}>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection