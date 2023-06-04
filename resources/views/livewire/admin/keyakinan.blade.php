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
                <h1 class="text-xl font-bold text-secondary2">Data Keyakinan</h1>
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
                    <th class="px-5 py-4 w-44">Keterangan</th>
                    <th class="px-5 py-4">Nilai MB</th>
                    <th class="px-5 py-4">Nilai MD</th>
                    <th class="px-5 py-4 w-40">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-secondary2 font-bold text-center border-b-2 border-secondary-2">
                    <td>1</td>
                    <td>Sangat Yakin</td>
                    <td>0.2</td>
                    <td>0.8</td>
                    <td class="flex justify-center gap-5">
                        <img src="{{ url('icons/admin/edit.svg') }}" alt="">
                        <img src="{{ url('icons/admin/delete.svg') }}" alt="">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
