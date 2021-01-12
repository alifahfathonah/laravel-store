@extends('layouts.dashboard')

@section('title')
    Store - Dashboard Settings
@endsection
@section('content')
     <!-- Section Content -->
     <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">Store Settings</h2>
          <p class="dashboard-subtitle">
            Make store that profitable
          </p>
        </div>
        <div class="dashboard-content">
          <div class="row">
            <div class="col-12">
              <form action="{{ route('dashboard-settings-redirect','dashboard-settings-store') }}" method="POST" enctype="multipart/form-data00">
                @csrf
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Nama Toko</label>
                          <input type="text" name="store_name" value="{{ $user->store_name }}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Kategori</label>
                          <select name="categories_id" class="form-control">
                            <option value="{{ $user->categories_id }}">Tidak Diganti</option>
                              @foreach ($categories as $category)
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endforeach
    
                          </select>
                        </div>
                      <div class="col-md-12">
                        <div class="form-group text-left">
                          <label>Store</label>
                          <p class="text-muted">Apakah anda ingin membuka toko ?</p>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="store_status" id="OpenStoreTrue" value="1" {{ $user->store_status == 1 ? 'checked' : '' }}>
                            <label for="OpenStoreTrue" class="custom-control-label">Buka</label>
                          </div>
                          <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" name="store_status" id="OpenStoreFalse" value="0" {{ $user->store_status == 0 || $user->store_status == NULL ? 'checked' : '' }}>
                            <label for="OpenStoreFalse" class="custom-control-label">Tutup Sementara</label>
                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col text-right">
                        <button type="submit" class="btn btn-success px-5">Save Now</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection