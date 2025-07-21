<?= $this->extend('users/template'); ?>


<?= $this->section('content'); ?>
<div class=" max-w-screen-xl mx-auto flex flex-col mt-5">
  <div class="flex flex-col md:flex-row shadow py-3 bg-slate-300 mb-5">
    <img src="<?= base_url() ?>assets/images/<?= $img; ?>" alt="Twice This Is For" class="my-auto size-55 mx-auto md:ml-5 md:mr-0">
    <div class="flex flex-col ml-3">
      <h2 class=" text-4xl md:text-left text-center "><?= $title; ?></h2>
      <h3>by <span class=" font-bold"><?= $singer; ?></span></h3>
      <p class="mt-6">Lyrics by <?= $lyricist ?></p>
      <p>Composed by <?= $composer; ?></p>
      <p class="mb-4">Produced by <?= $producer; ?></p>
      <p>Release Date : <?= $tgl_rilis; ?></p>
      <p class=""><?= $rating; ?><img src="<?= base_url() ?>assets/images/stars.png" alt="stars" class="h-5 w-5 inline mr-2">
      | <span class="inline ml-2"><?= $review; ?><img src="<?= base_url() ?>assets/images/reviews.png" alt="total_reviews" class="h-6 w-6 inline"></span></p>
    </div>
  </div>

  <div class="shadow pb-4 mb-5 bg-teal-300 px-5 pt-4 rounded-lg <?php if (!session()->has('email')) { echo 'hidden'; } ?>">
    <h3 class="text-2xl font-bold mb-3">REVIEW</h3>
    <form action="<?= base_url(); ?>song/comment/<?= $id; ?>" method="post" class="space-y-3">
      <?= csrf_field(); ?>
      <input type="email" name="id" id="id" value="<?= session()->get('email'); ?>" hidden>
      <div>
        <label class="block text-sm font-medium mb-1">Comment</label>
        <textarea name="comment" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" rows="3" required></textarea>
      </div>
      <div>
        <label class="block text-sm font-medium mb-1">Rating (1-5)</label>
        <input type="number" name="rating" min="1" max="5" step="0.1" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" required>
      </div>
      <div class="text-right">
        <button type="submit" class="bg-teal-600 hover:bg-teal-700 text-black px-5 py-2 rounded-lg">Post Comment</button>
      </div>
    </form>
  </div>

  <div class="shadow pb-4 bg-slate-300">
    <h3 class="text-2xl ml-5 mt-3 font-bold">
      Comments
    </h3>
    <?php 
    foreach($comments as $cmnt) { ?>
      <div class="flex flex-col mt-4 ml-5 pl-3 pb-3 shadow bg-slate-50 mr-5 rounded">
        <h3 class=" font-extrabold"><?= $cmnt -> nama; ?></h3>
        <p class=""><?= $cmnt -> rating; ?> / 5<img src="<?= base_url() ?>assets/images/stars.png" alt="stars" class="h-5 w-5 inline mr-2"></p>
        <p><?= $cmnt -> comment; ?></p>
      </div>
    <?php } ?>
  </div>
</div>
<?= $this->endSection(); ?>
