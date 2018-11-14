@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
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
      <form method="post" action="{{ route('company.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
          <div class="form-group">
              <label for="name">Company Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="email">Company Email :</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="logo">Company Logo :</label>
              <input type="file" class="form-control" name="logo">
          </div>
          <div class="form-group">
              <label for="website">Company Website:</label>
              <input type="text" class="form-control" name="website"/>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection
