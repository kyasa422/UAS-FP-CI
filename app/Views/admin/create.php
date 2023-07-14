<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="py-4 px-11">
    <div class="bg-slate-200 w-full rounded-md p-3 mt-4">
        <h1 class="text-3xl font-semibold text-center text-black">Form Tambah Mobil</h1>
        <hr>
        <br>
        <form action="/admin/tambahMobil" method="post" enctype="multipart/form-data">
            <div class="flex justify-around">
                <div class="">
                    <div class="mb-3">
                        <label for="nama" class="text-xl font-medium ml-2">Nama Mobil</label>
                        <input type="text" name="nama" id="nama" placeholder="Nama Mobil" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required/>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="text-xl font-medium ml-2">Jenis Mobil</label>
                        <select name="jenis" id="jenis" class="block w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required>
                            <option value="" selected disabled>Pilih Jenis</option>
                            <option value="Sedan">Sedan</option>
                            <option value="SUV">SUV</option>
                            <option value="Minibus">Minibus</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="warna" class="text-xl font-medium ml-2">Warna Mobil</label>
                        <input type="text" name="warna" id="warna" placeholder="Warna Mobil" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required/>
                    </div>
                    <div class="mb-3">
                        <label for="penumpang" class="text-xl font-medium ml-2">Kapasitas Penumpang</label>
                        <input type="number" name="penumpang" id="penumpang" placeholder="Kapasitas Penumpang" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required/>
                    </div>
                    <div class="mb-3">
                        <label for="efisiensi" class="text-xl font-medium ml-2">Efisiensi Bahan Bakar</label>
                        <input type="number" name="efisiensi" id="efisiensi" placeholder="Efisiensi Bahan Bakar" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required/>
                    </div>
                    <div class="mb-3">
                        <label for="mesin" class="text-xl font-medium ml-2">Tenaga Mesin</label>
                        <input type="number" name="mesin" id="mesin" placeholder="Tenaga Mesin" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required/>
                    </div>
                </div>
                <div class="relative">
                    <div class="mb-3">
                        <label for="harga" class="text-xl font-medium ml-2">Harga Mobil</label>
                        <input type="number" name="harga" id="harga" placeholder="Harga Mobil" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required/>
                    </div>
                    <div class="mb-3">
                        <label for="pajak" class="text-xl font-medium ml-2">Pajak Mobil</label>
                        <input type="text" name="pajak" id="pajak" placeholder="Pajak Mobil" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required/>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="text-xl font-medium ml-2">Foto Mobil</label>
                        <input type="file" class="file-input file-input-bordered w-full" name="fotomobil" />
                    </div>
                    <div class="absolute bottom-0 right-0">
                        <button type="submit" class="btn btn-accent">Tambah</button>
                    </div>
                </div>
            </div>
        </form>
        <br>
    </div>
    <br><br>
</div>
<?= $this->endSection(); ?>