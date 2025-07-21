<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="max-w-xl mx-auto mt-8 bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-bold text-center mb-6">Add Artist</h2>

    <form action="<?= base_url(); ?>admin/artist/save" method="post" enctype="multipart/form-data" class="space-y-4">
        <?= csrf_field(); ?>
        <div>
            <label class="block text-sm font-medium mb-1">Name</label>
            <input type="text" name="nama" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" required>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Type</label>
            <select name="singer_type" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" required>
                <option value="soloist">Soloist</option>
                <option value="group">Group</option>
            </select>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Members</label>
            <textarea name="members" class="w-full border rounded px-3 py-2" placeholder="(Leave blank for Soloist)"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Debut Date</label>
            <input type="date" name="debut" class="w-full border rounded px-3 py-2">
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Bio</label>
            <textarea name="bio" class="w-full border rounded px-3 py-2"></textarea>
        </div>
        <div>
            <label class="block text-sm font-medium mb-1">Picture</label>
            <input type="file" name="picture" accept="image/*" class="w-full border rounded px-3 py-2">
        </div>
        <div class="text-center">
            <button type="submit" class="bg-teal-500 hover:bg-teal-600 text-black px-5 py-2 rounded-lg">Save</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>
