  
  <!-- Owl-Carousel -->
  <div class="owl-carousel owl-theme owl-carousel-setting">
    @foreach($slider as $key => $sliders)
      <div class="item"><img src="{{asset('./uploads/slider/'.$sliders->slider_image)}}" class="d-block w-100" alt="..."></div>
    @endforeach
</div>