<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="w-full max-w-screen-xl mx-auto mt-8">
    <h2 class="text-2xl font-bold text-white bg-slate-500 rounded-md shadow px-4 py-3 mb-4">
        Artists
    </h2>

    <div class="flex justify-between mb-4 w-full">
    <a href="<?= base_url('admin/artists/create'); ?>" 
       class="bg-slate-400 text-center w-full hover:bg-slate-500 text-white px-4 py-2 rounded-lg shadow">
        + Add New Artist
    </a>
    </div>
    <div class="overflow-x-auto shadow rounded-xl bg-white">
        <table class="min-w-full table-fixed divide-y divide-gray-200">
            <thead class="bg-slate-500 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-48">Name</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-32">Type</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-48">Members</th>
                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider w-32">Debut</th>
                    <th class="px-4 py-3 text-center text-xs font-bold uppercase tracking-wider w-40">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach($artists as $artist): ?>
                <tr class="hover:bg-purple-50 transition duration-200">
                    <td class="px-4 py-2 truncate w-48 text-sm font-medium text-gray-900" title="<?= $artist->nama; ?>">
                        <?= $artist->nama; ?>
                    </td>
                    <td class="px-4 py-2 truncate w-32 text-sm text-slate-700"><?= $artist->type; ?></td>
                    <td class="px-4 py-2 truncate <?= $artist->type != 'Soloist' ? $artist->member : 'hidden' ?> w-48 text-sm text-gray-700">
                        <?= $artist->type != 'Soloist' ? $artist->member : '-' ?>
                    </td>
                    <td class="px-4 py-2 truncate w-32 text-sm text-slate-700"><?= $artist->debut; ?></td>
                    <td class="px-4 py-2 text-center space-x-2">
                        <a href="<?= base_url() ?>admin/artists/edit/<?= $artist->id; ?>"
                           class="inline-block bg-slate-500 hover:bg-slate-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
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
