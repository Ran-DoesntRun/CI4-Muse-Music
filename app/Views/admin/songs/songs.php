<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="w-full max-w-screen-xl mx-auto mt-8">
<h2 class="text-2xl font-bold text-white bg-amber-500 rounded-md shadow px-4 py-3 mb-4">
    Songs
</h2>
    <div class="flex justify-between mb-4">
    <!-- ➕ Add New Button -->
    <a href="<?= base_url('admin/songs/create'); ?>" 
       class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow">
        + Add New Song
    </a>

    <!-- 🔍 Search Form -->
    <form action="" method="get" class="flex">
        <input 
            type="text" 
            name="search" 
            value="<?= esc($search ?? '') ?>" 
            placeholder="Search by title..." 
            class="border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 w-64"
        >
        <button 
            type="submit" 
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-lg">
            Search
        </button>
    </form>
</div>

    <!-- 🎵 SONGS TABLE -->
    <div class="overflow-x-auto shadow rounded-xl bg-white">
        <table class="min-w-full table-fixed divide-y divide-gray-200">
            <!-- Table Header -->
            <thead class="bg-amber-500 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-48">Title</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-48">Album</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-32">Singer</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-48">Lyricist</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-48">Composers</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-48">Producers</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-32">Release</th>
                    <th class="px-4 py-3 text-center text-xs font-bold uppercase tracking-wider w-32">Review</th>
                    <th class="px-4 py-3 text-center text-xs font-bold uppercase tracking-wider w-40">Action</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="bg-white divide-y divide-gray-200">
                <?php if(!empty($songs)) : ?>
                    <?php foreach($songs as $song): ?>
                    <tr class="hover:bg-amber-50 transition duration-200">
                        <td class="px-4 py-2 truncate w-48 text-sm font-medium text-gray-900" title="<?= $song->title; ?>">
                            <?= $song->title; ?>
                        </td>
                        <td class="px-4 py-2 truncate w-48 text-sm text-gray-700" title="<?= $song->album; ?>">
                            <?= $song->album; ?>
                        </td>
                        <td class="px-4 py-2 truncate w-32 text-sm text-gray-700" title="<?= $song->singer; ?>">
                            <?= $song->singer; ?>
                        </td>
                        <td class="px-4 py-2 truncate w-48 text-sm text-gray-700" title="<?= $song->lyricist; ?>">
                            <?= $song->lyricist; ?>
                        </td>
                        <td class="px-4 py-2 truncate w-48 text-sm text-gray-700" title="<?= $song->composer; ?>">
                            <?= $song->composer; ?>
                        </td>
                        <td class="px-4 py-2 truncate w-48 text-sm text-gray-700" title="<?= $song->producer; ?>">
                            <?= $song->producer; ?>
                        </td>
                        <td class="px-4 py-2 truncate w-32 text-sm text-gray-700"><?= $song->tgl_rilis; ?></td>
                        <td class="px-4 py-2 text-center">
                            <a href="<?= base_url() ?>admin/song/review/<?= $song->id; ?>"
                            class="inline-block bg-amber-400 hover:bg-amber-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                            Review
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center space-x-2">
                        <a href="<?= base_url() ?>admin/song/edit/<?= $song->id; ?>"
                           class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                           Edit
                        </a>
                        <a href="<?= base_url() ?>admin/song/delete/<?= $song->id; ?>"
                           class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                           Delete
                        </a>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center py-4 text-gray-500">No songs found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
