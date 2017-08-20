
    <h3 style="text-align: center">Удобства</h3>

    <div class="col-md-3">
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->tv == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Телевизор</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->iron == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Утюг</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->plazm_tv == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Плазменный телевизор</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->fridge == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Холодильник</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->balcony == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Балкон</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->door == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Бронедверь</label>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->smoke == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Можно курить</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->drying_machine == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Сушильная машина</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->separate_entrance == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Отдельный вход</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->internet == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Интернет</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->washer_machine == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Стиральная машина</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->gas == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Газовая плита</label>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->wifi == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Wi-Fi</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->boiler == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Бойлер</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->laptop == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Место для работы на ноутбуке</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->conditioner == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Кондиционер</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->jacuzzi == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Джакузи</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->pool == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Бассейн</label>
        </div>
    </div>