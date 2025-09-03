@php
   $aboutSlides = App\Models\About::find(1);
   $multiImages = App\Models\MultiImages::all();
@endphp

<section id="aboutSection" class="about">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6">
            <ul class="about__icons__wrap">
               @foreach ($multiImages as $item)
                  <li>
                     <img class="light" src="{{ asset($item->image) }}" alt="XD">
                  </li>
               @endforeach
            </ul>
         </div>
         <div class="col-lg-6">
            <div class="about__content">
               <div class="section__title">
                  <span class="sub-title">01 - About me</span>
                  <h2 class="title">{{ $aboutSlides->title ?? '' }}</h2>
               </div>
               <div class="about__exp">
                  <div class="about__exp__icon">
                     <img src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
                  </div>
                  <div class="about__exp__content">
                     <p>20+ Years Experience In this game, Means <br> Product Designing</p>
                  </div>
               </div>
               <p class="desc">{{ $aboutSlides->subtitle ?? '' }}</p>
               <a href="{{ asset('about') }}" class="btn">Download my resume</a>
            </div>
         </div>
      </div>
   </div>
</section>
