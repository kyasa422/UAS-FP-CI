<div class="bg-yellow-400 h-24 w-full flex items-center justify-between px-5">
  <div class="flex items-center hover:scale-105 transition">
    <a href="#">
      <div class="w-20 h-20 bg-black rounded-full">
        <img src="/IMG/car-toy.png" alt="moil">
      </div>
      <a href="#">
        <h1 class="text-3xl text-white font-bold mx-4">MOBIL.com</h1>
      </a>
    </a>
  </div>
  <div class="flex items-center">
    <?php if(session()->get('account')):?>
      <a href="/admin/logout" class="">
        <h1 class="text-white bg-red-600 text-2xl px-4 py-2 rounded-md font-bold hover:bg-red-700">Logout</h1>
      </a>
    <?php else : ?>
      
    <?php endif ?>
  </div>
</div>

