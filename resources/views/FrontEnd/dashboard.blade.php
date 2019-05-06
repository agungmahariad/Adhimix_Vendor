@extends('FrontEnd.layout')
@section('title','Adhimix Vendor | Dashboard')
@section('content')
<main role="main" class="homepage">
      <div class="block bigopt">
    <div class="caption opt">
      <div class="valign-wrap">
        <div class="valign">
          <div class="container wow fadeIn" data-wow-delay="0.3s">
            <div class="opt-text">
              <div class="text-wrapper">
                <h2>INTEGRITY <i>•</i> COMMITMENT <i>•</i> CARE</h2>
              </div>
              <div class="text-wrapper">
                <p>
                  Honesty, hard work, discipline, dedication and integrity are the major values continuously developed by PT. Adhimix Precast Indonesia to improve skillful and knowledgeable human resources in achieving productivity.
                </p>
              </div>
            </div>
            <div class="opt-container">
              <div class="row">
                <div class="item" style="width: 20%;">
                  <a href="{{ url('registrasi-produk') }}">
                    <div class="icon ani">
                      <img class="o" src="{{ asset('public/assets/img/bg-opt-o.png') }} ">
                      <img class="h" src="{{ asset('public/assets/img/bg-opt-h.png') }} ">
                    </div>
                    <label>
                     <img src={{ asset('public/assets/img/lal.png') }} ">
                     <p style="font-size: 160%"><span>Registrasi Produk</span></p>
                   </label>
                 </a>
               </div>
               <div class="item" style="width: 20%;">
                <a href="{{ url('penawaran') }}">
                  <div class="icon ani">
                    <img class="o" src="{{ asset('public/assets/img/bg-opt-o.png') }} ">
                    <img class="h" src="{{ asset('public/assets/img/bg-opt-h.png') }} ">
                  </div>
                  <label>
                    <img src="{{ asset('public/assets/img/penawaran.png') }} ">
                    <p style="font-size: 160%"><span>Penawaran</span></p>
                  </label>
                </a>
              </div>
              <div class="item" style="width: 20%;">
                <a href="{{ url('kontrak') }}">
                  <div class="icon ani">
                    <img class="o" src="{{ asset('public/assets/img/bg-opt-o.png') }} ">
                    <img class="h" src="{{ asset('public/assets/img/bg-opt-h.png') }} ">
                  </div>
                  <label>
                    <img src="{{ asset('public/assets/img/contract.png') }} ">
                    <p style="font-size: 160%"><span>Kontrak </span></p>
                  </label>
                </a>
              </div>
              <div class="item" style="width: 20%;">
                <a href="{{ url('pengiriman') }}">
                  <div class="icon ani">
                    <img class="o" src="{{ asset('public/assets/img/bg-opt-o.png') }} ">
                    <img class="h" src="{{ asset('public/assets/img/bg-opt-h.png') }} ">
                  </div>
                  <label>
                    <img src="{{ asset('public/assets/img/ic-corporate.png') }} ">
                    <p style="font-size: 160%"><span>Pengiriman</span></p>
                  </label>
                </a>
              </div>
              <div class="item" style="width: 20%;">
                <a href="{{ url('penagihan') }}">
                  <div class="icon ani">
                    <img class="o" src="{{ asset('public/assets/img/bg-opt-o.png') }} ">
                    <img class="h" src="{{ asset('public/assets/img/bg-opt-h.png') }} ">
                  </div>
                  <label>
                    <img src="{{ asset('public/assets/img/ic-corporate.png') }} ">
                    <p style="font-size: 160%"><span>Penagihan</span></p>
                  </label>
                </a>
              </div>
            </div>                  
          </div>  
        </div>
      </div>
    </div> 
  </div>     
</div> 
</main>
@endsection