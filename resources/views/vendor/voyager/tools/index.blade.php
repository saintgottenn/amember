@extends('voyager::master')

@section('content')
    <h1>Products(Tools) Dashboard</h1>

    <!-- Add New Button -->
    <a href="{{ route('admin.tools.create') }}" class="btn btn-success">
        Add New
    </a>

    <!-- Display Existing Tools -->
    @if ($tools->isNotEmpty())
      <table class="table table-bordered">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Image</th>
                  <th>Link</th>
                  <th>Benefits</th>
                  <th>Description</th>
                  <th>Actions</th>
              </tr>
          </thead>
          <tbody>
              @foreach($tools as $tool)
                  <tr>
                      <td>{{ $tool->id }}</td>
                      <td>{{ $tool->name }}</td>
                      <td>{{ $tool->slug }}</td>
                      <td><img src="{{ asset($tool->image) }}" width="100px"></td>
                      <td>{{ $tool->link }}</td>
                      <td>{{ $tool->benefits }}</td>
                      <td>{{ $tool->description }}</td>
                      <td>
                          <a href="{{ route('admin.tools.edit', $tool->id) }}" class="btn btn-primary">
                              Edit
                          </a>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
    @else
      <div class="alert alert-warning text-center">Nothing found</div>
    @endif
@endsection