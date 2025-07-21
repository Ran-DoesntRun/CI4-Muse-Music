<?= $this->extend('users/template'); ?>

<?= $this->section('content'); ?>
<div class=" max-w-screen-xl mx-auto flex flex-col mt-5">
    <div class="flex flex-row shadow py-3 bg-gray-200 mb-5">
      <img src="<?= base_url() ?>assets/images/<?= $img; ?>" alt="Twice This Is For" class="my-auto size-55 mx-auto md:ml-5 md:mr-0">
      <div class="flex flex-col bg-gray-200 mb-5 ml-2.5">
        <h2 class=" text-4xl md:text-left text-center "><?= $title; ?></h2>
        <h3>by <span class=" font-bold"><?= $singer; ?></span></h3>
        <p class="mt-25">Release Date : <?= $release; ?></p>
        <p class=""><?= $rating; ?><img src="<?= base_url() ?>assets/images/stars.png" alt="stars" class="h-5 w-5 inline mr-2">
        | <span class="inline ml-2"><?= $review; ?><img src="<?= base_url() ?>assets/images/reviews.png" alt="total_reviews" class="h-6 w-6 inline"></span></p>
        </div>
    </div>
    <div class="flex flex-col mb-5 bg-gray-200 shadow pb-4">
      <h3 class="text-2xl ml-5 mt-3 font-bold">
        TRACKLIST
      </h3>
      <?php 
      $i = 1;
        foreach($items as $it) { ?>
        <a href="<?= base_url() ?><?= $subject ?>/<?= $it->id?>">
          <div class="flex flex-col md:flex-row md:justify-between items-center h-full text-xl self-center font-serif w-full mr-3 mt-3">
            <p class="w-full md:w-1/12 text-center"> <?= $i; $i++; ?></p>
            <h3 class="w-full md:w-7/12"><?= $it -> judul; ?></h3>
            <p class="w-full md:w-2/12"><?= $it -> rating; ?><img src="<?= base_url() ?>assets/images/stars.png" alt="stars" class="h-5 w-5 inline"></p>
            <p class="w-full md:w-2/12"><?= $it -> review; ?><img src="<?= base_url() ?>assets/images/reviews.png" alt="total_reviews" class="h-6 w-6 inline"></p>
          </div>
        </a>
      <?php } ?>
      
    </div>
</div>
<?= $this->endSection(); ?>