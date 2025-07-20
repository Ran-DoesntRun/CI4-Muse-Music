<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="w-full max-w-screen-xl mx-auto mt-8">
    <!-- 🎤 Artists Page Header -->
    <h2 class="text-2xl font-bold text-white bg-purple-500 rounded-md shadow px-4 py-3 mb-4">
        🎤 Artists Page
    </h2>

    <div class="flex justify-between mb-4">
    <!-- ➕ Add New Button -->
    <a href="<?= base_url('admin/artists/create'); ?>" 
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

    <!-- 👤 ARTISTS TABLE -->
    <div class="overflow-x-auto shadow rounded-xl bg-white">
        <table class="min-w-full table-fixed divide-y divide-gray-200">
            <!-- Table Header -->
            <thead class="bg-purple-500 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-48">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-32">Type</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-48">Members</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-32">Debut</th>
                    <th class="px-4 py-3 text-center text-xs font-bold uppercase tracking-wider w-32">Review</th>
                    <th class="px-4 py-3 text-center text-xs font-bold uppercase tracking-wider w-40">Action</th>
                </tr>
            </thead>

            <!-- Table Body -->
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach($artists as $artist): ?>
                <tr class="hover:bg-purple-50 transition duration-200">
                    <td class="px-4 py-2 truncate w-48 text-sm font-medium text-gray-900" title="<?= $artist->nama; ?>">
                        <?= $artist->nama; ?>
                    </td>
                    <td class="px-4 py-2 truncate w-32 text-sm text-gray-700"><?= $artist->type; ?></td>
                    <td class="px-4 py-2 truncate <?= $artist->type != 'Soloist' ? $artist->member : 'hidden' ?> w-48 text-sm text-gray-700">
                        <?= $artist->type != 'Soloist' ? $artist->member : '-' ?>
                    </td>
                    <td class="px-4 py-2 truncate w-32 text-sm text-gray-700"><?= $artist->debut; ?></td>
                    <td class="px-4 py-2 text-center">
                        <a href="<?= base_url() ?>admin/artist/review/<?= $artist->id; ?>"
                           class="inline-block bg-purple-400 hover:bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                           Review
                        </a>
                    </td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <a href="<?= base_url() ?>admin/artists/edit/<?= $artist->id; ?>"
                           class="inline-block bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                           Edit
                        </a>
                        <a href="<?= base_url() ?>admin/artist/delete/<?= $artist->id; ?>"
                           class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                           Delete
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
