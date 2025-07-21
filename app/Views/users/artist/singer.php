<?= $this->extend('users/template'); ?>

<?= $this->section('content'); ?>
<div class=" max-w-screen-xl mx-auto flex flex-col mt-5">
    <div class="flex flex-col md:flex-row h-full shadow py-3 bg-slate-400 mb-5">
        <img src="<?= base_url() ?>assets/images/<?= $img; ?>" alt="Twice This Is For" class="my-auto size-55 mx-auto md:ml-5 md:mr-0">
        <div class="flex flex-col justify-between ml-3 h-55">
            <div>
                <h2 class="text-4xl md:text-left text-center"><?= $title; ?></h2>
                <h3><span class="font-bold capitalize"><?= $singer_type; ?></span></h3>
                <?php if ($singer_type != 'Soloist') { ?>
                    <p>Members : <?= $members; ?></p>
                <?php } ?>
                <p>Debut : <?= $debut; ?></p>
            </div>
            <p class="mt-3"><?= $rating; ?>
                <img src="<?= base_url() ?>assets/images/stars.png" alt="stars" class="h-5 w-5 inline mr-2">
                | <span class="inline ml-2"><?= $review; ?>
                    <img src="<?= base_url() ?>assets/images/reviews.png" alt="total_reviews" class="h-6 w-6 inline">
                </span>
            </p>
        </div>
    </div>

  <div class="flex flex-col shadow py-3 bg-slate-400 mb-5">
    <h2 class="ml-5 text-lg font-bold">ABOUT <?= $title; ?></h2>
    <p class="ml-5"><?= $bio; ?></p>
  </div>
  <div class="w-full max-w-screen-xl flex flex-col bg-slate-400 mt-4 mx-auto space-y-2 pb-5">
    <h1 class=" w-full text-center text-2xl font-bold mt-4 capitalize">POPULAR SONGS</h1>
    <?php foreach($songs as $it) { ?>
    <a href="<?= base_url() ?>song/<?= $it->id?>">
      <div class=" w-6.5xl mt-3 flex flex-row h-30 ml-4 mr-4 bg-gray-200 rounded-2xl justify-items-center align-middle space-x-4">
        <img src="<?= base_url(); ?>assets/images/<?= $it -> img; ?>"  alt="This Is For" class="max-w-20 max-h-20 my-auto ml-4 rounded-2xl">
        <div class="flex flex-col md:flex-row md:justify-between items-center h-full text-xl self-center font-serif w-full mr-3">
          <h3 class="w-full md:w-4/12"><?= $it -> judul; ?></h3>
          <p class="w-full md:w-2/12"><?= $it -> rating; ?><img src="<?= base_url() ?>assets/images/stars.png" alt="stars" class="h-5 w-5 inline"></p>
          <p class="w-full md:w-2/12"><?= $it -> review; ?><img src="<?= base_url() ?>assets/images/reviews.png" alt="total_reviews" class="h-6 w-6 inline"></p>
        </div>
      </div>
    </a>
    <?php } ?>
  </div>
  <div class="w-full max-w-screen-xl flex flex-col bg-slate-400 mt-4 mx-auto space-y-2 pb-5">
    <h1 class=" w-full text-center text-2xl font-bold mt-4 capitalize">POPULAR ALBUMS</h1>
    <?php foreach($album as $it) { ?>
    <a href="<?= base_url() ?>album/<?= $it->id?>">
      <div class=" w-6.5xl mt-3 flex flex-row h-30 ml-4 mr-4 bg-gray-200 rounded-2xl justify-items-center align-middle space-x-4">
        <img src="<?= base_url(); ?>assets/images/<?= $it -> img; ?>"  alt="This Is For" class="max-w-20 max-h-20 my-auto ml-4 rounded-2xl">
        <div class="flex flex-col md:flex-row md:justify-between items-center h-full text-xl self-center font-serif w-full mr-3">
          <h3 class="w-full md:w-4/12"><?= $it -> judul; ?></h3>
          <p class="w-full md:w-2/12"><?= $it -> rating; ?><img src="<?= base_url() ?>assets/images/stars.png" alt="stars" class="h-5 w-5 inline"></p>
          <p class="w-full md:w-2/12"><?= $it -> review; ?><img src="<?= base_url() ?>assets/images/reviews.png" alt="total_reviews" class="h-6 w-6 inline"></p>
        </div>
      </div>
    </a>
    <?php } ?>
  </div>
</div>
<?= $this->endSection(); ?>