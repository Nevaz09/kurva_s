<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="mb-0 text-gray-800 font-weight-bold">List Judul Proyek</h5>
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
                        <td width="155">Lihat RAB</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_proyeks as $data_proyek) : ?>
                        <tr>
                            <td class="text-nowrap"><?= $data_proyek->kode_tender ?></td>
                            <td class="text-nowrap"><?= $data_proyek->kode_rup ?></td>
                            <td class="text-nowrap"><?= $data_proyek->nama_paket ?></td>
                            <td>
                                <div class="d-flex">
                                    <a href="<?= base_url('admin/proyek/rab_proyek/detail/' . $data_proyek->id) ?>" class="btn btn-sm btn-info    ">RAB</a>
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