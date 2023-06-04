<div class="col-span-9">
    <div class="w-full flex justify-end shadow-xl p-8">
        <div class="flex gap-5 items-center">
            <h1 class="text-xl font-bold text-secondary">Admin</h1>
            <img class="h-10" src="{{ url('icons/admin/user-top.svg') }}" alt="">
        </div>
    </div>
    <div class="px-10 py-10 space-y-10">
        <div class="px-5 w-full flex justify-between">
            <div class="flex gap-5 items-center">
                <img src="{{ url('icons/admin/penyakit.svg') }}" alt="" class="h-10">
                <h1 class="text-xl font-bold text-secondary2">Data penyakit & Solusi</h1>
            </div>
            <div class="text-xl flex items-center gap-5 bg-customGreen text-white px-4 rounded-md">
                <img src="{{ url('icons/admin/plus.svg') }}" alt="">
                <h1>Tambah Data</h1>
            </div>
        </div>

        <table class="table-fixed w-full">
            <thead>
                <tr class="bg-blue-500 text-white font-bold text-xl">
                    <th class="px-5 py-4 w-20">No</th>
                    <th class="px-5 py-4 w-44">Kode Penyakit</th>
                    <th class="px-5 py-4">Nama Penyakit</th>
                    <th class="px-5 py-4">Solusi</th>
                    <th class="px-5 py-4 w-40">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-secondary2 font-bold text-center border-b-2 border-secondary-2">
                    <td>1</td>
                    <td>P1</td>
                    <td>Busuk (Phytophtora infestans de Barry)</td>
                    <td>Untuk mengatasi penyakit busuk pada tanaman tomat, langkah-langkah yang dapat dilakukan
                        adalah dengan melakukan rotasi tanaman dan penyemprotan fungisida. </td>
                    <td class="flex justify-center gap-5">
                        <img class="cursor-pointer" src="{{ url('icons/admin/edit.svg') }}" alt="">
                        <img class="cursor-pointer" wire:click="toggleDeleteModal"
                            src="{{ url('icons/admin/delete.svg') }}" alt="">
                    </td>
                </tr>
            </tbody>
        </table>

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
                            <button class="text-customRed">Ya</button>
                            <p wire:click="toggleDeleteModal" class="cursor-pointer">Tidak</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
