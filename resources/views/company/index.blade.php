@extends('layouts.app')

@section('content')

<div class="container">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
    <div align="right">
      <span ><a href="{{ route('company.create') }}" class="btn btn-success">Add New Company</a></span>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <table class="table table-striped">

            <thead>
              <th>Company Name</th>
              <th>Email</th>
              <th>Logo</th>
              <th>Website</th>
              <th>Assets</th>
              <th>Actions</th>
            </thead>
            <tbody>
            @foreach($companies as $company)
                    <tr>
                      <td>{{$company->name}} </td>
                      <td>{{$company->email}} </td>
                      @if($company->logo != null)         
                        <td><img src="/storage/{{$company->logo}}"/></td>         
                      @else
                        <td>&nbsp;</td>        
                      @endif
                      <td><a href="{{ $company->website }}" target="_blank">{{ $company->website}}</a> </td>
                      <td>
                         <table class="table table-striped">
                          <thead>
                            <th>Model</th>
                            <th>Description</th>
                            <th>Value</th>
                           </thead>
                          <tbody> 
                              @foreach($company->assets as $asset)
                               <tr> 
                                <td>{{$asset->model}} </td>
                                <td>{{$asset->description}} </td>
                                <td>R{{$asset->asset_value}} </td>
                               </tr> 
                              @endforeach
                          </tbody>
                          </table>    
                      </td>
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
