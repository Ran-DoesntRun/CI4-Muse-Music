<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="w-full max-w-lg flex flex-col bg-slate-400 mt-4 mx-auto space-y-2 pb-5 shadow items-center">
  <img class=" size-40" src='<?= base_url() ?>assets/images/logo.png'>
  <form action="<?= base_url() ?>admin/save" class="w-full flex flex-col" method="post">
    <input type="text" name="type" id="type" hidden value="admin">
    <label for="email" class="ml-10 font-semibold">EMAIL</label>
    <input type="email" name="email" id="email" placeholder="Email" class="mx-10 shadow px-3 py-0.5 bg-white">
    <label for="nama" class="ml-10 font-semibold mt-4">NAME</label>
    <input type="text" name="nama" id="nama" placeholder="Name" class="mx-10 shadow px-3 py-0.5 bg-white">
    <label for="password" class="ml-10 font-semibold mt-4">PASSWORD</label>
    <input type="password" name="password" id="password" placeholder="password" class="mx-10 shadow px-3 py-0.5 bg-white">
    <input type="submit" value="SIGN UP" class="mx-10 shadow text-center bg-teal-400 mt-5 rounded-sm py-1">
  </form></div>
<?= $this->endSection(); ?>