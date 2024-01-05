@extends('voyager::master')

@section('page_title', 'Create Tool')

@section('content')
  <h1>Products(Tools) Creation</h1>
  <form action="{{ route('admin.tools.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label for="name">Title</label>
          <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}" required>
      </div>

       <div class="form-group">
          <label for="link">Link</label>
          <input type="text" name="link" class="form-control" id="link" value="{{old('link')}}" required>
      </div>

      
      <div class="form-group">
          <label for="price">Default Price</label>
          <input type="number" name="price" class="form-control" id="price" value="{{old('price')}}" required>
      </div>

      <div id="prices-container" class="mb-3">
          <label class="form-label">Prices by country:</label>
          
          <div class="form-group mb-2 country-price-group">
              <select class="form-control country-select" onchange="updateCountryPrices()" style="max-width: 300px;">
                  <option value="">Choose Country</option>
                  @foreach ($currencies as $currency)
                      <option value="{{$currency}}">{{$currency}}</option>
                  @endforeach
              </select>
              <input type="number" step="0.01" style="max-width: 300px; display: none;" class="form-control price-input" placeholder="Цена">
          </div>
          
          <button class="btn btn-primary" type="button" onclick="addCountryPrice()">Change or added new price</button>
      </div>

      <input type="hidden" name="country_prices" id="country-prices" value="">

      <div class="form-group">
          <label for="image">Image</label>
          <input type="file" name="image" class="form-control" id="image"  onchange="previewImage(event)">
          <img id="imagePreview" src="#" alt="Image preview" style="max-width: 200px; margin-top: 10px; display: none;">
      </div>

      <div class="form-group">
          <label for="benefits">Benefits</label>
          <div id="benefitsContainer">

          </div>
          <button type="button" id="addBenefit">Add Benefit</button>
      </div>

      <div class="form-group">
          <label for="description">Description</label>
          <textarea name="description" class="form-control" id="description" value="{{old('description')}}"></textarea>
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