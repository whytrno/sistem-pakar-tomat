@extends('components.root')

@section('title', 'Home')

@section('content')
    <div class="space-y-20">
        <div class="text-white px-20 py-64 space-y-14 relative">
            <img src="{{ url('bg.jpg') }}" alt="" class="object-fill absolute top-0 left-0 -z-10 w-full h-full">
            <h1 class="text-5xl w-1/2 font-extrabold">Diagnosa Hama dan Penyakit Tanaman Tomat</h1>
            <h4 class="text-xl w-1/2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                galley of
                type and scrambled it to make a type specimen book.</h4>
        </div>

        <div class="text-center space-y-14">
            <h2 class="text-secondary text-4xl font-semibold">Tentang Kami</h2>
            <div class="flex justify-center">
                <p class="text-xl w-1/2">Situs kami adalah sumber pengetahuan dan solusi bagi petani tomat, ditujukan untuk
                    meningkatkan
                    hasil panen
                    petani. Kami menyediakan sistem pakar yang mendiagnosa hama dan penyakit pada tanaman tomat. Sistem ini
                    berbasis website, menggunakan Metode Certainty Factor, dan telah diuji dengan akurasi 90%. Kami
                    bertujuan
                    membantu petani menemukan dan menyelesaikan masalah pada tanaman tomat petani. Bergabunglah dengan kami
                    untuk budidaya tomat yang lebih baik.</p>

            </div>
        </div>

        <div class="text-center space-y-14">
            <h2 class="text-gray-700 text-4xl font-semibold">Keunggulan</h2>
            <div class="flex justify-center">
                <p class="text-xl w-1/2">Kami menawarkan keunggulan dengan database yang mencakup 12 penyakit dan 37 gejala,
                    serta kemampuan diagnosa yang akurat, mendukung peningkatan produktivitas dan kesehatan tanaman tomat
                    Anda.</p>
            </div>
            <div class="grid grid-cols-3 px-20">
                <div>
                    <div class="flex justify-center">
                        <img src="{{ url('icons/penyakit.svg') }}" alt="">
                    </div>
                    <h2 class="text-gray-700 text-4xl font-semibold">12 Data Penyakit</h2>
                </div>
                <div>
                    <div class="flex justify-center">
                        <img src="{{ url('icons/gejala.svg') }}" alt="">
                    </div>
                    <h2 class="text-gray-700 text-4xl font-semibold">37 Data Gejala</h2>
                </div>
                <div>
                    <div class="flex justify-center">
                        <img src="{{ url('icons/diagnosis.svg') }}" alt="">
                    </div>
                    <h2 class="text-gray-700 text-4xl font-semibold">Diagnosa Akurat</h2>
                </div>
            </div>
        </div>

        <div class="text-center space-y-14 pb-20">
            <h2 class="text-gray-700 text-4xl font-semibold">Penggunaan</h2>
            <div class="flex justify-center">
                <p class="text-xl w-1/2">Pengguna kami, terutama petani dan pakar tanaman, memanfaatkan platform kami untuk
                    mendapatkan wawasan dan solusi terkait penyakit dan gejala pada tanaman tomat, dengan tujuan untuk
                    meningkatkan perawatan dan produktivitas panen.</p>
            </div>
            <div class="text-center space-y-5">
                <h2 class="text-gray-700 text-5xl font-semibold">30+</h2>
                <p class="text-xl">Melakukan Diagnosis</p>
            </div>
        </div>
    </div>
@endsection
