@extends('layouts.dashboard')

@section('title')
    Store - Dashboard Product Details
@endsection
@section('content')
     <!-- Section Content -->
     <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">Coffe Latte</h2>
          <p class="dashboard-subtitle">
            Product Details
          </p>
         </div>
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              <form action="">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" name="product_name" value="Coffe Boga Rasa" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Price</label>
                          <input type="number" name="price" value="12.399" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Kategori</label>
                          <select name="kategori" id="" class="form-control">
                            <option value="" disable>Select Category</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Description</label>
                          <textarea name="editor" id="" cols="30" rows="10">The Nike Air Max 720 SE goes bigger than ever before with Nike's tallest Air unit yet for unimaginable,
                            all-day comfort. There's super breathable fabrics on the upper, while colours add a modern edge. Bring the past into the future with the Nike Air Max 2090, 
                            a bold look inspired by the DNA of the iconic Air Max 90. Brand-new Nike Air cushioning</textarea>
                        </div>
                      </div>
                        <div class="col">
                          <button type="submit" class="btn btn-success btn-block">Update Product</button>
                        </div>
                       </div>
                      </div>
                     </div>
                    </form>
                   </div>
                 </div>
          </div>
            <div class="row mt-4">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="gallery-container">
                          <img src="/images/product-card-1.png" alt="" class="w-100">
                          <a href="" class="delete-gallery">
                            <img src="/images/icon-delete.svg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="gallery-container">
                          <img src="/images/product-card-2.png" alt="" class="w-100">
                          <a href="" class="delete-gallery">
                            <img src="/images/icon-delete.svg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="gallery-container">
                          <img src="/images/product-card-3.png" alt="" class="w-100">
                          <a href="" class="delete-gallery">
                            <img src="/images/icon-delete.svg" alt="">
                          </a>
                        </div>
                      </div>
                      <div class="col-12">
                        <input type="file"  id="file" style="display: none;" multiple>
                        <button class="btn btn-primary btn-block mt-4" onclick="thisFileUpload()">Add Photo</button>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>      
         </div> 
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
    <script>
      CKEDITOR.replace('editor');
    </script>
    <script>
      AOS.init();
    </script>
    <script>
      function thisFileUpload(){
        document.getElementById('file').click();
      }
    </script>
    <script>
      $('#menu-toggle').click(function (e){
        e.preventDefault();
        $('#wrapper').toggleClass('toggled');
      });
    </script>
@endpush