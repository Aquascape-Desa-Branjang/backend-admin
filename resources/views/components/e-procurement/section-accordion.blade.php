@php
    $eProcurements = [
        [
            'nomor' => '46766',
            'title' => 'Pengadaan Pelaksana Pembangunan Flat dan RBI Gorontalo',
            'announcement_date' => '2025-03-27',
            'work_unit' => 'Advisory & Pesiapan PB  & J Strategis dan Kritikal',
            'procurement_method' => 'Tender - Sistem Dua Sampul',
            'evaluation_method' => 'Sistem Nilai',
            'ceiling' => 100000000,
            'status' => true,
            'closing_date' => '2025-04-14',
            'winning_partner' => '-',
            'url' => 'https://eprocuremenr.bi.go.id:443/',
            'file_name' => 'Pengumuman_Pengadaan.pdf',
            'file_path' => storage_url('static/logo.png'),
        ],
        [
            'nomor' => '46767',
            'title' => 'Pengadaan Pelaksana Pembangunan Flat dan RBI Gorontalo',
            'announcement_date' => '2025-03-27',
            'work_unit' => 'Advisory & Pesiapan PB  & J Strategis dan Kritikal',
            'procurement_method' => 'Tender - Sistem Dua Sampul',
            'evaluation_method' => 'Sistem Nilai',
            'ceiling' => 100000000,
            'status' => true,
            'closing_date' => '2025-04-14',
            'winning_partner' => '-',
            'url' => 'https://eprocuremenr.bi.go.id:443/',
            'file_name' => 'Pengumuman_Pengadaan.pdf',
            'file_path' => storage_url('static/logo.png'),
        ],
        [
            'nomor' => '46768',
            'title' => 'Pengadaan Pelaksana Pembangunan Flat dan RBI Gorontalo',
            'announcement_date' => '2025-03-27',
            'work_unit' => 'Advisory & Pesiapan PB  & J Strategis dan Kritikal',
            'procurement_method' => 'Tender - Sistem Dua Sampul',
            'evaluation_method' => 'Sistem Nilai',
            'ceiling' => 100000000,
            'status' => true,
            'closing_date' => '2025-04-14',
            'winning_partner' => '-',
            'url' => 'https://eprocuremenr.bi.go.id:443/',
            'file_name' => 'Pengumuman_Pengadaan.pdf',
            'file_path' => storage_url('static/logo.png'),
        ],
    ];
@endphp

<section id="section-accordion" class="sr-hidden e-procurement flex flex-col gap-8 px-5 py-10 xl:gap-16 xl:px-28 xl:py-16">
    <div class="grid grid-cols-12 items-center gap-4 filter-field">
        <label class="text-primary font-semibold leading-normal text-lg col-span-12 xl:text-xl xl:col-span-1">{{ setting('content.e-procurement_s2_filter_text') }}</label>

        <div class="relative col-span-12 xl:col-span-3">
            <input type="text" name="announcement-date" class="w-full xl:w-auto air-datepicker" id="announcement-date" autocomplete="off" placeholder="{{ setting('content.e-procurement_s2_filter_announcement_date_placeholder') }}">

            <div class="absolute inset-y-0 end-0 flex items-center pe-4 pointer-events-none">
                <img src="{{ setting_file('content.e-procurement_s2_filter_calender_icon') }}" class="w-4 h-4 xl:w-6 xl:h-6" alt="Announcement Date">
            </div>
        </div>

        <div class="relative col-span-12 xl:col-span-3">
            <input type="text" name="until-date" id="until-date" class="w-full xl:w-auto air-datepicker" autocomplete="off" placeholder="{{ setting('content.e-procurement_s2_filter_until_date_placeholder') }}">

            <div class="absolute inset-y-0 end-0 flex items-center pe-4 pointer-events-none">
                <img src="{{ setting_file('content.e-procurement_s2_filter_calender_icon') }}" class="w-4 h-4 xl:w-6 xl:h-6" alt="Until Date">
            </div>
        </div>

        <div class="relative col-span-12 xl:col-span-3 xl:col-start-10">
            <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                <img src="{{ setting_file('content.e-procurement_s2_filter_search_icon') }}" class="w-4 h-4 xl:w-6 xl:h-6" alt="search">
            </div>

            <input type="text" name="keyword" id="keyword" class="w-full xl:w-auto field-icon-left" placeholder="{{ setting('content.e-procurement_s2_filter_search_placeholder') }}">
        </div>
    </div>

    <div class="accordion flex flex-col gap-4 xl:gap-8">
        @foreach ($eProcurements as $keyEProcurement => $eProcurement)
            <div class="relative border border-white rounded-2xl flex flex-col">
                <input type="checkbox" id="accordion-{{ $keyEProcurement }}" class="toggle hidden" {{ $keyEProcurement == 0 ? 'checked' : '' }}/>

                <label
                    class="accordion-title no-remove-radius transition-[border-radius] duration-200 bg-primary p-5 rounded-lg text-white font-bold cursor-pointer grid grid-cols-12 items-center md:px-8"
                    for="accordion-{{ $keyEProcurement }}"
                >
                    <h4 class="col-span-11 leading-normal text-lg xl:text-xl">{{ $eProcurement['title'] }}</h4>

                    <div class="col-span-1 flex flex-row justify-end">
                        <img class="chevron w-6 h-6 transition-transform duration-200" src={{ storage_url('static/icons/arrow-down-white.svg') }}>
                    </div>
                </label>

                <div class="content overflow-hidden">
                    <div class="transition-[border-radius] no-remove-radius duration-200 bg-white rounded-lg font-normal text-tertiary leading-normal text-sm md:text-base mt-4 overflow-x-auto">
                        @php
                            $items = [
                                'Nomor Pengadaan' => $eProcurement['nomor'],
                                'Nama Pengadaan' => $eProcurement['title'],
                                'Tanggal Pengumuman' => \Carbon\Carbon::parse($eProcurement['announcement_date'])->translatedFormat('d F Y'),
                                'Satuan Kerja' => $eProcurement['work_unit'],
                                'Cara Pengadaan' => $eProcurement['procurement_method'],
                                'Metode Evaluasi' => $eProcurement['evaluation_method'],
                                'Pagu' => 'Rp ' . number_format($eProcurement['ceiling'], 0, ',', '.'),
                                'Status' => $eProcurement['status'] ? 'Open' : 'Closed',
                                'Closing Date' => \Carbon\Carbon::parse($eProcurement['closing_date'])->translatedFormat('d F Y'),
                                'Rekanan Pemenang' => $eProcurement['winning_partner'],
                                'URL Link' => '<a href="' . $eProcurement['url'] . '" class="text-tertiary no-underline hover:text-primary hover:underline">' . $eProcurement['url'] . '</a>',
                                'Lampiran' => '<a href="'.$eProcurement['file_path'].'" class="text-tertiary no-underline hover:text-primary hover:underline" download>' . $eProcurement['file_name'] . '</a>',
                            ];
                        @endphp

                        <table class="table-auto border-collapse w-full">
                            <tbody>
                                @foreach ($items as $label => $value)
                                    <tr>
                                        <td class="md:w-3/12 p-4 border-misc-7 border border-solid">{{ $label }}&nbsp;:</td>
                                        <td class="md:w-9/12 p-4 border-misc-7 border border-solid">{!! $value !!}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
