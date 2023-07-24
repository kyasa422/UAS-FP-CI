<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="py-4 px-11">
    <div class="bg-slate-200 w-full rounded-md p-3 mt-4">
        <?php $error = session()->get('_ci_validation_errors'); ?>
        <h1 class="text-3xl font-semibold text-center text-black">Form Tambah Mobil</h1>
        <hr>
        <br>
        <form action="/admin/tambahMobil" method="post" enctype="multipart/form-data">
            <div class="grid grid-cols-2 gap-9">
                <div class="">
                    <div class="mb-3">
                        <label for="nama" class="text-xl font-medium ml-2">Nama Mobil</label>
                        <input autocomplete="off" autofocus type="text" name="nama" id="nama" placeholder="Nama Mobil" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= old('nama') ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="text-xl font-medium ml-2">Jenis Mobil</label>
                        <select name="jenis" id="jenis" class="block w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required>
                            <option value="" selected disabled>Pilih Jenis</option>
                            <option value="Sedan" <?= old('jenis') == 'Sedan' ? 'selected' : '' ?>>Sedan</option>
                            <option value="SUV" <?= old('jenis') == 'SUV' ? 'selected' : '' ?>>SUV</option>
                            <option value="Minibus" <?= old('jenis') == 'Minibus' ? 'selected' : '' ?>>Minibus</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="warna" class="text-xl font-medium ml-2">Warna Mobil</label>
                        <input autocomplete="off" type="text" name="warna" id="warna" placeholder="Warna Mobil" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= old('warna') ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="penumpang" class="text-xl font-medium ml-2">Kapasitas Penumpang</label>
                        <input autocomplete="off" type="number" name="penumpang" id="penumpang" placeholder="Kapasitas Penumpang" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= old('penumpang') ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="efisiensi" class="text-xl font-medium ml-2">Efisiensi Bahan Bakar (Km/L)</label>
                        <input autocomplete="off" type="number" name="efisiensi" id="efisiensi" placeholder="Efisiensi Bahan Bakar" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= old('efisiensi') ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="mesin" class="text-xl font-medium ml-2">Tenaga Mesin (DK)</label>
                        <input autocomplete="off" type="number" name="mesin" id="mesin" placeholder="Tenaga Mesin" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= old('mesin') ?>"/>
                    </div>
                </div>
                <div class="relative">
                    <div class="mb-3">
                        <label for="harga" class="text-xl font-medium ml-2">Harga Mobil</label>
                        <input autocomplete="off" type="number" name="harga" id="harga" placeholder="Harga Mobil" class="CurrencyInput w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= old('harga') ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="pajak" class="text-xl font-medium ml-2">Pajak Mobil</label>
                        <input autocomplete="off" type="text" name="pajak" id="pajak" placeholder="Pajak Mobil" class="w-full py-2 px-3 rounded-md mt-2 focus:outline-amber-500" required value="<?= old('pajak') ?>"/>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="text-xl font-medium ml-2">Foto Mobil</label>
                        <input autocomplete="off" type="file" class="file-input file-input-bordered w-full mt-3" id="fotomobil" name="fotomobil" id="fotomobil"/>
                        <?php if(isset($error['fotomobil'])) :?>
                            <span class="font-bold text-red-500"><?= $error['fotomobil'] ?></span>
                        <?php endif ?>
                    </div>
                    <div class="absolute bottom-0 right-0">
                        <button type="submit" class="btn btn-accent">Tambah</button>
                    </div>
                    <div class="w-52 h-52">
                        <img src="" alt="" id="img-preview" class="hidden object-cover object-center">
                    </div>
                </div>
            </div>
        </form>
        <br>
    </div>
    <br><br>
</div>
<script>
    // Image Preview
    const img_preview = document.querySelector("#img-preview");
        const input_img = document.querySelector("#fotomobil");
        input_img.addEventListener("change", function (e) {
        img_preview.src = URL.createObjectURL(this.files[0]);
        img_preview.classList.remove("hidden");
    });

</script>
<?= $this->endSection(); ?>