@extends('layouts.auth')

@section('content')

<div class="page-content page-auth" id="register">
    <div class="section-store-auth" data-aos="fade-up">
      <div class="container">
        <div class="row align-items-center justify-content-center row-login">
         
          <div class="col-lg-4">
            <h2>
              Memulai untuk jual beli <br> dengan cara terbaru
            </h2>
            <form method="POST" action="{{ route('register') }}" class="mt-3">
              @csrf
             <div class="form-group">
               <label>Full Name</label>
              
               <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" v-model="name"  name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

               @error('name')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
              </div>
             <div class="form-group">
               <label>Email Address</label>
             
               <input id="email" type="email"  v-model="email" @change="EmailAvailability()" class="form-control @error('email') is-invalid @enderror" :class="{ 'is_invalid' : this.email_unavailable }"
               name="email"
               value="{{ old('email') }}" required autocomplete="email">

               @error('email')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
              </div>
             <div class="form-group">
               <label>Password</label>
             
               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

               @error('password')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
               @enderror
             </div>
             <div class="form-group">
              <label>Konfirmasi Password</label>
            
              <input id="password-confirmation" type="password" class="form-control @error('password_confirm') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

              @error('password_confirmation')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
             <div class="form-group">
               <label>Store</label>
               <p class="text-muted">Apakah anda ingin membuka toko ?</p>
               <div class="custom-control custom-radio custom-control-inline">
                 <input type="radio" class="custom-control-input" name="is_store_open" id="OpenStoreTrue" v-model="is_store_open" :value="true">
                 <label for="OpenStoreTrue" class="custom-control-label">Iya, boleh</label>
               </div>
               <div class="custom-control custom-radio custom-control-inline">
                 <input type="radio" class="custom-control-input" name="is_store_open" id="OpenStoreFalse" v-model="is_store_open" :value="false">
                 <label for="OpenStoreFalse" class="custom-control-label">Enggak, makasih</label>
               </div>
             </div>
             <div class="form-group" v-if="is_store_open">
               <label>Nama Toko</label>
                <input type="text" name="store_name" v-model="store_name" id="store_name"
                class="form-control @error('store_name') is-invalid @enderror" required autocomplete autofocus>
                @error('store_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
              </div>
             <div class="form-group" v-if="is_store_open">
               <label>Kategori</label>
               <select name="categories_id" id="" class="form-control">
                 <option value="" disable>Select Category</option>
                 @foreach ($categories as $category)
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                 @endforeach
               </select>
             </div>
             <button type="submit" class="btn btn-success btn-block  mt-4" :disabled="this.email_unavailable">Sign Up Now</button>
             <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-2">Back to Sign In</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
@push('addon-script')
<script src="/vendor/vue/vue.js"></script>
<script src="https://unpkg.com/vue-toasted"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
  Vue.use(Toasted);

  var register = new Vue({
    el: '#register',
    mounted() {
      AOS.init();
    },
    methods:{
      EmailAvailability: function(){
          var self = this;

          // Make a request for a user with a given ID
          axios.get('{{ route('api-register-check') }}', {
            params: {
              email:this.email
            }
          })
            .then(function (response) {

              if(response.data == 'Available'){
                self.$toasted.success(
                  "Email anda tersedia.. Silahkan lanjut langkah selanjutnya",
                  {
                    position: "top-center",
                    className: "rounded",
                    duration: 5000,
                  }
                );
                self.email_unavailable = false;
              }else{
                self.$toasted.error(
                  "Maaf, tampaknya email sudah terdaftar pada sistem kami.",
                  {
                    position: "top-center",
                    className: "rounded",
                    duration: 5000,
                  }
                );
                self.email_unavailable = true;
              }
            });
        
      }
    },
     data() {
        return {
          name: "",
          email: "",
          is_store_open: true,
          store_name: "",
          email_unavailable: false
        }
    }
  });
</script>
@endpush
