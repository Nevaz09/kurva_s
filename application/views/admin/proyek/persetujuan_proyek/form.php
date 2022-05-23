<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <?= form_open($action) ?>
            <div class="card-body">
                <div class="text-danger">
                    <?= validation_errors() ?>
                </div>
                <div class="mb-3">
                    <label for="input_kode_tender">Kode Tender</label>
                    <input type="text" name="kode_tender" value="<?= set_value('kode_tender') ?: $data_proyek->kode_tender ?>" id="input_kode_tender" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="input_kode_rup">Kode Rup</label>
                    <input type="text" name="kode_rup" value="<?= set_value('kode_rup') ?: $data_proyek->kode_rup ?>" id="input_kode_rup" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="input_nama_paket">Nama Paket</label>
                    <input type="text" name="nama_paket" value="<?= set_value('nama_paket') ?: $data_proyek->nama_paket ?>" id="input_nama_paket" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="input_pd">Pd</label>
                    <input type="text" name="pd" value="<?= set_value('pd') ?: $data_proyek->pd ?>" id="input_pd" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="input_satuan_kerja">Satuan Kerja</label>
                    <input type="text" name="satuan_kerja" value="<?= set_value('satuan_kerja') ?: $data_proyek->satuan_kerja ?>" id="input_satuan_kerja" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="input_jenis_pengadaan">Jenis Pengadaan</label>
                    <input type="text" name="jenis_pengadaan" value="<?= set_value('jenis_pengadaan') ?: $data_proyek->jenis_pengadaan ?>" id="input_jenis_pengadaan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="input_tahun_anggaran">Tahun Anggaran</label>
                    <input type="number" name="tahun_anggaran" value="<?= set_value('tahun_anggaran') ?: $data_proyek->tahun_anggaran ?>" id="input_tahun_anggaran" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="input_nomor_kontrak">Nomor Kontrak</label>
                    <input type="text" name="nomor_kontrak" value="<?= set_value('nomor_kontrak') ?: $data_proyek->nomor_kontrak ?>" id="input_nomor_kontrak" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="input_nilai">Nilai</label>
                    <input type="number" name="nilai" value="<?= set_value('nilai') ?: $data_proyek->nilai ?>" id="input_nilai" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="input_lokasi">Lokasi</label>
                    <input type="text" name="lokasi" value="<?= set_value('lokasi') ?: $data_proyek->lokasi ?>" id="input_lokasi" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="input_masa_pekerjaan">Masa Pekerjaan</label>
                    <input type="text" name="masa_pekerjaan" value="<?= set_value('masa_pekerjaan') ?: $data_proyek->masa_pekerjaan ?>" id="input_masa_pekerjaan" class="form-control" required>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>