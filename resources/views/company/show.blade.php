@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
  <div class="card-header">
    Add Company
  </div>
  <div class="row">
          <div class="form-group">
              <label for="name">Company Name:</label>
              <input type="text" class="form-control" name="name" value={{ $company->name }} >
          </div>
          <div class="form-group">
              <label for="email">Company Email :</label>
              <input type="text" class="form-control" name="email"  value={{ $company->email }}>
          </div>
          <div class="form-group">
              <label for="website">Company Website:</label>
              <input type="text" class="form-control" name="website" value={{ $company->website }}>
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
  </div>
</div>
@endsection