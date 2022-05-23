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
                    <label for="input_name">Nama</label>
                    <input type="text" name="name" value="<?= set_value('name') ?: $role->name ?>" id="input_name" class="form-control" required>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>