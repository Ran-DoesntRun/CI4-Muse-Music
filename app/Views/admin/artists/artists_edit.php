<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="max-w-xl mx-auto mt-8 bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-bold text-center mb-6">🎤 Edit Artist</h2>

    <form action="<?= base_url(); ?>admin/artist/update/<?= $artist->id; ?>" method="post" enctype="multipart/form-data" class="space-y-4">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $artist->id; ?>">

        <div>
            <label class="block text-sm font-medium mb-1">Name</label>
            <input type="text" name="nama" value="<?= esc($artist->nama); ?>" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Type</label>
            <select name="singer_type" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" required>
                <option value="soloist" <?= $artist->type === 'soloist' ? 'selected' : ''; ?>>Soloist</option>
                <option value="group" <?= $artist->type === 'group' ? 'selected' : ''; ?>>Group</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Members</label>
            <textarea name="members" class="w-full border rounded px-3 py-2"><?= esc($artist->member); ?></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Debut Date</label>
            <input type="date" name="debut" value="<?= esc($artist->debut); ?>" class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Bio</label>
            <textarea name="bio" class="w-full border rounded px-3 py-2"><?= esc($artist->bio); ?></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Change Picture (optional)</label>
            <input type="file" name="picture" accept="image/*" class="w-full border rounded px-3 py-2">
            <p class="text-sm mt-1">Current: <img src="<?= base_url(); ?>assets/images/<?= $artist->img ?>" alt="Artist Cover" class="h-16 inline"></p>
        </div>
        <div class="text-center">
            <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white px-5 py-2 rounded-lg">Update</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>
