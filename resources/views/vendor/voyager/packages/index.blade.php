@extends('voyager::master')

@section('page_title', 'Packages')

@section('content')
  <h1>Packages</h1>

    <!-- Add New Button -->
  <a href="{{ route('admin.packages.create') }}" class="btn btn-success">
      Add New
  </a>

  <!-- Display Existing Tools -->
  @if ($packages->isNotEmpty())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Tools Included</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($packages as $package)
                <tr>
                    <td>{{ $package->name }}</td>
                    <td>{{ $package->description }}</td>
                    <td>{{ $package->price }}</td>
                    <td>
                        @foreach ($package->tools_included as $include)
                            <div class="flex border-0">
                                <div>
                                    <img src="{{asset($include->image)}}">
                                </div>
                                <div>
                                    {{$include->title}}
                                </div>
                            </div>
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.packages.edit', $package->id) }}" class="btn btn-primary">
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