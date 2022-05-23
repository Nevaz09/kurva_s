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
                    <label for="input_username">Username</label>
                    <input type="text" name="username" value="<?= set_value('username') ?: $user->username ?>" id="input_username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="input_role_id">Role</label>
                    <select name="role_id" id="input_role_id" class="form-control" required>
                        <option value="">Pilih Role</option>
                        <?php foreach ($roles as $role) : ?>
                            <option value="<?= $role->id ?>" <?= (set_value('role_id') ?: $user->role_id) == $role->id ? 'selected' : '' ?>><?= $role->name ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="input_password">Password</label>
                    <input type="password" name="password" value="" id="input_password" class="form-control">
                </div>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>