<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0 font-weight-bold text-gray-800">Data Pegawai</h6>
            <a href="<?= base_url('admin/master/pegawai/create') ?>" class="btn btn-primary">Tambah</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <td>Nama</td>
                        <td>Jabatan</td>
                        <td width="155">#</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pegawaies as $item) : ?>
                        <tr>
                            <td><?= $item->name ?></td>
                            <td><?= $item->position ?></td>
                            <td>
                                <div class="d-flex">
                                    <a href="<?= base_url('admin/master/pegawai/edit/' . $item->id) ?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <?= form_open('admin/master/pegawai/destroy/' . $item->id, ['id' => 'form_delete_' . $item->id]) ?>
                                    <button type="button" role="button" onclick="swal('Peringatan!', 'Apakah anda yakin ingin menghapus data ini?', 'warning', {buttons : ['Batal', 'Hapus aja']}).then(e => e ? document.getElementById('<?= 'form_delete_' . $item->id ?>').submit() : '')" class="btn btn-sm btn-danger ml-2">Hapus</button>
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