<?= $this->extend('admin/template'); ?>


<?= $this->section('content'); ?>
<div class=" max-w-screen-xl mx-auto flex flex-col mt-5">

<div class="shadow pb-4">
  <h2 class="text-2xl font-bold text-white bg-slate-500 rounded-md shadow px-4 py-3 mb-4">
        <?= $title; ?> by <?= $singer; ?>
    </h2>
    <h3 class="text-2xl ml-5 mt-3 font-bold">
      Comments
    </h3>
    <?php 
    foreach($comments as $cmnt) { ?>
      <div class="flex flex-col mt-4 ml-5 px-3 pb-3 shadow bg-slate-100 mr-5 rounded">
        <h3 class=" font-extrabold mt-3"><?= $cmnt -> nama; ?></h3>
        <p class=""><?= $cmnt -> rating; ?> / 5<img src="<?= base_url() ?>assets/images/stars.png" alt="stars" class="h-5 w-5 inline mr-2"></p>
        <p><?= $cmnt -> comment; ?></p>
        <a href="admin/review/delete/<?= $cmnt -> id; ?>" class="w-full bg-red-500 rounded-md shadow text-center mr-5 py-1 my-2 text-white font-bold">DELETE</a>
      </div>
    <?php } ?>
  </div>
</div>
<?= $this->endSection(); ?>
