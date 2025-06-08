<section id="section-carousel" class="sr-hidden">
    <div class="relative">
      <div class="overflow-hidden relative w-full aspect-video">
          @for ($i = 0; $i < 3; $i++)
              <img src="{{ storage_url('static/about-component/banner-about-'.($i + 1).'.jpg') }}" class="item-carousel absolute inset-0 object-cover object-center bg-no-repeat w-full h-full block {{ $i == 0 ? 'opacity-100' : 'opacity-0' }}" />
          @endfor
        </div>
    </div>
</section>

