<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-gray-800 font-weight-bold">Data Proyek</h5>
            <?php if (in_array($this->authentication->user()->role->name, ['Super Admin', 'Manager Proyek'])) : ?>
                <a href="<?= base_url('admin/proyek/data_proyek/create') ?>" class="btn btn-primary">Tambah</a>
            <?php endif ?>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered bg-white">
                <thead>
                    <tr>
                        <td class="text-nowrap">Kode Tender</td>
                        <td class="text-nowrap">Kode Rup</td>
                        <td class="text-nowrap">Nama Paket</td>
                        <td class="text-nowrap">K/L/PD</td>
                        <td class="text-nowrap">Satuan Kerja</td>
                        <td class="text-nowrap">Jenis Pengadaan</td>
                        <td class="text-nowrap">Tahun Anggaran</td>
                        <td class="text-nowrap">Nomor Kontrak</td>
                        <td class="text-nowrap">Nilai</td>
                        <td class="text-nowrap">Lokasi</td>
                        <td class="text-nowrap">Masa Pekerjaan</td>
                        <td width="155">#</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_proyeks as $data_proyek) : ?>
                        <tr>
                            <td class="text-nowrap"><?= $data_proyek->kode_tender ?></td>
                            <td class="text-nowrap"><?= $data_proyek->kode_rup ?></td>
                            <td class="text-nowrap"><?= $data_proyek->nama_paket ?></td>
                            <td class="text-nowrap"><?= $data_proyek->pd ?></td>
                            <td class="text-nowrap"><?= $data_proyek->satuan_kerja ?></td>
                            <td class="text-nowrap"><?= $data_proyek->jenis_pengadaan ?></td>
                            <td class="text-nowrap"><?= $data_proyek->tahun_anggaran ?></td>
                            <td class="text-nowrap"><?= $data_proyek->nomor_kontrak ?></td>
                            <td class="text-nowrap"><?= $data_proyek->nilai ?></td>
                            <td class="text-nowrap"><?= $data_proyek->lokasi ?></td>
                            <td class="text-nowrap"><?= $data_proyek->masa_pekerjaan ?></td>
                            <td>
                                <?php if (in_array($this->authentication->user()->role->name, ['Super Admin', 'Manager Proyek'])) : ?>
                                    <div class="d-flex">
                                        <a href="<?= base_url('admin/proyek/data_proyek/edit/' . $data_proyek->id) ?>" class="btn btn-sm btn-secondary">Edit</a>
                                        <?= form_open('admin/proyek/data_proyek/destroy/' . $data_proyek->id, ['id' => 'form_delete_' . $data_proyek->id]) ?>
                                        <button type="button" role="button" onclick="swal('Peringatan!', 'Apakah anda yakin ingin menghapus data ini?', 'warning', {buttons : ['Batal', 'Hapus aja']}).then(e => e ? document.getElementById('<?= 'form_delete_' . $data_proyek->id ?>').submit() : '')" class="btn btn-sm btn-danger ml-2">Hapus</button>
                                        </form>
                                    </div>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <?= $links ?>
            </div>
        </div>
    </div>
</div>