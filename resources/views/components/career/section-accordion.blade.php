@php
    $careers = [
        [
            'title' => 'Business Consultant',
            'location' => 'Jakarta',
            'category' => 'Marketing',
            'requirements' => [
                '2 - 4 years of work experience',
                'Mid-Level',
                'Full-Time'
            ],

        ],
        [
            'title' => 'Business Consultant',
            'location' => 'Tangerang',
            'category' => 'Marketing',
            'requirements' => [
                '2 - 4 years of work experience',
                'Mid-Level',
                'Full-Time'
            ],

        ],
        [
            'title' => 'Business Consultant',
            'location' => 'Tangerang',
            'category' => 'Marketing',
            'requirements' => [
                '2 - 4 years of work experience',
                'Mid-Level',
                'Full-Time'
            ],

        ],
    ];
@endphp

<section id="section-accordion" class="sr-hidden flex flex-col gap-8 px-5 py-10 xl:gap-16 xl:px-28 xl:py-16">
    <div class="grid grid-cols-12 items-center gap-4 filter-field">
        <label class="text-primary font-semibold leading-normal text-lg col-span-12 xl:text-xl md:col-span-2 xl:col-span-1">{{ setting('content.career_s2_filter_text') }}</label>

        <select name="filter-location" id="filter-location" class="col-span-12 xl:col-span-3">
            <option value="" selected>{{ setting('content.career_s2_filter_location_placeholder') }}</option>
        </select>

        <select name="filter-division" id="filter-division" class="col-span-12 xl:col-span-3">
            <option value="" selected>{{ setting('content.career_s2_filter_division_placeholder') }}</option>
        </select>
    </div>

    <div class="accordion flex flex-col gap-4 xl:gap-8">
        @foreach ($careers as $keyCareer => $career)
            <div class="relative border border-white rounded-2xl flex flex-col text-primary-900">
                <input type="checkbox" id="accordion-{{ $keyCareer }}" class="toggle hidden" {{ $keyCareer == 0 ? 'checked' : '' }}/>

                <label
                    class="accordion-title transition-[border-radius] duration-200 bg-white p-5 rounded-lg font-semibold leading-normal cursor-pointer grid grid-cols-12 items-center md:p-8"
                    for="accordion-{{ $keyCareer }}"
                >
                    <h4 class="col-span-11 md:col-span-5 xl:col-span-4 font-normal leading-normal text-xl xl:text-2xl">{{ $career['title'] }}</h4>

                    <x-global.category-accordion
                        class="hidden md:flex md:col-span-3"
                        imageUrl="{{ setting_file('content.career_s2_accordion_location_icon') }}"
                        text="{{  $career['location']  }}"
                    />

                    <x-global.category-accordion
                        class="hidden md:flex md:col-span-3 xl:col-span-4"
                        imageUrl="{{ setting_file('content.career_s2_accordion_division_icon') }}"
                        text="{{ $career['category'] }}"
                    />

                    <div class="col-span-1 flex flex-row justify-end">
                        <img class="chevron w-3 h-3 transition-transform duration-200" src={{ storage_url('static/icons/arrow-down.svg') }}>
                    </div>
                </label>

                <div class="content overflow-hidden">
                    <div class="transition-[border-radius] duration-200 bg-white pt-2  rounded-lg font-semibold leading-normal flex flex-col md:grid md:grid-cols-12 gap-8 p-5 md:p-8 md:gap-5">
                        <div class="col-span-12 flex flex-col justify-center items-start gap-2 md:hidden">
                            <x-global.category-accordion
                                imageUrl="{{ setting_file('content.career_s2_accordion_location_icon') }}"
                                text="{{  $career['location']  }}"
                            />

                            <x-global.category-accordion
                                imageUrl="{{ setting_file('content.career_s2_accordion_division_icon') }}"
                                text="{{ $career['category'] }}"
                            />
                        </div>

                        <div class="col-span-12 flex flex-col gap-4 md:col-span-5 md:gap-8 xl:col-span-4">
                            <h6 class="font-semibold leading-normal text-lg xl:text-xl">{{ setting('content.career_s2_accordion_requirement_text') }}</h6>

                            <div class="flex flex-col gap-4">
                                @foreach ($career['requirements'] as $requirement)
                                    <div class="flex flex-row items-center gap-2 ">
                                        <img class="w-6 h-6" src={{ setting_file('content.career_s2_accordion_requirement_checked_icon') }}>
                                        <p class="text-secondary font-normal leading-normal text-base xl:text-lg">{{ $requirement }}</p>
                                    </div>
                                @endforeach
                            </div>

                            <a href="{{ route('about-us') }}" class="btn btn--primary">
                                {{ setting('content.career_s2_accordion_button_text') }}

                                <img src="{{ setting_file('content.career_s2_accordion_button_icon') }}" alt="arrow-up">
                            </a>
                        </div>

                        <div class="col-span-12 flex flex-col md:col-span-7">
                            <h6 class="mb-2 font-semibold leading-normal text-base xl:text-xl">Job Desc</h6>

                            <p class="mb-2 font-normal leading-normal text-base xl:text-xl">Sebagai Business Consultant, Anda akan bertanggung jawab memberikan saran strategis dan solusi yang tepat bagi perusahaan dalam meningkatkan kinerja bisnis, efisiensi operasional, dan pencapaian tujuan jangka panjang. Tugas utama meliputi menganalisis situasi bisnis klien, mengidentifikasi masalah dan peluang, serta merancang rencana implementasi yang praktis dan efektif.</p>

                            <br>

                            <h6 class="mb-2 font-semibold leading-normal text-base xl:text-xl">Tanggung Jawab Utama</h6>

                            <ul class="mb-2 font-normal leading-normal text-base xl:text-xl">
                                <li>
                                    Mengumpulkan data dan informasi terkait proses bisnis, finansial, dan operasional perusahaan klien untuk mengidentifikasi area yang memerlukan perbaikan atau optimalisasi.
                                </li>

                                <li>
                                    Menyusun strategi bisnis yang komprehensif, mencakup peningkatan produktivitas, efisiensi operasional, hingga pertumbuhan pasar dan penjualan.
                                </li>

                                <li>
                                    Mengkaji perkembangan pasar, persaingan, dan tren terbaru untuk memberikan rekomendasi inovatif yang sesuai dengan kebutuhan klien.
                                </li>

                                <li>
                                    Memberikan arahan dan supervisi saat klien menerapkan strategi baru atau melakukan perubahan, serta memastikan program berjalan sesuai rencana.
                                </li>

                                <li>
                                    Melakukan pemantauan berkala serta evaluasi atas hasil implementasi, menyusun laporan performa, dan mengajukan perbaikan berkelanjutan.
                                </li>

                                <li>
                                    Menjaga komunikasi dan hubungan baik dengan klien, serta memperluas jaringan untuk menciptakan peluang kerjasama di masa depan.
                                </li>
                            </ul>

                            <br>

                            <h6 class="mb-2 font-semibold leading-normal text-base xl:text-xl">Kualifikasi</h6>

                            <ul class="mb-2 font-normal leading-normal text-base xl:text-xl">
                                <li>
                                    Pendidikan S1 di bidang Manajemen, Ekonomi, Bisnis, atau yang relevan.
                                </li>

                                <li>
                                    Pengalaman minimal 3 tahun sebagai Business Consultant atau peran serupa.
                                </li>

                                <li>
                                    Kemampuan analisis yang tajam, komunikasi yang baik, dan kemampuan menyusun presentasi yang menarik.
                                </li>

                                <li>
                                    Memahami dan mengikuti tren industri serta memiliki kemampuan adaptasi tinggi terhadap perubahan bisnis.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
