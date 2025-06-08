<img src="{{ $image }}" alt="Gallery Image" class="block w-full h-full object-cover object-center bg-no-repeat scale-105 ease-in duration-200" />

<div class="overlay absolute bg-black bg-opacity-30 inset-0 flex items-center justify-center opacity-0 ease-in transition-opacity duration-200">
    <button class="btn btn--primary__reverse font-semibold">
        {{ $buttonText }}

        <img src="{{ $buttonIcon }}" alt="">
    </button>
</div>
