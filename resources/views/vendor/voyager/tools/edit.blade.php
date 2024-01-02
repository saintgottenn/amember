@extends('voyager::master')

@section('page_title', 'Edit Tool')

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
          <label for="price">Default Price</label>
          <input type="number" name="price" class="form-control" id="price" value="{{ $tool->price }}" required>
      </div>

      <div id="prices-container" class="mb-3">
          <label class="form-label">Цены по странам:</label>
          
          <div class="form-group mb-2 country-price-group">
              <select class="form-control country-select" onchange="updateCountryPrices()" style="max-width: 300px;">
                  <option value="">Choose Country</option>
                  <option value="US">USA</option>
                  <option value="GB">UK</option>
              </select>
              <input type="number" step="0.01" style="max-width: 300px; display: none;" class="form-control price-input" placeholder="Цена">
          </div>
          
          <button class="btn btn-primary" type="button" onclick="addCountryPrice()">Change or added new price</button>
      </div>

      <input type="hidden" name="country_prices" id="country-prices" value="{{$countryPrices ?? ''}}">

      <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control" id="image" onchange="previewImage(event)">
          <img id="imagePreview" src="{{ asset($tool->image) }}" alt="Image preview" style="max-width: 200px; margin-top: 10px;">
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

      document.addEventListener('DOMContentLoaded', function() {
          document.querySelectorAll('.country-select').forEach(function(select) {
              select.addEventListener('change', function() {
                  this.closest('.country-price-group').querySelector('.price-input').value = '';
                  updateCountryPrices(); 
              });
          });
      });

      function addCountryPrice() {
        const country = document.querySelector(".country-select").value;
        const hiddenField = document.querySelector("#country-prices");
        let cp = {};
        
        const price = document.querySelector(".price-input").value;
        
        if (hiddenField && hiddenField.value) {
            try {
                cp = JSON.parse(hiddenField.value);
            } catch (e) {
                console.error("Ошибка при парсинге JSON: ", e);
                cp = {};
            }
        }

        if (country) {
            cp[country] = price;
            hiddenField.value = JSON.stringify(cp); 
        }
      }

      function updateCountryPrices() {
        const hiddenField = document.querySelector("#country-prices").value;
        const country = document.querySelector(".country-select").value;

        if(country) {
          document.querySelector(".price-input").style.display = "block";  
        } else {
          document.querySelector(".price-input").style.display = "none";  
        }

        if(hiddenField) {
          const cp = JSON.parse(hiddenField);

          Object.keys(cp).forEach(item => {
            if(item === country) {
              document.querySelector(".price-input").value = cp[item];
            }
          });
        }
      }

      updateCountryPrices();
    </script>
  @endpush
@endsection