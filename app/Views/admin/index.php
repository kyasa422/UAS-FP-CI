<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="py-4 px-11">
    <?php if(session()->getFlashdata('update-success')) :?>
        <div class="alert alert-success my-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= session()->getFlashdata('update-success') ?></span>
        </div>
    <?php endif ?>
    <?php if(session()->getFlashdata('insert-success')) :?>
        <div class="alert alert-success my-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= session()->getFlashdata('insert-success') ?></span>
        </div>
    <?php endif ?>

    <?php if(session()->getFlashdata('delete-success')) :?>
        <div class="alert alert-success my-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= session()->getFlashdata('delete-success') ?></span>
        </div>
    <?php endif ?>

    <?php if(session()->getFlashdata('admin-login')) :?>
        <div class="alert alert-success my-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= session()->getFlashdata('admin-login') ?></span>
        </div>
    <?php endif ?>




    <a href="/admin/tambah" class="btn btn-accent text-white">[+] Tambah Mobil</a>
    <?php if (count($sedan) > 0) : ?>
        <h1 class="text-4xl text-slate-500 font-bold mt-10">Sedan</h1>
        <div class="flex items-center flex-wrap gap-8">
        <?php $i = 1 ?>
        <?php foreach ($sedan as $row) : ?>
        <!-- card mobil -->
            <div class="w-72 h-80 shadow-lg relative p-3 mt-6">
                <div class="flex justify-center items-center">
                    <div class="w-48 h-40 overflow-hidden rounded-md flex justify-center items-center">
                        <img src="/product/<?= $row['foto'] ?>" alt="mobil" class="object-cover object-center w-full">
                    </div>
                </div>
                <div class="px-4 py-3">
                    <h3 class="uppercase font-bold text-black text-xl px-2"><?= $row['nama'] ?></h3>
                    <p class="text-slate-400 font-normal text-lg px-2">Rp<?= number_format($row['harga']) ?></p>
                </div>
                <div class="absolute bottom-6 w-full grid grid-cols-2 ">
                    <div class="">
                        <button class="btn btn-outline btn-info" onclick="sedan_modal_<?= $i ?>.showModal()">Selengkapnya</button>
                            <dialog id="sedan_modal_<?= $i ?>" class="modal">
                            <form method="dialog" class="modal-box">
                                <h3 class="font-bold text-lg uppercase"><?= $row['nama'] ?></h3>
                                <div class="flex justify-center items-center">
                                    <img src="/product/<?= $row['foto'] ?>" alt="mobil" width="70%">
                                </div>
                                <div class="flex justify-between mt-2">
                                    <div class="">
                                        <p class="pt-4">Tipe : <?= $row['jenis'] ?></p>
                                        <p>Mesin : <?= $row['mesin'] ?></p>
                                        <p>Kapasitas Penumpang : <?= $row['penumpang'] ?></p>
                                    </div>
                                    <div class="">
                                        <p>Warna : <?= $row['warna'] ?> </p>
                                        <p>Efisiensi Bahan Bakar : <?= $row['efisiensi'] ?> </p>
                                        <p>Harga : Rp<?= number_format($row['harga']) ?></p>
                                        <p>Pajak : Rp<?= number_format($row['pajak']) ?></p>
                                    </div>
                                </div>
                                <div class="modal-action">
                                <!-- if there is a button in form, it will close the modal -->
                                <a href="/admin/hapus/<?= $row['id'] ?>" class="btn btn-outline btn-error">Hapus</a>
                                <button class="btn btn-outline">Tutup</button>
                                </div>
                            </form>
                            </dialog>
                    </div>
                    <div class="flex justify-center">
                        <a href="/admin/update/<?= $row['id'] ?>" class="btn btn-outline btn-warning">Update</a>
                    </div>
                </div>
            </div>
            <?php $i++ ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <?php if (count($suv) > 0) : ?>
        <h1 class="text-4xl text-slate-500 font-bold mt-10">SUV</h1>
        <div class="flex items-center flex-wrap gap-8">
            <?php $i = 1 ?>
            <?php foreach ($suv as $row) : ?>
        <!-- card mobil -->
            <div class="w-72 h-80 shadow-lg relative p-3 mt-6">
                <div class="flex justify-center items-center">
                    <div class="w-48 h-40 overflow-hidden rounded-md flex justify-center items-center">
                        <img src="/product/<?= $row['foto'] ?>" alt="mobil" class="object-cover object-center h-full">
                    </div>
                </div>
                <div class="px-4 py-3">
                    <h3 class="uppercase font-bold text-black text-xl px-2"><?= $row['nama'] ?></h3>
                    <p class="text-slate-400 font-normal text-lg px-2">Rp<?= number_format($row['harga']) ?></p>
                </div>
                <div class="absolute bottom-6 w-full grid grid-cols-2 ">
                    <div class="">
                        <button class="btn btn-outline btn-info" onclick="suv_modal<?= $i ?>.showModal()">Selengkapnya</button>
                            <dialog id="suv_modal<?= $i ?>" class="modal">
                            <form method="dialog" class="modal-box">
                                <h3 class="font-bold text-lg uppercase"><?= $row['nama'] ?></h3>
                                <div class="flex justify-center items-center">
                                    <img src="/product/<?= $row['foto'] ?>" alt="mobil" width="70%">
                                </div>
                                <div class="flex justify-between mt-2">
                                    <div class="">
                                        <p class="pt-4">Tipe : <?= $row['jenis'] ?></p>
                                        <p>Mesin : <?= $row['mesin'] ?></p>
                                        <p>Kapasitas Penumpang : <?= $row['penumpang'] ?></p>
                                    </div>
                                    <div class="">
                                        <p>Warna : <?= $row['warna'] ?> </p>
                                        <p>Efisiensi Bahan Bakar : <?= $row['efisiensi'] ?> </p>
                                        <p>Harga : Rp<?= number_format($row['harga']) ?></p>
                                        <p>Pajak : Rp<?= number_format($row['pajak']) ?></p>
                                    </div>
                                </div>
                                <div class="modal-action">
                                <!-- if there is a button in form, it will close the modal -->
                                <a href="/admin/hapus/<?= $row['id'] ?>" class="btn btn-outline btn-error">Hapus</a>
                                <button class="btn btn-outline">Tutup</button>
                                </div>
                            </form>
                            </dialog>
                    </div>
                    <div class="flex justify-center">
                        <a href="/admin/update/<?= $row['id'] ?>" class="btn btn-outline btn-warning">Update</a>
                    </div>
                </div>
            </div>
            <?php $i++ ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <?php if (count($minibus) > 0) : ?>
        <h1 class="text-4xl text-slate-500 font-bold mt-10">Minibus</h1>
        <div class="flex items-center flex-wrap gap-8">
            <?php $i = 1 ?>
            <?php foreach ($minibus as $row) : ?>
                <!-- card mobil -->
                <div class="w-72 h-80 shadow-lg relative p-3 mt-6">
                    <div class="flex justify-center items-center">
                        <div class="w-48 h-40 overflow-hidden rounded-md flex justify-center items-center">
                            <img src="/product/<?= $row['foto'] ?>" alt="mobil" class="object-cover object-center h-full">
                        </div>
                    </div>
                    <div class="px-4 py-3">
                        <h3 class="uppercase font-bold text-black text-xl px-2"><?= $row['nama'] ?></h3>
                        <p class="text-slate-400 font-normal text-lg px-2">Rp<?= number_format($row['harga']) ?></p>
                    </div>
                   <div class="absolute bottom-6 w-full grid grid-cols-2 ">
                    <div class="">
                        <button class="btn btn-outline btn-info" onclick="minibus_modal<?= $i ?>.showModal()">Selengkapnya</button>
                            <dialog id="minibus_modal<?= $i ?>" class="modal">
                            <form method="dialog" class="modal-box">
                                <h3 class="font-bold text-lg uppercase"><?= $row['nama'] ?></h3>
                                <div class="flex justify-center items-center">
                                    <img src="/product/<?= $row['foto'] ?>" alt="mobil" width="70%">
                                </div>
                                <div class="flex justify-between mt-2">
                                    <div class="">
                                        <p class="pt-4">Tipe : <?= $row['jenis'] ?></p>
                                        <p>Mesin : <?= $row['mesin'] ?></p>
                                        <p>Kapasitas Penumpang : <?= $row['penumpang'] ?></p>
                                    </div>
                                    <div class="">
                                        <p>Warna : <?= $row['warna'] ?> </p>
                                        <p>Efisiensi Bahan Bakar : <?= $row['efisiensi'] ?> </p>
                                        <p>Harga : Rp<?= number_format($row['harga']) ?></p>
                                        <p>Pajak : Rp<?= number_format($row['pajak']) ?></p>
                                    </div>
                                </div>
                                <div class="modal-action">
                                <!-- if there is a button in form, it will close the modal -->
                                <a href="/admin/hapus/<?= $row['id'] ?>" class="btn btn-outline btn-error">Hapus</a>
                                <a href="#">Hapus</a>
                                <button class="btn btn-outline">Tutup</button>
                                </div>
                            </form>
                            </dialog>
                    </div>
                    <div class="flex justify-center">
                        <a href="/admin/update/<?= $row['id'] ?>" class="btn btn-outline btn-warning">Update</a>
                    </div>
                </div>
                </div>
                <?php $i++ ?>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
<br><br>
<?= $this->endSection(); ?>