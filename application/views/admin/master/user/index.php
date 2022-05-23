<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-gray-800 font-weight-bold">Master User</h5>
            <a href="<?= base_url('admin/master/user/create') ?>" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <td>Username</td>
                        <td>Role</td>
                        <td width="155">#</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user->username ?></td>
                            <td><?= $user->role_name ?></td>
                            <td>
                                <div class="d-flex">
                                    <a href="<?= base_url('admin/master/user/edit/' . $user->id) ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <?= form_open('admin/master/user/destroy/' . $user->id, ['id' => 'form_delete_' . $user->id]) ?>
                                    <button type="button" role="button" onclick="swal('Peringatan!', 'Apakah anda yakin ingin menghapus data ini?', 'warning', {buttons : ['Batal', 'Hapus aja']}).then(e => e ? document.getElementById('<?= 'form_delete_' . $user->id ?>').submit() : '')" class="btn btn-sm btn-danger ml-2">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <?= $links ?>
            </div>
        </div>
    </div>
</div>