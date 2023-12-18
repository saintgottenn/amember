@extends('voyager::master')

@section('content')
  <h1>Products(Tools) Creation</h1>
  <form action="{{ route('admin.tools.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" required>
      </div>

      <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" name="slug" class="form-control" id="slug" required>
      </div>

      <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)">
          <img id="imagePreview" src="#" alt="Image preview" style="max-width: 200px; margin-top: 10px; display: none;">
      </div>

      <div class="form-group">
          <label for="link">Link</label>
          <input type="text" name="link" class="form-control" id="link">
      </div>

      <div class="form-group">
          <label for="benefits">Benefits</label>
          <div id="benefitsContainer">

          </div>
          <button type="button" id="addBenefit">Add Benefit</button>
      </div>

      <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="description"></textarea>
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
    <script>
      document.getElementById('addBenefit').addEventListener('click', function() {
        var newBenefit = document.createElement('input');
        newBenefit.setAttribute('type', 'text');
        newBenefit.setAttribute('name', 'benefits[]'); // Важно: имя поля в виде массива
        newBenefit.classList.add('form-control', 'my-2'); // Bootstrap классы для стилизации
        document.getElementById('benefitsContainer').appendChild(newBenefit);
      });

      function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
          var output = document.getElementById('imagePreview');
          output.src = reader.result;
          output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
      }
    </script>
  @endpush
@endsection