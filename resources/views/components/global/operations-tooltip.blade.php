<div data-key="{{ $key }}" class="operations-tooltip bg-white rounded-2xl p-6 {{ @$status ?? 'hidden' }} grid-cols-1 items-center justify-center gap-3 xl:p-3 xl:gap-4 xl:grid-cols-2 {{ $class }} group-hover:grid">
    <div class="overflow-hidden h-full w-full rounded-2xl">
        <img
            src="{{ storage_url(@$operation['image']) }}"
            alt="Operation"
            class="block w-full h-full object-cover object-center bg-no-repeat"
        />
    </div>

    <div class="flex flex-col gap-6">
        <div class="flex flex-col gap-2">
            <h6 class="text-primary font-semibold leading-normal text-3xl xl:text-2xl">{{ @$operation['title'] }}</h6>
            <p class="font-normal text-secondary leading-normal text-sm xl:text-xs">{{ @$operation['description'] }}</p>
        </div>

        <a href="{{ $operation['url'] }}" class="btn btn--primary text-xs xl:text-sm font-normal leading-normal gap-1">
            {{ $buttonText }}
            <img src="{{ $buttonIcon }}" alt="arrow-up" class="!w-5 !h-5">
        </a>
    </div>
</div>
