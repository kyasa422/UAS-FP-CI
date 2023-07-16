<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="py-4 px-11">
    <div class="bg-slate-200 w-full rounded-md p-3 mt-4">
        <?php $error = session()->get('_ci_validation_errors'); ?>
        <h1 class="text-3xl font-semibold text-center text-black">Form Update Mobil</h1>
        <hr>
        <br>
        <form action="/admin/updateMobil" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-2 gap-9">
                <div class="">
                    <div class="mb-3">
                        <label for="nama" class="text-xl font-medium ml-2">Nama Mobil</label>
                        <input autocomplete="off" autofocus type="text" name="nama" id="nama" placeholder="Nama Mobil" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= $data['nama'] ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="text-xl font-medium ml-2">Jenis Mobil</label>
                        <select name="jenis" id="jenis" class="block w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required>
                            <option value="" selected disabled>Pilih Jenis</option>
                            <option value="Sedan" <?= $data['jenis'] == 'Sedan' ? 'selected' : '' ?>>Sedan</option>
                            <option value="SUV" <?= $data['jenis'] == 'SUV' ? 'selected' : '' ?>>SUV</option>
                            <option value="Minibus" <?= $data['jenis'] == 'Minibus' ? 'selected' : '' ?>>Minibus</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="warna" class="text-xl font-medium ml-2">Warna Mobil</label>
                        <input autocomplete="off" type="text" name="warna" id="warna" placeholder="Warna Mobil" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= $data['warna'] ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="penumpang" class="text-xl font-medium ml-2">Kapasitas Penumpang</label>
                        <input autocomplete="off" type="number" name="penumpang" id="penumpang" placeholder="Kapasitas Penumpang" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= $data['penumpang'] ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="efisiensi" class="text-xl font-medium ml-2">Efisiensi Bahan Bakar (Km/L)</label>
                        <input autocomplete="off" type="number" name="efisiensi" id="efisiensi" placeholder="Efisiensi Bahan Bakar" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= $data['efisiensi'] ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="mesin" class="text-xl font-medium ml-2">Tenaga Mesin (DK)</label>
                        <input autocomplete="off" type="number" name="mesin" id="mesin" placeholder="Tenaga Mesin" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= $data['mesin'] ?>"/>
                    </div>
                </div>
                <div class="relative">
                    <div class="mb-3">
                        <label for="harga" class="text-xl font-medium ml-2">Harga Mobil</label>
                        <input autocomplete="off" type="number" name="harga" id="harga" placeholder="Harga Mobil" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= $data['harga'] ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="pajak" class="text-xl font-medium ml-2">Pajak Mobil</label>
                        <input autocomplete="off" type="text" name="pajak" id="pajak" placeholder="Pajak Mobil" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= $data['pajak'] ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="text-xl font-medium ml-2">Foto Mobil</label>
                        <input autocomplete="off" type="file" class="file-input file-input-bordered w-full mt-3" id="fotomobil" name="fotomobil" id="fotomobil"/>
                        <?php if(isset($error['fotomobil'])) :?>
                            <span class="font-bold text-red-500"><?= $error['fotomobil'] ?></span>
                        <?php endif ?>
                    </div>
                    <input type="hidden" value="<?= $data['id'] ?>" name="id">
                    <input type="hidden" value="<?= $data['foto'] ?>" name="fotoLama">
                    <div class="absolute bottom-0 right-0">
                        <button type="submit" class="btn btn-accent">Update</button>
                    </div>
                    <div class="w-52 h-52">
                        <img src="/product/<?= $data['foto'] ?>" alt="" id="img-preview" class=" object-cover object-center">
                    </div>
                </div>
            </div>
        </form>
        <br>
    </div>
    <br><br>
</div>

<?= $this->endSection(); ?>