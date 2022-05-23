<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 font-weight-bold">Kode Tender</div>
                    <div class="col">: <?= $data_proyek->kode_tender ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3 font-weight-bold">Kode RUP</div>
                    <div class="col">: <?= $data_proyek->kode_rup ?></div>
                </div>
                <div class="row">
                    <div class="col-md-3 font-weight-bold">Nama Paket</div>
                    <div class="col">: <?= $data_proyek->nama_paket ?></div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header bg-info text-white font-weight-bold d-flex align-items-center">
                RAB
                <button class="ml-auto btn btn-primary" data-toggle="modal" data-target="#create_sub_activity_modal"><i class="fas fa-plus"></i></button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-sm table-stripped">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Uraian/Jenis Pekerjaan</th>
                                <th>Volume</th>
                                <th>Satuan</th>
                                <th>Harga Satuan(Rp)</th>
                                <th>Jumlah Harga(Rp)</th>
                                <th>Jumlah Biaya/Pos(Rp)</th>
                                <th></th>
                            </tr>
                            <?php foreach ($rab as $i => $item) : ?>
                                <tr class="bg-dark text-white">
                                    <td class="font-weight-bold"><?= romanFromInt($i + 1) ?></td>
                                    <td class="font-weight-bold" colspan="8">
                                        <div class="d-flex">
                                            <?= $item->nama ?>
                                            <button class="ml-auto btn btn-sm btn-danger" onclick="swal('Peringatan!', 'Apakah anda ingin menghapus data ini?', 'warning', {buttons:['Batal', 'Hapus']}).then(e => e ? document.getElementById('form_delete_sub_kegiatan_<?= $item->id ?>').submit() : '')"><i class="fas fa-trash"></i></button>
                                            <button class="ml-1 btn btn-sm btn-warning" data-toggle="modal" data-target="#edit_sub_kegiatan_modal_<?= $i ?>"><i class="fas fa-pen"></i></button>
                                            <button class="ml-1 btn btn-sm btn-primary" data-toggle="modal" data-target="#jenis_pekerjaan_modal_<?= $i ?>"><i class="fas fa-plus mr-2"></i>Jenis Pekerjaan</button>
                                            <?= form_open('admin/proyek/rab_proyek/delete_sub_kegiatan/' . $item->id, ['id' => 'form_delete_sub_kegiatan_' . $item->id]) ?>
                                            </form>
                                            <div class="modal fade text-body" id="jenis_pekerjaan_modal_<?= $i ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="jenis_pekerjaan_modal_<?= $i ?>Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="jenis_pekerjaan_modal_<?= $i ?>Label"><?= $item->nama ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <?= form_open('admin/proyek/rab_proyek/jenis_pekerjaan/' . $item->id) ?>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="nama_<?= $item->id ?>_input">Jenis Pekerjaan</label>
                                                                <input type="text" name="nama" id="nama_<?= $item->id ?>_input" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="volume_<?= $item->id ?>_input">Volume</label>
                                                                <input type="number" step="0.01" name="volume" id="volume_<?= $item->id ?>_input" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="satuan_<?= $item->id ?>_input">Satuan</label>
                                                                <input name="satuan" id="satuan_<?= $item->id ?>_input" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="harga_satuan_<?= $item->id ?>_input">Harga Satuan(Rp)</label>
                                                                <input name="harga_satuan" type="number" step="0.01" id="harga_satuan_<?= $item->id ?>_input" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" role="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade text-body" id="edit_sub_kegiatan_modal_<?= $i ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="edit_sub_kegiatan_modal_<?= $i ?>Label" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="create_sub_activity_modalLabel">Edit Sub Kegiatan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <?= form_open('admin/proyek/rab_proyek/update_sub_kegiatan/' . $item->id) ?>
                                                        <div class="modal-body">
                                                            <label for="sub_activity_name_input">Sub Kegiatan</label>
                                                            <input type="text" name="nama" value="<?= $item->nama ?>" class="form-control" placeholder="cth : Pekerjaan Persiapan...">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" role="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php foreach ($item->jenis_pekerjaan as $i => $jenis_pekerjaan) : ?>
                                    <tr>
                                        <td><?= $i + 1 ?></td>
                                        <td><?= $jenis_pekerjaan->nama ?></td>
                                        <td><?= $jenis_pekerjaan->volume ?></td>
                                        <td><?= $jenis_pekerjaan->satuan ?></td>
                                        <td class="text-right">
                                            <div class="d-flex justify-content-between">
                                                <div>Rp. </div>
                                                <?= number_format($jenis_pekerjaan->harga_satuan, 2, ',', '.') ?>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="d-flex justify-content-between">
                                                <div>Rp. </div>
                                                <?= number_format($jenis_pekerjaan->jumlah_harga, 2, ',', '.') ?>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-sm btn-warning mr-1" data-toggle="modal" data-target="#edit_jenis_pekerjaan_modal_<?= $jenis_pekerjaan->id ?>"><i class="fas fa-pen"></i></button>
                                                <button class="btn btn-sm btn-danger" onclick="swal('Peringatan!', 'Apakah anda yakin ingin menghapus data ini?', 'warning', {buttons:['Batal', 'Hapus']}).then(e => e?document.getElementById('form_delete_jenis_pekerjaan_<?= $jenis_pekerjaan->id ?>').submit():'')"><i class="fas fa-trash"></i></button>
                                                <?= form_open('admin/proyek/rab_proyek/delete_jenis_pekerjaan/' . $jenis_pekerjaan->id, ['id' => "form_delete_jenis_pekerjaan_" . $jenis_pekerjaan->id]) ?>
                                                </form>
                                                <div class="modal fade text-body" id="edit_jenis_pekerjaan_modal_<?= $jenis_pekerjaan->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="edit_jenis_pekerjaan_modal_<?= $jenis_pekerjaan->id ?>Label" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="edit_jenis_pekerjaan_modal_<?= $jenis_pekerjaan->id ?>Label"><?= $jenis_pekerjaan->nama ?></h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <?= form_open('admin/proyek/rab_proyek/update_jenis_pekerjaan/' . $jenis_pekerjaan->id) ?>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nama_<?= $jenis_pekerjaan->id ?>_input">Jenis Pekerjaan</label>
                                                                    <input type="text" name="nama" value="<?= $jenis_pekerjaan->nama ?>" id="nama_<?= $jenis_pekerjaan->id ?>_input" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="volume_<?= $jenis_pekerjaan->id ?>_input">Volume</label>
                                                                    <input type="number" step="0.01" name="volume" value="<?= $jenis_pekerjaan->volume ?>" id="volume_<?= $jenis_pekerjaan->id ?>_input" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="satuan_<?= $jenis_pekerjaan->id ?>_input">Satuan</label>
                                                                    <input name="satuan" value="<?= $jenis_pekerjaan->satuan ?>" id="satuan_<?= $jenis_pekerjaan->id ?>_input" class="form-control">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="harga_satuan_<?= $jenis_pekerjaan->id ?>_input">Harga Satuan(Rp)</label>
                                                                    <input name="harga_satuan" value="<?= $jenis_pekerjaan->harga_satuan ?>" type="number" step="0.01" id="harga_satuan_<?= $jenis_pekerjaan->id ?>_input" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" role="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <tr>
                                    <th colspan="4" class="text-right"></th>
                                    <th colspan="2">Jumlah sub total</th>
                                    <td class="text-right">
                                        <div class="d-flex justify-content-between">
                                            <div>Rp. </div>
                                            <?= number_format($item->jumlah_sub_total, 2, ',', '.') ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                            <tr>
                                <th colspan="6" class="text-right">Jumlah Total</th>
                                <td class="text-right">
                                    <div class="d-flex justify-content-between">
                                        <div>Rp. </div>
                                        <?= number_format($jumlah_konstruksi, 2, ',', '.') ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="6" class="text-right">PPN (10%)</th>
                                <td class="text-right">
                                    <div class="d-flex justify-content-between">
                                        <div>Rp. </div>
                                        <?= number_format($ppn, 2, ',', '.') ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="6" class="text-right">Jumlah Total Keseluruhan</td>
                                <td class="text-right">
                                    <div class="d-flex justify-content-between">
                                        <div>Rp. </div>
                                        <?= number_format($jumlah_keseluruhan, 2, ',', '.') ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th colspan="6" class="text-right">Jumlah Total Dibulatkan</td>
                                <td class="text-right">
                                    <div class="d-flex justify-content-between">
                                        <div>Rp. </div>
                                        <?= number_format(round($jumlah_keseluruhan), 2, ',', '.') ?>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="create_sub_activity_modal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="create_sub_activity_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="create_sub_activity_modalLabel">Tambah Sub Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('admin/proyek/rab_proyek/sub_kegiatan/' . $data_proyek->id) ?>
            <div class="modal-body">
                <label for="sub_activity_name_input">Sub Kegiatan</label>
                <input type="text" name="nama" class="form-control" placeholder="cth : Pekerjaan Persiapan...">
            </div>
            <div class="modal-footer">
                <button type="button" role="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    let forms = document.querySelectorAll('form');
    console.log(forms)
</script>