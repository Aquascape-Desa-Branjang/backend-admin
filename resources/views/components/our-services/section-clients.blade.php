@php
    $clients = [
        [
            'name' => 'Michael T.',
            'position' => 'Coal Supplier',
            'image' => 'static/client.png',
            'description' => 'A seamless shipping experience with excellent customer support. Highly recommended for bulk cargo logistics!'
        ],
        [
            'name' => 'Andreas M.',
            'position' => 'Mining Exporter',
            'image' => 'static/client.png',
            'description' => 'PT. GLS ensures our cargo arrives safely and on time. Their professionalism and reliability make them our top choice!'
        ],
        [
            'name' => 'Hendro P.',
            'position' => 'Supply Chain Manager',
            'image' => 'static/client.png',
            'description' => 'A trusted shipping partner! Their strong network and dedication to quality make them stand out in the industry.'
        ],
    ];
@endphp

<section id="section-clients" class="sr-hidden flex flex-col gap-8 xl:gap-16 px-5 py-10 xl:px-28 xl:pb-20">
    <div class="flex flex-col">
        <x-global.sub-title-element :text="setting('content.our-services_s3_title')" />
    </div>

    <div class="grid grid-cols-1 gap-5 xl:grid-cols-3">
        @foreach ($clients as $key => $client)
            <div class="bg-white flex flex-col items-start justify-center gap-4 rounded-2xl p-8">
                <div class="flex flex-row items-center justify-between gap-4">
                    <div class="overflow-hidden w-14 h-14 rounded-full">
                        <img src="{{ storage_url($client['image']) }}" alt="Client Image" class="w-full h-full object-cover object-top block bg-no-repeat">
                    </div>

                    <div class="flex flex-col gap-2 items-start justify-center">
                        <h5 class="text-primary font-semibold text-sm leading-normal xl:text-base">{{ $client['name'] }}</h5>
                        <p class="text-primary font-normal text-xs leading-normal xl:text-sm">{{ $client['position'] }}</p>
                    </div>
                </div>

                <p class="font-medium text-secondary text-base leading-normal xl:text-xl">
                    "{{ $client['description'] }}"
                </p>
            </div>
        @endforeach
    </div>
</section>
