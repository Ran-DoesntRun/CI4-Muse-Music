<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="w-full max-w-lg flex flex-col bg-amber-200 mt-4 mx-auto space-y-2 pb-5 shadow items-center">
  <img class=" size-40" src='<?= base_url() ?>assets/images/logo.png'>
  <form action="<?= base_url() ?>admin/register" class="w-full flex flex-col">
    <label for="username" class="ml-10 font-semibold">USERNAME</label>
    <input type="text" name="username" id="username" placeholder="Username" class="mx-10 shadow px-3 py-0.5 bg-white">
    <label for="nama" class="ml-10 font-semibold mt-4">NAME</label>
    <input type="text" name="nama" id="nama" placeholder="Your Name" class="mx-10 shadow px-3 py-0.5 bg-white">
    <label for="password" class="ml-10 font-semibold mt-4">PASSWORD</label>
    <input type="password" name="password" id="password" placeholder="password" class="mx-10 shadow px-3 py-0.5 bg-white">
    <input type="submit" value="SIGN UP" class="mx-10 shadow text-center bg-emerald-100 mt-5 rounded-sm py-1">
  </form></div>
<?= $this->endSection(); ?>