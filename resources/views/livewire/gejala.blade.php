<div class="space-y-5">

    @for ($i = 0; $i < count($diagnosa) + 1; $i++)
        <div class="grid grid-cols-12 gap-x-14 gap-y-5">
            <div wire:click="toggleModal('gejala', {{ $i }})"
                class="col-span-5 rounded-md border-2 border-gray-300 py-3 px-8 w-full flex justify-between items-center cursor-pointer">
                <p>{{ isset($selectedGejala[$i]) ? $selectedGejala[$i] : 'Cari gejala ...' }}</p>
                <img src="{{ url('icons/dropdown.svg') }}" alt="">
            </div>
            <div wire:click="toggleModal('kondisi', {{ $i }})"
                class="col-span-5 rounded-md border-2 border-gray-300 py-3 px-8 w-full flex justify-between items-center cursor-pointer">
                <p>{{ isset($selectedKondisi[$i]) ? $selectedKondisi[$i] : 'Cari kondisi ...' }}</p>
                <img src="{{ url('icons/dropdown.svg') }}" alt="">
            </div>

            <div class="col-span-2 flex justify-end space-x-5">
                <img wire:click="addDiagnosa" class="cursor-pointer" src="{{ url('icons/plus.svg') }}" alt="">
                <img wire:click="removeDiagnosa({{ $i }})" class="cursor-pointer"
                    src="{{ url('icons/minus.svg') }}" alt="">
            </div>

            <div
                class="{{ isset($gejalaModal[$i]) && $gejalaModal[$i] ? '' : 'hidden' }} col-span-10 w-full rounded-md border-2 border-gray-300 text-primary p-5 space-y-3">
                <div class="relative">
                    <img src="{{ url('icons/search.svg') }}" class="absolute top-0 left-0 h-full p-3">
                    <input wire:model="searchGejala" type="text"
                        class="py-3 pr-3 pl-14 rounded-md w-full bg-gray-200" placeholder="Cari gejala ...">
                </div>

                @foreach ($filteredGejala as $item)
                    <p wire:click="changeSelected('gejala', '{{ $item }}', {{ $i }})"
                        class="py-3 px-5 hover:bg-customBlue hover:text-white rounded-md cursor-pointer">
                        {{ $item }}
                    </p>
                @endforeach
            </div>
            <div
                class="{{ isset($kondisiModal[$i]) && $kondisiModal[$i] ? '' : 'hidden' }} col-span-10 w-full rounded-md border-2 border-gray-300 text-primary p-5 space-y-3">
                <div class="relative">
                    <img src="{{ url('icons/search.svg') }}" class="absolute top-0 left-0 h-full p-3">
                    <input wire:model="searchKondisi" type="text"
                        class="py-3 pr-3 pl-14 rounded-md w-full bg-gray-200" placeholder="Cari gejala ...">
                </div>

                @foreach ($filteredKondisi as $item)
                    <p wire:click="changeSelected('kondisi', '{{ $item[0] }}', {{ $i }})"
                        class="py-3 px-5 hover:bg-customBlue hover:text-white rounded-md cursor-pointer">
                        {{ $item[0] }}
                    </p>
                @endforeach
            </div>
        </div>
    @endfor

    <div class="w-full flex justify-center pt-10">
        <button wire:click="toggleSuccessModal"
            class="bg-customBlue py-4 px-24 rounded-md font-bold text-lg text-white">Diagnosa Sekarang</button>
    </div>

    @if ($successModal)
        <div class="absolute w-screen h-screen flex items-center justify-center top-0 left-0 z-50">
            <div class="w-1/4 border-2 border-gray-200 rounded-md bg-white">
                <div class="flex justify-end p-2">
                    <p wire:click="toggleSuccessModal" class="cursor-pointer p-2">X</p>
                </div>
                <div class="px-14 pb-10 space-y-5">
                    <div class="flex flex-col items-center space-y-5">
                        <img src="{{ url('icons/success.svg') }}" alt="">
                        <h1 class="text-2xl text-[#404B5C]">Diagnosis Sukses</h1>
                        <p class="text-center font-medium">Sukses! Diagnosis penyakit tomat telah selesai. Apakah Anda
                            ingin
                            melihat
                            hasilnya?
                        </p>
                    </div>
                    <div class="flex justify-between px-5">
                        <a href="{{ url('/diagnosa/hasil') }}" class="text-[#10B982]">Lihat Hasil</a>
                        <p wire:click="toggleSuccessModal()" class="cursor-pointer">Abaikan</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
