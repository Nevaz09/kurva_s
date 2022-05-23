<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-gray-800 font-weight-bold">Role User</h5>
            <a href="<?= base_url('admin/master/role/create') ?>" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <td>Nama</td>
                        <td width="155">#</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($roles as $role) : ?>
                        <tr>
                            <td><?= $role->name ?></td>
                            <td>
                                <div class="d-flex">
                                    <a href="<?= base_url('admin/master/role/edit/' . $role->id) ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <?= form_open('admin/master/role/destroy/' . $role->id, ['id' => 'form_delete_' . $role->id]) ?>
                                    <button type="button" role="button" onclick="swal('Peringatan!', 'Apakah anda yakin ingin menghapus data ini?', 'warning', {buttons : ['Batal', 'Hapus aja']}).then(e => e ? document.getElementById('<?= 'form_delete_' . $role->id ?>').submit() : '')" class="btn btn-sm btn-danger ml-2">Hapus</button>
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