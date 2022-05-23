<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-gray-800 font-weight-bold">Persetujuan Proyek</h5>
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
                        <td class="text-nowrap">K/L/Pd</td>
                        <td class="text-nowrap">Satuan Kerja</td>
                        <td class="text-nowrap">Jenis Pengadaan</td>
                        <td class="text-nowrap">Tahun Anggaran</td>
                        <td class="text-nowrap">Nomor Kontrak</td>
                        <td class="text-nowrap">Nilai</td>
                        <td class="text-nowrap">Lokasi</td>
                        <td class="text-nowrap">Masa Pekerjaan</td>
                        <td class="text-nowrap">Status</td>
                        <td class="text-nowrap" width="155">#</td>
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
                                <?php if ($data_proyek->disetujui_pada) : ?>
                                    <div class="badge bg-success text-white">Disetujui pada <?= $data_proyek->disetujui_pada  ?></div>
                                <?php else : ?>
                                    <div class="badge bg-warning text-white">Belum Disetujui</div>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if ($data_proyek->disetujui_pada) : ?>
                                    <?= form_open('admin/proyek/persetujuan_proyek/cancel/' . $data_proyek->id, ['id' => 'form_cancel_' . $data_proyek->id]) ?>
                                    <button type="button" role="button" onclick="swal('Peringatan!', 'Apakah anda yakin ingin membatalkan data ini?', 'warning', {buttons : ['Batal', 'Batal Setujui']}).then(e => e ? document.getElementById('<?= 'form_cancel_' . $data_proyek->id ?>').submit() : '')" class="btn btn-sm btn-danger ml-2 text-nowrap">Batal Setujui</button>
                                    </form>
                                <?php else : ?>
                                    <?= form_open('admin/proyek/persetujuan_proyek/accept/' . $data_proyek->id, ['id' => 'form_accept_' . $data_proyek->id]) ?>
                                    <button type="button" role="button" onclick="swal('Peringatan!', 'Apakah anda yakin ingin menyetujui data ini?', 'warning', {buttons : ['Batal', 'Setujui']}).then(e => e ? document.getElementById('<?= 'form_accept_' . $data_proyek->id ?>').submit() : '')" class="btn btn-sm btn-success ml-2">Setujui</button>
                                    </form>
                                <?php endif ?>
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