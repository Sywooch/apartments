
    <h3 style="text-align: center">Удобства</h3>

    <div class="col-md-3">
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->elevator == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Лифт</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->internet == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Интернет</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->animals == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Можно с животными</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->kitchen == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Кухня</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->gym == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Спортивный зал</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->intercom == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Домофон</label>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->fireplace == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Камин</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->waggon == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Вахтер</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->heating == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Отопление</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->wifi == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Wi-Fi</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->cable_tv == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Кабельное телевидение</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->iron == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Утюг</label>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->drying_machine == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Сушильная машина</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->family == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Подходит для детей/семей</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->parking == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Парковка</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->washer_machine == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Стиральная машина</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->hair_dryer == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Фен</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->tv == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Телевизор</label>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->conditioner == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Кондиционер</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->smoke == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Можно курить</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->disabled == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Подходит людям с ограниченными возможностями</label>
        </div>
        <div class="form-group">
            <input type="hidden">
            <input type="checkbox" <?= $model->separate_entrance == 1 ? 'checked' : 'unchecked' ?> disabled>
            <label>Отдельный вход</label>
        </div>
    </div>