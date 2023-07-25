<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="py-5 px-14">
    <a href="/" class="btn btn-outline w-44">Kembali</a>
    <br>
    <br>
    <div class="w-full bg-slate-100 p-4 rounded-md">
        <div class="p-2 flex justify-around items-center">
            <?php foreach ($data as $row) :?>
                <div class="shadow-md">
                    <h1 class="text-center font-semibold text-2xl uppercase tracking-widest"><?= $row['nama'] ?></h1>
                    <div class="w-72 h-72 rounded-md flex justify-center items-center -mt-6">
                        <img src="/product/<?= $row['foto'] ?>" alt="<?= $row['foto'] ?>">
                    </div>
                    <?php $rank = floor($row['rangking'] * 100) ?>
                    <div class="flex justify-center items-center mb-4">
                        <div class="radial-progress bg-primary text-primary-content border-4 border-primary" style="--value:<?= $rank ?>; --size:5rem;"><?= $rank ?>%</div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <br>
        <div class="h-1 w-full bg-slate-400 rounded-lg mb-3"></div>

        <h1 class="text-4xl font-bold text-center my-10">Perbandingan</h1>
        <div class="grid grid-cols-2 justify-between">
            <?php $index = 0 ?>
            <?php foreach ($data as $row) :?>
                <div class="w-full px-3 py-2">
                    <h4 class="text-2xl font-semibold text-center mb-3 uppercase tracking-wider rounded-md bg-purple-600 text-white p-2"><?= $row['nama'] ?></h4>
                    <div class="flex justify-between px-1">
                        <p class="font-semibold">Harga</p>
                        <p>5</p>
                    </div>
                    <progress class="mb-3 block progress progress-<?= $bar[$index] ?>" value="<?= $row['hargaFuz'] ?>" max="5"></progress>
                    <div class="flex justify-between px-1">
                        <p class="font-semibold">Kapasitas Penumpang</p>
                        <p>5</p>
                    </div>
                    <progress class="mb-3 block progress progress-<?= $bar[$index] ?>" value="<?= $row['penumpangFuz'] ?>" max="5"></progress>
                    <div class="flex justify-between px-1">
                        <p class="font-semibold">Kekuatan Mesin</p>
                        <p>5</p>
                    </div>
                    <progress class="mb-3 block progress progress-<?= $bar[$index] ?>" value="<?= $row['mesinFuz'] ?>" max="5"></progress>
                    <div class="flex justify-between px-1">
                        <p class="font-semibold">Efisiensi Bahan Bakar</p>
                        <p>5</p>
                    </div>
                    <progress class="mb-3 block progress progress-<?= $bar[$index] ?>" value="<?= $row['efisiensiFuz'] ?>" max="5"></progress>
                    <div class="flex justify-between px-1">
                        <p class="font-semibold">Pajak</p>
                        <p>5</p>
                    </div>
                    <progress class="mb-3 block progress progress-<?= $bar[$index] ?>" value="<?= $row['pajakFuz'] ?>" max="5"></progress>
                </div>
                <?php $index++ ?>
            <?php endforeach ?>
        </div>
    </div>
</div>
<br><br>
<?= $this->endSection(); ?>