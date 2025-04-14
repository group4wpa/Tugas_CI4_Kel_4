<?= $this->extend('templates/user'); ?>

<?= $this->section('page-content'); ?>

<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow-lg p-4 text-center" style="max-width: 500px; width: 100%; border-radius: 15px;">
        <div class="d-flex flex-column align-items-center">
            <!-- Tampilkan Foto Profil -->
            <img src="<?= base_url($profile['avatar'] ?? 'uploads/avatars/default.png') ?>?t=<?= time(); ?>"
                class="rounded-circle shadow-sm mb-3"
                alt="Profile Picture"
                width="120" height="120"
                style="object-fit: cover; border: 4px solid #ddd;">



            <h4 class="fw-bold"><?= $user['name'] ?></h4>
            <p class="text-muted"><?= $user['email'] ?></p>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <!-- Bagian Profil -->
        <div id="profileView">
            <div class="text-start">
                <p><strong>Bio:</strong> <?= $profile['bio'] ?? '<span class="text-muted">Belum diisi</span>' ?></p>
                <p><strong>Nomor HP:</strong> <?= $profile['phone'] ?? '<span class="text-muted">Belum diisi</span>' ?></p>
                <p><strong>Alamat:</strong> <?= $profile['address'] ?? '<span class="text-muted">Belum diisi</span>' ?></p>
            </div>
            <button class="btn btn-primary w-100 mt-3 fw-bold" onclick="toggleEdit()">Ubah Profil</button>
        </div>

        <!-- Form Update Profil (disembunyikan dulu) -->
        <div id="editProfile" style="display: none;">
            <form action="<?= base_url('/user/profile/update') ?>" method="post" enctype="multipart/form-data" class="p-4 shadow rounded bg-white">
                <?= csrf_field(); ?>

                <h3 class="mb-3 text-center text-primary">Edit Profile</h3>

                <div class="mb-3">
                    <label for="bio" class="form-label">Bio</label>
                    <input type="text" name="bio" id="bio" class="form-control" value="<?= esc($profile['bio'] ?? '') ?>" placeholder="Masukkan bio Anda">
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="<?= esc($profile['phone'] ?? '') ?>" placeholder="Masukkan nomor telepon">
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="<?= esc($profile['address'] ?? '') ?>" placeholder="Masukkan alamat">
                </div>

                <div class="mb-3">
                    <label for="avatar" class="form-label">Profile Picture</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary w-100">Update Profile</button>
            </form>

        </div>

    </div>
</div>

<script>
    function toggleEdit() {
        document.getElementById('profileView').style.display =
            document.getElementById('profileView').style.display === 'none' ? 'block' : 'none';
        document.getElementById('editProfile').style.display =
            document.getElementById('editProfile').style.display === 'none' ? 'block' : 'none';
    }
</script>

<?= $this->endSection(); ?>