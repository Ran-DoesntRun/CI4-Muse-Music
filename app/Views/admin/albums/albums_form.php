<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="max-w-xl mx-auto mt-8 bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-bold text-center mb-6">💿 Add New Album</h2>

    <form action="<?= base_url(); ?>admin/album/save" method="post" enctype="multipart/form-data" class="space-y-4">
        <?= csrf_field(); ?>
        <div>
            <label class="block text-sm font-medium mb-1">Title</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Artist</label>
            <div class="relative">
                <input 
                    type="text" 
                    id="artist-search" 
                    placeholder="Search artist..." 
                    class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300"
                    onkeyup="filterArtists()"
                    onclick="toggleDropdown(true)"
                >
                <div 
                    id="artist-dropdown" 
                    class="absolute z-10 w-full bg-white border border-gray-300 rounded shadow hidden max-h-48 overflow-y-auto"
                >
                    <?php foreach ($artists as $artist): ?>
                        <div 
                            class="px-4 py-2 hover:bg-purple-100 cursor-pointer" 
                            onclick="selectArtist('<?= $artist->id; ?>', '<?= $artist->nama; ?>')">
                            <?= $artist->nama; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <input type="hidden" name="artist_id" id="artist-id">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Release Date</label>
            <input type="date" name="release" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Cover Image</label>
            <input type="file" name="cover" accept="image/*" class="w-full border rounded px-3 py-2">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white px-5 py-2 rounded-lg">Save</button>
        </div>
    </form>
</div>

<script>
    const dropdown = document.getElementById('artist-dropdown');
    const searchInput = document.getElementById('artist-search');
    const hiddenInput = document.getElementById('artist-id');

    function toggleDropdown(show) {
        dropdown.classList.toggle('hidden', !show);
    }

    function filterArtists() {
        const filter = searchInput.value.toLowerCase();
        const items = dropdown.querySelectorAll('div');
        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(filter) ? '' : 'none';
        });
        toggleDropdown(true);
    }

    function selectArtist(id, name) {
        searchInput.value = name;
        hiddenInput.value = id;
        toggleDropdown(false);
    }

    document.addEventListener('click', function(event) {
        if (!searchInput.contains(event.target) && !dropdown.contains(event.target)) {
            toggleDropdown(false);
        }
    });
</script>
<?= $this->endSection(); ?>
