<div class="tab-pane {{ request()->tab == 2 ? 'active' : '' }}" id="tab-2">
    <div class="table-responsive">
        <table class="table table-hover table-object">
            <thead>
                <tr>
                    <th>Дата</th>
                    <th>Клиент</th>
                    <th>Телефон</th>
                    <th>Время аренды</th>
                    <th>Название объекта</th>
                    <th>Администратор</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>31.10.2019</td>
                    <td>Александр Сидоренко</td>
                    <td>+7 707 700 78 32</td>
                    <td>с 18:00 до 19:30</td>
                    <td>Корт 1</td>
                    <td>Ербол</td>
                    <td class="d-flex-end">
                        <label class="checkbox-shell">
                            <input type="checkbox" checked="checked">
                            <span class="checkmark"></span>
                        </label>
                        <button class="btn-plain client-delete"><img src="/index/img/icon/close-circle.svg" alt="">
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>