@extends('voyager::master')

@section('content')
  <h1>Edit Tool</h1>
  <form action="{{ route('admin.tools.update', $tool->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" value="{{ $tool->title }}" required>
      </div>

      <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" name="slug" class="form-control" id="slug" value="{{ $tool->slug }}" required>
      </div>

      <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)">
          <img id="imagePreview" src="{{ asset($tool->image) }}" alt="Image preview" style="max-width: 200px; margin-top: 10px;">
      </div>

      <div class="form-group">
          <label for="link">Link</label>
          <input type="text" name="link" class="form-control" id="link" value="{{ $tool->link }}">
      </div>

      <div class="form-group">
          <label for="benefits">Benefits</label>
          <!-- Предполагается, что benefits хранятся в JSON формате -->
          @php $benefits = json_decode($tool->benefits, true); @endphp
          <div id="benefitsContainer">
              @if(is_array($benefits))
                  @foreach($benefits as $benefit)
                      <input type="text" name="benefits[]" class="form-control my-2" value="{{ $benefit }}">
                  @endforeach
              @endif
          </div>
          <button type="button" id="addBenefit">Add Benefit</button>
      </div>

      <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="description">{{ $tool->description }}</textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  @push('javascript')
    <script>
      document.getElementById('addBenefit').addEventListener('click', function() {
        var newBenefit = document.createElement('input');
        newBenefit.setAttribute('type', 'text');
        newBenefit.setAttribute('name', 'benefits[]'); 
        newBenefit.classList.add('form-control', 'my-2'); 
        document.getElementById('benefitsContainer').appendChild(newBenefit);
      });

      function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
          var output = document.getElementById('imagePreview');
          output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
        document.getElementById('imagePreview').style.display = 'block';
      }
    </script>
  @endpush
@endsection