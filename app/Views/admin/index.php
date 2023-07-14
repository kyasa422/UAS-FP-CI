<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="py-4 px-11">
    <a href="/admin/tambah" class="btn btn-accent text-white">[+] Tambah Mobil</a>
    <?php if (count($sedan) > 0) : ?>
        <h1 class="text-4xl text-slate-500 font-bold mt-10">Sedan</h1>
        <?php foreach ($sedan as $row) : ?>
        <div class="flex items-center flex-wrap gap-8">
        <!-- card mobil -->
            <div class="w-72 h-80 shadow-lg relative p-3 mt-6">
                <div class="flex justify-center items-center">
                    <img src="/product/<?= $row['foto'] ?>" alt="mobil" width="70%">
                </div>
                <div class="px-4 py-3">
                    <h3 class="uppercase font-bold text-black text-xl px-2"><?= $row['nama'] ?></h3>
                    <p class="text-slate-400 font-normal text-lg px-2">Rp<?= number_format($row['harga']) ?></p>
                </div>
                <div class="absolute bottom-6 right-0 w-full px-6 ">
                <button class="btn" onclick="my_modal_2.showModal()">Selengkapnya</button>
                    <dialog id="my_modal_2" class="modal">
                    <form method="dialog" class="modal-box">
                        <h3 class="font-bold text-lg"><?= $row['nama'] ?></h3>
                        <div class="flex justify-center items-center">
                        <img src="/product/<?= $row['foto'] ?>" alt="mobil" width="70%">
                        </div>
                        <p class="pt-4">Tipe : <?= $row['jenis'] ?></p>
                        <p>Mesin : <?= $row['mesin'] ?></p>
                        <p>Kapasitas Penumpang : <?= $row['penumpang'] ?></p>
                        <div class="modal-action">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                        </div>
                    </form>
                    </dialog>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (count($minibus) > 0) : ?>
        <h1 class="text-4xl text-slate-500 font-bold mt-10">Minibus</h1>
        <?php foreach ($minibus as $row) : ?>
        <div class="flex items-center flex-wrap gap-8">
        <!-- card mobil -->
            <div class="w-72 h-80 shadow-lg relative p-3 mt-6">
                <div class="flex justify-center items-center">
                    <img src="/product/<?= $row['foto'] ?>" alt="mobil" width="70%">
                </div>
                <div class="px-4 py-3">
                    <h3 class="uppercase font-bold text-black text-xl px-2"><?= $row['nama'] ?></h3>
                    <p class="text-slate-400 font-normal text-lg px-2">Rp<?= number_format($row['harga']) ?></p>
                </div>
                <div class="absolute bottom-6 right-0 w-full px-6 ">
                <button class="btn" onclick="my_modal_3.showModal()">Selengkapnya</button>
                    <dialog id="my_modal_3" class="modal">
                    <form method="dialog" class="modal-box">
                        <h3 class="font-bold text-lg"><?= $row['nama'] ?></h3>
                        <div class="flex justify-center items-center">
                        <img src="/product/<?= $row['foto'] ?>" alt="mobil" width="70%">
                        </div>
                        <p class="pt-4">Tipe : <?= $row['jenis'] ?></p>
                        <p>Mesin : <?= $row['mesin'] ?></p>
                        <p>Kapasitas Penumpang : <?= $row['penumpang'] ?></p>
                        <div class="modal-action">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                        </div>
                    </form>
                    </dialog>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php if (count($suv) > 0) : ?>
        <h1 class="text-4xl text-slate-500 font-bold mt-10">SUV</h1>
        <?php foreach ($suv as $row) : ?>
        <div class="flex items-center flex-wrap gap-8">
        <!-- card mobil -->
            <div class="w-72 h-80 shadow-lg relative p-3 mt-6">
                <div class="flex justify-center items-center">
                    <img src="/product/<?= $row['foto'] ?>" alt="mobil" width="70%">
                </div>
                <div class="px-4 py-3">
                    <h3 class="uppercase font-bold text-black text-xl px-2"><?= $row['nama'] ?></h3>
                    <p class="text-slate-400 font-normal text-lg px-2">Rp<?= number_format($row['harga']) ?></p>
                </div>
                <div class="absolute bottom-6 right-0 w-full px-6 ">
                <button class="btn" onclick="my_modal_1.showModal()">Selengkapnya</button>
                    <dialog id="my_modal_1" class="modal">
                    <form method="dialog" class="modal-box">
                        <h3 class="font-bold text-lg"><?= $row['nama'] ?></h3>
                        <div class="flex justify-center items-center">
                        <img src="/product/<?= $row['foto'] ?>" alt="mobil" width="70%">
                        </div>
                        <p class="pt-4">Tipe : <?= $row['jenis'] ?></p>
                        <p>Mesin : <?= $row['mesin'] ?></p>
                        <p>Kapasitas Penumpang : <?= $row['penumpang'] ?></p>
                        <div class="modal-action">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                        </div>
                    </form>
                    </dialog>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>