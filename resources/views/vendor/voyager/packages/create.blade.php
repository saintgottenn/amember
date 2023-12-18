@extends('voyager::master')

@section('page_title', 'Package creation')

@section('content')
  @push('css')
      <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
  @endpush

  <h1>Package Creation</h1>
  <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" required>
      </div>

      <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="description" value="{{old('description')}}"></textarea>
      </div>

      <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" class="form-control" id="price" value="{{old('price')}}" required>
      </div>

      <div class="form-group">
        <label for="tools_included">Tools</label>
        <select name="tools_included[]" id="tools_included" class="form-control" multiple>
          @foreach($tools as $tool)
            <option value="{{ $tool->id }}">{{ $tool->title }}</option>
          @endforeach
        </select>
      </div>

      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div>
      @endif

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