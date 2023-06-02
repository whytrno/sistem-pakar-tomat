<div>
    @if (!$detailModal)
        <div class="grid grid-cols-12 font-semibold text-xl text-center border-2 py-4 border-x-0 border-b-black">
            <div class="col-span-1">
                <h4>No</h4>
            </div>
            <div class="col-span-3">
                <h4>Tanggal</h4>
            </div>
            <div class="col-span-3">
                <h4>Penyakit</h4>
            </div>
            <div class="col-span-5">
                <h4>Aksi</h4>
            </div>
        </div>

        @php
            $no = 1;
        @endphp
        @foreach ($hasilDiagnosa as $hd)
            @php
                $index = $no - 1;
            @endphp
            <div class="grid grid-cols-12 text-xl text-center border-b-2 border-t-0 py-4 border-x-0">
                <div class="col-span-1 flex h-full items-center justify-center">
                    <h4>{{ $no++ }}</h4>
                </div>
                <div class="col-span-3 flex h-full items-center justify-center">
                    <h4>{{ $hd['created_at'] }}</h4>
                </div>
                <div class="col-span-3 flex h-full items-center justify-center">
                    <h4>{{ $hd['hasil_penyakit'] }}</h4>
                </div>
                <div class="col-span-5 space-x-5">
                    <button wire:click="toggleDetailModal({{ $hasilDiagnosa[$index]['id'] }})"
                        class="py-4 px-8 text-white rounded-md bg-customYellow">Lihat</button>
                    <button wire:click="toggleDeleteModal()"
                        class="py-4 px-8 text-white rounded-md bg-customRed">Hapus</button>
                </div>
            </div>

            @if ($deleteModal)
                <div class="absolute w-screen h-screen flex items-center justify-center top-0 left-0 z-50">
                    <div class="w-1/4 border-2 border-gray-200 rounded-md bg-white">
                        <div class="flex justify-end p-2">
                            <p wire:click="toggleDeleteModal" class="cursor-pointer p-2">X</p>
                        </div>
                        <div class="px-14 pb-10 space-y-5">
                            <div class="flex flex-col items-center space-y-5">
                                <img src="{{ url('icons/trash.svg') }}" alt="">
                                <h1 class="text-2xl text-[#404B5C]">Diagnosis Sukses</h1>
                                <p class="text-center font-medium">Sukses! Diagnosis penyakit tomat telah selesai.
                                    Apakah
                                    Anda
                                    ingin
                                    melihat
                                    hasilnya?
                                </p>
                            </div>
                            <div class="flex justify-between px-5">
                                <button wire:click="deleteData({{ $hasilDiagnosa[$index]['id'] }})"
                                    class="text-customRed">Ya</button>
                                <p wire:click="toggleDeleteModal" class="cursor-pointer">Tidak</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @else
        @php
            $index = array_search($selectedDiagnosa, array_column($hasilDiagnosa, 'id'));
            
            $detail = $hasilDiagnosa[$index]['user_input'];
            $akurasi = $hasilDiagnosa[$index]['akurasi'];
            $penyakit = $hasilDiagnosa[$index]['hasil_penyakit'];
        @endphp
        <div class="border-2 shadow-xl p-10 rounded-xl space-y-10">
            <div class="flex justify-between">
                <h1 class="text-2xl font-semibold text-primary">Hasil Diagnosa</h1>
                <button wire:click="toggleDetailModal(0)">X</button>
            </div>

            <div>
                <div
                    class="grid grid-cols-12 font-semibold text-xl text-center border-2 py-4 border-x-0 border-b-black">
                    <div class="col-span-1">
                        <h4>No</h4>
                    </div>
                    <div class="col-span-3">
                        <h4>Kode</h4>
                    </div>
                    <div class="col-span-3">
                        <h4>Gejala Pada Tanaman</h4>
                    </div>
                    <div class="col-span-5">
                        <h4>Pilihan</h4>
                    </div>
                </div>

                <div>
                    @for ($i = 0; $i < count($detail['gejala']); $i++)
                        <div
                            class="grid grid-cols-12 font-semibold text-xl text-center border-2 py-4 border-x-0 border-b-black">
                            <div class="col-span-1">
                                <h4>{{ $i }}</h4>
                            </div>
                            <div class="col-span-3">
                                <h4>{{ $detail['gejala'][$i] }}</h4>
                            </div>
                            <div class="col-span-3">
                                <h4>{{ $detail['gejala_name'][$i] }}</h4>
                            </div>
                            <div class="col-span-5">
                                <h4>{{ $detail['kondisi'][$i] }}</h4>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <div class="space-y-2">
                <h1 class="text-xl font-semibold text-primary">Jenis penyakit yang diderita adalah</h1>
                <p class="border w-full p-3 rounded-md">{{ $penyakit }} / {{ $akurasi }}%</p>
            </div>

            <div class="space-y-10">
                <div class="shadow-xl rounded-xl flex-cols">
                    <h1 class="bg-customBlue text-white font-semibold text-2xl p-4 rounded-t-xl">Detail: </h1>
                    <p class="px-5 py-7">Terdapat warna kecoklatan atau keunguan pada daun, tangkai, buah dan batang</p>
                </div>
                <div class="shadow-xl rounded-xl flex-cols">
                    <h1 class="bg-customYellow text-white font-semibold text-2xl p-4 rounded-t-xl">Saran: </h1>
                    <p class="px-5 py-7">Terdapat warna kecoklatan atau keunguan pada daun, tangkai, buah dan batang</p>
                </div>
                <div class="shadow-xl rounded-xl flex-cols">
                    <h1 class="bg-customRed text-white font-semibold text-2xl p-4 rounded-t-xl">Kemungkinan Lain: </h1>
                    <p class="px-5 py-7">Terdapat warna kecoklatan atau keunguan pada daun, tangkai, buah dan batang</p>
                </div>
            </div>

            <div class="flex justify-end">
                <button wire:click="toggleDetailModal(0)"
                    class="py-4 px-8 text-white rounded-md bg-customBlue">Kembali</button>
            </div>
        </div>
    @endif
</div>
