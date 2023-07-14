<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="py-4 px-11">
    <a href="/admin/tambah" class="btn btn-accent text-white">[+] Tambah Mobil</a>
    <h1 class="text-4xl text-slate-500 font-bold mt-10">Sedan</h1>
    <div class="flex items-center flex-wrap gap-8">
        <!-- card mobil -->
        <div class="w-72 h-80 shadow-lg relative p-3 mt-6">
            <div class="flex justify-center items-center">
                <img src="/IMG/mobil1.png" alt="mobil" width="70%">
            </div>
            <div class="px-4 py-3">
                <h3 class="uppercase font-bold text-black text-xl px-2">mercedes</h3>
                <p class="text-slate-400 font-normal text-lg px-2">Rp230.000.000</p>
            </div>
            <div class="absolute bottom-6 right-0 w-full px-6 ">
                <a href="#" class="bg-black text-white text-center block py-2 hover:bg-red-500 transition duration-500">SELENGKAPNYA</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>