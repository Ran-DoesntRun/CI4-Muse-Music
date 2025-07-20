<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="max-w-xl mx-auto mt-8 bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-bold text-center mb-6">🎵 Add New Song</h2>

    <form action="<?= base_url(); ?>admin/song/save" method="post" enctype="multipart/form-data" class="space-y-4">
        <?= csrf_field(); ?>

        <div>
            <label class="block text-sm font-medium mb-1">Title</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Lyricist</label>
            <input type="text" name="lyricist" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Composer</label>
            <input type="text" name="composer" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Producer</label>
            <input type="text" name="producer" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Release Date</label>
            <input type="date" name="tgl_rilis" class="w-full border rounded px-3 py-2">
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
                    onclick="toggleArtistDropdown(true)"
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
                <input type="hidden" name="id_artist" id="artist-id">
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Album (optional)</label>
            <select name="id_album" id="album-dropdown" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" disabled>
                <option value="single">-- None (Single) --</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Cover Image</label>
            <input type="file" name="img" accept="image/*" class="w-full border rounded px-3 py-2">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white px-5 py-2 rounded-lg">Save</button>
        </div>
    </form>
</div>

<script>
    const artistDropdown = document.getElementById('artist-dropdown');
    const artistSearch = document.getElementById('artist-search');
    const artistHidden = document.getElementById('artist-id');
    const albumDropdown = document.getElementById('album-dropdown');

    const albums = <?= json_encode($albums); ?>;

    function toggleArtistDropdown(show) {
        artistDropdown.classList.toggle('hidden', !show);
    }

    function filterArtists() {
        const filter = artistSearch.value.toLowerCase();
        const items = artistDropdown.querySelectorAll('div');
        items.forEach(item => {
            const text = item.textContent.toLowerCase();
            item.style.display = text.includes(filter) ? '' : 'none';
        });
        toggleArtistDropdown(true);
    }

    function selectArtist(id, name) {
        artistSearch.value = name;
        artistHidden.value = id;
        toggleArtistDropdown(false);
        updateAlbums(id);
    }

    function updateAlbums(artistId) {
    albumDropdown.innerHTML = '<option value="">-- None (Single) --</option>';
    if (albums[artistId]) {
        albums[artistId].forEach(album => {
            const option = document.createElement('option');
            option.value = album.id;
            option.textContent = album.title;
            albumDropdown.appendChild(option);
        });
        albumDropdown.disabled = false;
    } else {
        albumDropdown.disabled = true;
    }
}

    document.addEventListener('click', function(event) {
        if (!artistSearch.contains(event.target) && !artistDropdown.contains(event.target)) {
            toggleArtistDropdown(false);
        }
    });
</script>
<?= $this->endSection(); ?>
