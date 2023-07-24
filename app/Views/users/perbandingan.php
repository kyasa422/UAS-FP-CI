<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="py-5 px-14">
    <div class="w-full bg-slate-300 rounded-lg p-3 relative">
        <h1 class="font-bold text-3xl text-center">Masukan Kriteria</h1>
        <br>
        <form action="/compareControl" method="post" >
            <div class="">
                <label for="harga" class="text-xl text-black px-2">Harga (Juta Rupiah)</label>
                <select name="harga" id="harga" class="w-full p-3 my-2 rounded-md focus:outline-amber-500" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="5">kurang dari 251</option>
                    <option value="4">250-500</option>
                    <option value="3">501-750</option>
                    <option value="2">751-1000</option>
                    <option value="1">lebih dari 1000</option>
                </select>
            </div>
            <div class="">
                <label for="penumpang" class="text-xl text-black px-2">Kapasitas Penumpang</label>
                <select name="penumpang" id="penumpang" class="w-full p-3 my-2 rounded-md focus:outline-amber-500" required>
                    <option value="" disabled selected>Pilih kategori</option>
                    <option value="1">1-2</option>
                    <option value="2">3-4</option>
                    <option value="3">5-6</option>
                    <option value="4">7-8</option>
                    <option value="5">lebih dari 8</option>
                </select>
            </div>
            <div class="">
                <label for="efisiensi" class="text-xl text-black px-2">Efisiensi BBM (Km/L)</label>
                <select name="efisiensi" id="efisiensi" class="w-full p-3 my-2 rounded-md focus:outline-amber-500" required>
                    <option value="" disabled selected>Pilih kategori</option>
                    <option value="1">Kurang dari 6</option>
                    <option value="2">7-9</option>
                    <option value="3">10-12</option>
                    <option value="4">13-15</option>
                    <option value="5">Lebih dari 16</option>
                </select>
            </div>
            <div class="">
                <label for="mesin" class="text-xl text-black px-2">Kapasitas Mesin (Dk)</label>
                <select name="mesin" id="mesin" class="w-full p-3 my-2 rounded-md focus:outline-amber-500" required>
                    <option value="" disabled selected>Pilih kategori</option>
                    <option value="1">Kurang dari 100</option>
                    <option value="2">101-130</option>
                    <option value="3">131-160</option>
                    <option value="4">161-200</option>
                    <option value="5">Lebih dari 200</option>
                </select>
            </div>
            <div class="">
                <label for="pajak" class="text-xl text-black px-2">Pajak (Juta Rupiah)</label>
                <select name="pajak" id="pajak" class="w-full p-3 my-2 rounded-md focus:outline-amber-500" required>
                    <option value="" disabled selected>Pilih kategori</option>
                    <option value="5">Kurang dari 2,4</option>
                    <option value="4">2,5-4,9</option>
                    <option value="3">5-7,5</option>
                    <option value="2">7,6-10</option>
                    <option value="1">Lebih dari 10</option>
                </select>
            </div>
            <div class="absolute bottom-2 right-2">
            <button type="submit" class="btn btn-accent text-white">Cari Kendaraan</button>
        </div>
        </form>
        <br><br>
        <br>
    </div>
</div>
<br><br>
<?= $this->endSection(); ?>