<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/style.css">
    <title>LOGIN</title>
</head>
<body style="background-image: url(/IMG/bg-login.jpg); background-size: cover; background-position: center;">
    <?php $error = session()->get('_ci_validation_errors'); ?>
    <div class="p-3">
        <?php if (session()->getFlashdata('login-false')):?>
            <div class="alert alert-error">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                <span><?= session()->getFlashdata('login-false') ?></span>
            </div>
        <?php endif ?>
    </div>
    <div class="flex justify-center items-center h-screen">
        <div class="w-72 sm:w-80 md:w-[550px] shadow-xl p-3" style="
        background: rgba(255, 255, 255, 0.2);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.3);">

            <h2 class="text-white font-bold text-2xl sm:text-3xl text-center mt-2 ">ADMIN</h2>

            <form action="/auth" method="post">
                <div class="px-3 mt-3">
                    <input type="email" name="email" id="email" class="w-full drop-shadow-md rounded-md px-2 py-1 bg-slate-100 outline-none" placeholder="Masukan Email" value="<?= old('email') ?>" autocomplete="off">
                    <?php if(isset($error['email'])) :?>
                        <span class="text-red-600 font-bold"><?= $error['email']; ?></span>
                    <?php endif ?>
                    <input type="password" name="password" id="password" class="w-full drop-shadow-md rounded-md px-2 py-1 mt-4 bg-slate-100 outline-none" placeholder="Masukan Password" value="<?= old('password') ?>" autocomplete="off">
                    <?php if(isset($error['password'])) :?>
                        <span class="text-red-600 font-bold"><?= $error['password']; ?></span>
                    <?php endif ?>
                    <button class="w-full text-white bg-green-500 rounded-md text-center mt-5 p-1 mb-1 hover:bg-green-700 transition">Log in</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>