@extends('voyager::master')

@section('page_title', 'Package edit')

@section('content')
  @push('css')
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  @endpush

  <h1>Edit Tool</h1>
  <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" value="{{ $package->name }}" required>
      </div>

      <div class="form-group">
          <label for="description">Description</label>
          <input type="type" name="description" class="form-control" id="description" value="{{ $package->description }}" required>
      </div>

      <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" class="form-control" id="price" value="{{ $package->price }}" required>
      </div>

      <div class="form-group">
        <label for="tools_included">Tools</label>
        <select name="tools_included[]" id="tools_included" class="form-control" multiple>
          @foreach($tools as $tool)
            <option value="{{ $tool->id }}" {{in_array($tool->id, json_decode($package->tools_included, true)) ? 'selected' : ''}}>{{ $tool->title }}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  @push('javascript')
    <!-- Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#tools_included').select2();
        });
    </script>
  @endpush
@endsection