<?= $this->extend('users/template'); ?>

<?= $this->section('content'); ?>
<div class="w-full max-w-screen-xl flex flex-col bg-slate-300 mt-4 mx-auto space-y-2 pb-5">
  <h1 class=" w-full text-center text-2xl font-bold mt-4">TOP 10 SINGER</h1>
  <?php 
  foreach($items as $it) { ?>
  <a href="<?= base_url() ?>singer/<?= $it -> id?>">
  <div class=" w-6.5xl mt-3 flex flex-row h-30 ml-4 mr-4 bg-slate-200 rounded-2xl justify-items-center align-middle space-x-4">
    <img src="<?= base_url(); ?>assets/images/<?= $it -> img; ?>"  alt="This Is For" class="max-w-20 max-h-20 my-auto ml-4 rounded-2xl">
    <div class="flex flex-col md:flex-row md:justify-between items-center h-full text-xl self-center w-full mr-3">
      <h3 class="w-full md:w-8/12"><?= $it -> nama; ?></h3>
      <p class="w-full md:w-2/12"><?= $it -> rating; ?><img src="<?= base_url() ?>assets/images/stars.png" alt="stars" class="h-5 w-5 inline"></p>
      <p class="w-full md:w-2/12"><?= $it -> review; ?><img src="<?= base_url() ?>assets/images/reviews.png" alt="total_reviews" class="h-6 w-6 inline"></p>
    </div>
  </div>
  </a>
  <?php } ?>
</div>
<?= $this->endSection(); ?>