<?= $this->extend('users/template'); ?>

<?= $this->section('content'); ?>
<div class="w-full max-w-lg flex flex-col bg-amber-200 mt-4 mx-auto space-y-2 pb-5 shadow items-center">
  <img class=" size-40" src='<?= base_url() ?>assets/images/logo.png'>
  <form action="<?= base_url() ?>login/auth" class="w-full flex flex-col" method="post">
    <label for="email" class="ml-10 font-semibold">EMAIL</label>
    <input type="email" name="email" id="email" placeholder="example@gmail.com" class="mx-10 shadow px-3 py-0.5 bg-white">
    <label for="password" class="ml-10 font-semibold mt-4">PASSWORD</label>
    <input type="password" name="password" id="password" placeholder="password" class="mx-10 shadow px-3 py-0.5 bg-white">
    <input type="submit" value="LOGIN" class="mx-10 shadow text-center bg-emerald-100 mt-5 rounded-sm py-1">
  </form>
  <p>Don't have an account? <a href="<?= base_url() ?>signup"><span class=" text-blue-500">Sign Up Here</span></a>.</p>
</div>
<?= $this->endSection(); ?>