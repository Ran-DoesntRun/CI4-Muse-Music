<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="max-w-xl mx-auto mt-8 bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-bold text-center mb-6">Edit Album</h2>

    <form action="<?= base_url(); ?>admin/album/update/<?= $album->id; ?>" method="post" enctype="multipart/form-data" class="space-y-4">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $album->id; ?>">

        <div>
            <label class="block text-sm font-medium mb-1">Title</label>
            <input type="text" name="title" value="<?= esc($album->title); ?>" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Artist</label>
            <select name="artist_id" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" required>
                <?php foreach ($artists as $artist): ?>
                    <option value="<?= $artist->id; ?>" <?= $album->id_artists == $artist->id ? 'selected' : ''; ?>>
                        <?= esc($artist->nama); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Release Date</label>
            <input type="date" name="release" value="<?= esc($album->tgl_rilis); ?>" class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Change Cover (optional)</label>
            <input type="file" name="cover" accept="image/*" class="w-full border rounded px-3 py-2">
            <p class="text-sm mt-1">Current: <img src="<?= base_url(); ?>assets/images/<?= $album->img ?>" alt="Album Cover" class="h-16 inline"></p>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-black px-5 py-2 rounded-lg">Update</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>
