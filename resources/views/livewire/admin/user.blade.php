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
                <h1 class="text-xl font-bold text-secondary2">Data User</h1>
            </div>
            <div class="text-xl flex items-center gap-5 bg-customGreen text-white px-4 rounded-md">
                <img src="{{ url('icons/admin/plus.svg') }}" alt="">
                <button id="tambahData">Tambah Data</button>
            </div>
        </div>
        
        <table class="table-fixed w-full">
            <thead>
                <tr class="bg-blue-500 text-white font-bold text-xl">
                    <th class="px-5 py-4 w-20">No</th>
                    <th class="px-5 py-4 w-44">Email</th>
                    <th class="px-5 py-4 w-40">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $s) 
                <tr class="text-secondary2 font-bold text-center border-b-2 border-secondary-2">
                <td>{{$s->id}}</td>
                <td>{{$s->email}}</td>
                    <td class="flex justify-center gap-5">
                        <img src="{{ url('icons/admin/edit.svg') }}" alt="">
                        <img src="{{ url('icons/admin/delete.svg') }}" alt="">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="modal" id="myModal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <div class="border-2 shadow-xl p-10 rounded-xl space-y-10" id="diagnosisResult">
            <div class="flex justify-between">
                <h1 class="text-2xl font-semibold text-primary">Tambah Data Penyakit</h1>
            </div>

            <div class="font-semibold text-xl border-2 py-4 border-x-0">
            <style>
    label {
        font-weight: bold;
        margin-top: 10px;
    }

    input[type="text"], input[type="password"] {
        margin-top: 5px;
        padding: 10px;
        width: 100%;
        border-radius: 10px;
        border: 2px solid #ccc;
    }

    .form-button {
        margin-top: 20px;
    }
</style>

<form>
    <label for="email">Email:</label>
    <input type="text" id="email" name="email">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password">
    <div class="form-button">
        <button class="py-4 px-8 text-white rounded-md bg-customBlue"> Submit </button>
        <button class="py-4 px-8 mr-4 text-white rounded-md bg-customRed"> Cancel </button>
    </div>
    </form>
<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("tambahData");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
    </div>
</div>
