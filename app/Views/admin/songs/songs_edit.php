<?= $this->extend('admin/template'); ?>

<?= $this->section('content'); ?>
<div class="max-w-xl mx-auto mt-8 bg-white shadow rounded-lg p-6">
    <h2 class="text-2xl font-bold text-center mb-6">🎵 Edit Song</h2>

    <form action="<?= base_url('admin/song/update/' . $song->id); ?>" method="post" enctype="multipart/form-data" class="space-y-4">
        <?= csrf_field(); ?>
        <input type="hidden" name="id" value="<?= $song -> id; ?>">

        <div>
            <label class="block text-sm font-medium mb-1">Title</label>
            <input type="text" name="title" value="<?= esc($song->title); ?>" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" required>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Artist</label>
            <select name="id_artist" id="artist-select" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300" onchange="updateAlbums(this.value)">
                <?php foreach ($artists as $artist): ?>
                    <option value="<?= $artist->id; ?>" <?= $song->id_artist == $artist->id ? 'selected' : ''; ?>>
                        <?= esc($artist->nama); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Album (optional)</label>
            <select name="id_album" id="album-select" class="w-full border rounded px-3 py-2 focus:ring focus:ring-purple-300">
                <option value="">-- None (Single) --</option>
                <?php foreach ($albums[$song->id_artist] ?? [] as $album): ?>
                    <option value="<?= $album->id; ?>" <?= $song->id_album == $album->id ? 'selected' : ''; ?>>
                        <?= esc($album->title); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Lyricist</label>
            <input type="text" name="lyricist" value="<?= esc($song->lyricist); ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Composer</label>
            <input type="text" name="composer" value="<?= esc($song->composer); ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Producer</label>
            <input type="text" name="producer" value="<?= esc($song->producer); ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Release Date</label>
            <input type="date" name="tgl_rilis" value="<?= esc($song->tgl_rilis); ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Change Cover (optional)</label>
            <input type="file" name="img" accept="image/*" class="w-full border rounded px-3 py-2">
            <p class="text-sm mt-1">Current: <img src="<?= base_url('assets/images/' . $song->img); ?>" alt="Song Cover" class="h-16 inline"></p>
        </div>

        <div class="text-center">
            <button type="submit" class="bg-purple-500 hover:bg-purple-600 text-white px-5 py-2 rounded-lg">Update</button>
        </div>
    </form>
</div>

<script>
    const allAlbums = <?= json_encode($albums); ?>;
    const currentAlbum = <?= json_encode($song->id_album); ?>;

    function updateAlbums(artistId) {
        const albumSelect = document.getElementById('album-select');
        albumSelect.innerHTML = '<option value="">-- None (Single) --</option>';
        if (allAlbums[artistId]) {
            allAlbums[artistId].forEach(album => {
                const option = document.createElement('option');
                option.value = album.id;
                option.textContent = album.title;
                if (album.id == currentAlbum) {
                    option.selected = true;
                }
                albumSelect.appendChild(option);
            });
        }
    }
</script>
<?= $this->endSection(); ?>
