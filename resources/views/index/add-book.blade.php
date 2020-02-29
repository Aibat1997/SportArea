@extends('index.layouts.layout')

@section('css')
    <link rel="stylesheet" href="/index/css/jquery-weekdays.min.css">
@endsection

@section('content')
    <section class="search-result">
        <div class="container">
            <h1>Бронирование клиента</h1>
        </div>
    </section>
    <section class="main object-inside book">
        <div class="container">
            <ul class="nav nav-tabs object-tab">
                <li class="active">
                    <a href="#tab-1" data-toggle="tab">
                        Разовая
                    </a>
                </li>
                <li>
                    <a href="#tab-2" data-toggle="tab">
                        Постоянный клиент
                    </a>
                </li>
                <li class="add-group">
                    <a href="#tab-3" data-toggle="tab">
                        Добавить группу
                    </a>
                </li>
                <li>
                    <a href="#tab-5" data-toggle="tab">
                        Добавить клиента к группе
                    </a>
                </li>
            </ul>
            <div class="tab-content object-content">
                <div class="tab-pane active" id="tab-1">
                    <div class="question-popup">
                        <div class="question-popup-head">
                            <h3>Добавить клиента</h3>
                        </div>
                        <form action="#">
                            <div class="form-item-half d-flex-justify">
                                <input type="text" placeholder="Имя">
                                <input type="text" placeholder="Фамилия">
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <input type="text" placeholder="+7 747 140 11 88">
                                <label class="date-label">
                                    <button class="btn-plain btn-blue" type="submit">Сохранить клиента</button>
                                </label>
                            </div>

                        </form>

                        <div class="question-popup-head">
                            <h3>Общая информация</h3>
                        </div>
                        <form action="#">
                            <div class="form-item-half d-flex-justify">
                                <label class="icon-right datalist select-label select">
                                    <input type="text" list="clients" name="clients" class="datalistInput"
                                           placeholder="Клиент"/>
                                    <datalist id="clients">
                                        <option value="Ануар Надралиев">Ануар Надралиев</option>
                                        <option value="Саги Кани">Саги Кани</option>
                                        <option value="Айбат Карашев">Айбат Карашев</option>
                                    </datalist>
                                    <i class="fas fa-chevron-down arrow-select"></i>
                                </label>
                                <input type="text" placeholder="Ануар">

                            </div>
                            <div class="form-item-half d-flex-justify">
                                <input type="text" placeholder="Надралиев">
                                <input type="text" placeholder="+7 747 140 11 88">
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>10.10.2020</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>

                            <div class="form-item-half d-flex-justify">
                                <label class="icon-right">
                                    <input type="text" placeholder="Предоплата">
                                    <i class="icon tg"></i>
                                </label>
                                <label class="icon-right">
                                    <input type="text" placeholder="Стоимость">
                                    <i class="icon tg"></i>
                                </label>

                            </div>

                            <div class="form-item-half d-flex-justify">
                                <div class="checkbox-cover-invent">
                                    <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-400'>
                                    <label for='checkbox-400'>Ракетка - <span>500 тг</span></label>
                                </div>
                                <label class="date-label">
                                    <button class="btn-plain btn-blue" type="submit">Продлить</button>
                                </label>

                            </div>
                        </form>

                    </div>

                </div>
                <div class="tab-pane" id="tab-2">
                    <div class="question-popup">
                        <div class="question-popup-head">
                            <h3>Добавить клиента</h3>
                        </div>
                        <form action="#">
                            <div class="form-item-half d-flex-justify">
                                <input type="text" placeholder="Имя">
                                <input type="text" placeholder="Фамилия">
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <input type="text" placeholder="+7 747 140 11 88">
                                <label class="date-label">
                                    <button class="btn-plain btn-blue" type="submit">Сохранить клиента</button>
                                </label>
                            </div>

                        </form>

                        <div class="question-popup-head">
                            <h3>Общая информация</h3>
                        </div>
                        <form action="#">
                            <div class="form-item-half d-flex-justify">
                                <label class="icon-right datalist select-label select">
                                    <input type="text" list="clients2" name="clients" class="datalistInput"
                                           placeholder="Клиент"/>
                                    <datalist id="clients2">
                                        <option value="Ануар Надралиев">Ануар Надралиев</option>
                                        <option value="Саги Кани">Саги Кани</option>
                                        <option value="Айбат Карашев">Айбат Карашев</option>
                                    </datalist>
                                    <i class="fas fa-chevron-down arrow-select"></i>
                                </label>
                                <input type="text" placeholder="Ануар">
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <input type="text" placeholder="Надралиев">
                                <input type="text" placeholder="+7 747 140 11 88">
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="sidebar-item">
                                    <label class="select-label select">
                                        <select name="#">
                                            <option value="">Ежемесячная оплата</option>
                                            <option value="">Ежемесячная оплата 1</option>
                                            <option value="">Ежемесячная оплата 2</option>
                                        </select>
                                        <i class="fas fa-chevron-down arrow-select"></i>
                                    </label>
                                </div>
                                <label class="date-label">
                                    <i class="icon i-calendar"></i>
                                    <input type="text" class="datefilter">
                                </label>

                            </div>
                            <div class="form-item-half d-flex-justify">
                                <label class="icon-right">
                                    <input type="text" placeholder="Стоимость">
                                    <i class="icon tg"></i>
                                </label>
                                <label class="icon-right">
                                    <div class="color-pick d-flex-justify">
                                        <label for="head2">Присвоить цвет</label>
                                        <input type="color" id="head2" name="head"
                                               value="#e66465">
                                    </div>
                                </label>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <label class="icon-right">

                                </label>
                                <div class="checkbox-cover-invent">
                                    <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-401'>
                                    <label for='checkbox-401'>Ракетка - <span>500 тг</span></label>
                                </div>
                            </div>
                            <div class="question-popup-head">
                                <h3>Добавить дни недели</h3>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <button class="btn-plain btn-blue btn-auto" type="submit">Продлить</button>
                        </form>
                    </div>
                </div>
                <div class="tab-pane add-group" id="tab-3">
                    <div class="question-popup">
                        <div class="question-popup-head">
                            <h3>Добавить тренера</h3>
                        </div>
                        <form action="#">
                            <div class="form-item-half d-flex-justify">
                                <input type="text" placeholder="Имя">
                                <label class="date-label">
                                    <button class="btn-plain btn-blue">Подтвердить</button>
                                </label>
                            </div>

                        </form>

                        <div class="question-popup-head">
                            <h3>Общая информация</h3>
                        </div>
                        <form action="#">
                            <div class="form-item-half d-flex-justify">
                                <input type="text" placeholder="Наиминование">
                                <label class="icon-right">
                                    <input type="text" placeholder="Макс кол-во людей">
                                    <i class="icon i-users"></i>
                                </label>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <input type="text" placeholder="Стоимость">
                                <input type="text" placeholder="Разовая стоимость">
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="sidebar-item">
                                    <label class="select-label select">
                                        <select name="#">
                                            <option value="">Количество тренировок</option>
                                            <option value="">8 тренировок</option>
                                            <option value="">12 тренировок</option>
                                        </select>
                                        <i class="fas fa-chevron-down arrow-select"></i>
                                    </label>
                                </div>
                                <label class="icon-right">
                                    <div class="color-pick d-flex-justify">
                                        <label for="head3">Присвоить цвет</label>
                                        <input type="color" id="head3" name="head"
                                               value="#e66465">
                                    </div>

                                </label>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <label class="date-label">
                                    <i class="icon i-calendar"></i>
                                    <input type="text" class="datefilter">
                                </label>
                                <div class="sidebar-item">
                                    <label class="select-label select">
                                        <select name="#">
                                            <option value="">Тренер</option>
                                            <option value="">Тренер</option>
                                            <option value="">Тренер</option>
                                        </select>
                                        <i class="fas fa-chevron-down arrow-select"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="question-popup-head">
                                <h3>Добавить дни недели</h3>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="border-info">
                                    <p>Понедельник</p>
                                </div>
                                <div class="border-info">
                                    <p>08:00-09:00</p>
                                </div>
                            </div>
                            <button class="btn-plain btn-blue btn-auto" type="submit">Подтвердить</button>

                        </form>
                    </div>
                </div>
                <div class="tab-pane" id="tab-5">
                    <div class="question-popup">
                        <div class="question-popup-head">
                            <h3>Добавить клиента к группе</h3>
                        </div>
                        <form action="#">
                            <div class="form-item-half d-flex-justify">
                                <div class="sidebar-item">
                                    <label class="select-label select">
                                        <select name="#">
                                            <option value="">Выберите группу</option>
                                            <option value="">Группа 1</option>
                                        </select>
                                        <i class="fas fa-chevron-down arrow-select"></i>
                                    </label>
                                </div>

                            </div>
                        </form>
                        <div class="question-popup-head">
                            <h3>Добавить клиента</h3>
                        </div>
                        <form action="#">
                            <div class="form-item-half d-flex-justify">
                                <input type="text" placeholder="Имя">
                                <input type="text" placeholder="Фамилия">
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <input type="text" placeholder="+7 747 140 11 88">
                                <label class="date-label">
                                    <button class="btn-plain btn-blue" type="submit">Сохранить клиента</button>
                                </label>
                            </div>

                        </form>
                        <div class="question-popup-head">
                            <h3>Добавить зарегистрированных клиентов</h3>
                        </div>
                        <form action="#">
                            <div class="form-item-half d-flex-justify">
                                <div class="dropdown-checkbox">
                                    <div class="dropdown">
                                        <label class="dropdown-label1">Выбрать клиентов</label>
                                        <div class="dropdown-list">
                                            <div class="checkbox">
                                                <input type="checkbox" name="dropdown-group-all"
                                                       class="check-all checkbox-custom" id="checkbox-main"/>
                                                <label for="checkbox-main" class="checkbox-custom-label">Выбрать
                                                    все</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" name="dropdown-group"
                                                       class="check checkbox-custom" id="checkbox-custom_01"/>
                                                <label for="checkbox-custom_01"
                                                       class="checkbox-custom-label">Ануар</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" name="dropdown-group"
                                                       class="check checkbox-custom" id="checkbox-custom_02"/>
                                                <label for="checkbox-custom_02" class="checkbox-custom-label">Джамал</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" name="dropdown-group"
                                                       class="check checkbox-custom" id="checkbox-custom_03"/>
                                                <label for="checkbox-custom_03" class="checkbox-custom-label">Уйгур</label>
                                            </div>

                                            <div class="checkbox">
                                                <input type="checkbox" name="dropdown-group"
                                                       class="check checkbox-custom" id="checkbox-custom_04"/>
                                                <label for="checkbox-custom_04" class="checkbox-custom-label">Вини</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-item">
                                    <label class="select-label select">
                                        <select name="#">
                                            <option value="">Тип оплаты</option>
                                            <option value="">Тип оплаты 1</option>
                                        </select>
                                        <i class="fas fa-chevron-down arrow-select"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <div class="sidebar-item">
                                    <label class="select-label select">
                                        <select name="#">
                                            <option value="">Количества абономента</option>
                                            <option value="">Количества абономента 1</option>
                                        </select>
                                        <i class="fas fa-chevron-down arrow-select"></i>
                                    </label>
                                </div>
                                <div class="checkbox-cover-invent">
                                    <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-40'>
                                    <label for='checkbox-40'>Ракетка - <span>500 тг</span></label>
                                </div>
                            </div>
                            <div class="form-item-half d-flex-justify">
                                <label class="date-label">
                                    <button class="btn-plain btn-blue" type="submit">Сохранить</button>
                                </label>
                            </div>

                        </form>
                        <div class="question-popup-head"></div>
                        <div class="table-responsive">
                            <table class="table table-hover table-object">
                                <thead>
                                <tr>
                                    <th>Дата</th>
                                    <th>Клиент</th>
                                    <th>Телефон</th>
                                    <th>Время аренды</th>
                                    <th>Тип оплаты</th>
                                    <th>Инвентарь</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>31.10.2019</td>
                                    <td>Александр Сидоренко</td>
                                    <td>+7 707 700 78 32</td>
                                    <td>с 18:00 до 19:30</td>
                                    <td class="td-blue">Постоянный клиент</td>
                                    <td>Ракетка  </td>
                                    <td class="d-flex-end">
                                        <button class="btn-plain client-modify"><img src="img/icon/pen.svg" alt=""></button>
                                        <button class="btn-plain"><img src="img/icon/close-circle.svg" alt="">
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>31.10.2019</td>
                                    <td>Александр Сидоренко</td>
                                    <td>+7 707 700 78 32</td>
                                    <td>с 18:00 до 19:30</td>
                                    <td class="td-blue">Постоянный клиент</td>
                                    <td>Ракетка  </td>
                                    <td class="d-flex-end">
                                        <button class="btn-plain client-modify"><img src="img/icon/pen.svg" alt=""></button>
                                        <button class="btn-plain"><img src="img/icon/close-circle.svg" alt="">
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>31.10.2019</td>
                                    <td>Александр Сидоренко</td>
                                    <td>+7 707 700 78 32</td>
                                    <td>с 18:00 до 19:30</td>
                                    <td class="td-blue">Постоянный клиент</td>
                                    <td>Ракетка  </td>
                                    <td class="d-flex-end">
                                        <button class="btn-plain client-modify"><img src="img/icon/pen.svg" alt=""></button>
                                        <button class="btn-plain"><img src="img/icon/close-circle.svg" alt="">
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>31.10.2019</td>
                                    <td>Александр Сидоренко</td>
                                    <td>+7 707 700 78 32</td>
                                    <td>с 18:00 до 19:30</td>
                                    <td class="td-blue">Постоянный клиент</td>
                                    <td>Ракетка</td>
                                    <td class="d-flex-end">
                                        <button class="btn-plain client-modify"><img src="img/icon/pen.svg" alt=""></button>
                                        <button class="btn-plain"><img src="img/icon/close-circle.svg" alt="">
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>31.10.2019</td>
                                    <td>Александр Сидоренко</td>
                                    <td>+7 707 700 78 32</td>
                                    <td>с 18:00 до 19:30</td>
                                    <td class="td-blue">Постоянный клиент</td>
                                    <td>Ракетка</td>
                                    <td class="d-flex-end">
                                        <button class="btn-plain client-modify"><img src="img/icon/pen.svg" alt=""></button>
                                        <button class="btn-plain"><img src="img/icon/close-circle.svg" alt="">
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>31.10.2019</td>
                                    <td>Александр Сидоренко</td>
                                    <td>+7 707 700 78 32</td>
                                    <td>с 18:00 до 19:30</td>
                                    <td class="td-blue">Постоянный клиент</td>
                                    <td>Ракетка</td>
                                    <td class="d-flex-end">
                                        <button class="btn-plain client-modify"><img src="img/icon/pen.svg" alt=""></button>
                                        <button class="btn-plain"><img src="img/icon/close-circle.svg" alt="">
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="question-popup client-popup">
        <div class="question-popup-head d-flex-justify">
            <h3>Редактирование клиента</h3>
            <button class="btn-plain close-popup"><i class="fas fa-times"></i></button>
        </div>
        <form action="#">
            <div class="form-item-half d-flex-justify">
                <input type="text" placeholder="Имя">
                <input type="text" placeholder="Фамилия">
            </div>
            <div class="form-item-half d-flex-justify">
                <input type="text" placeholder="+7 747 140 11 88">
                <div class="sidebar-item">
                    <label class="select-label select">
                        <select name="#">
                            <option value="">Тип оплаты</option>
                            <option value="">Тип оплаты 1</option>
                        </select>
                        <i class="fas fa-chevron-down arrow-select"></i>
                    </label>
                </div>
            </div>
            <div class="form-item-half">
                <div class="inventar-label d-flex">
                    <div class="checkbox-cover">
                        <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-100'>
                        <label for='checkbox-100'></label>
                        <input type="text" placeholder="Инвентар" class="input-attr invent-text">
                    </div>
                    <label class="price-current">
                        <input type="text" placeholder="Цена" class="input-attr">
                        <i class="icon i-tg"></i>
                    </label>
                </div>
            </div>
            <div class="form-item-half d-flex-justify">
                <div class="sidebar-item">
                    <label class="select-label select">
                        <select name="#">
                            <option value="">Количества абономента</option>
                            <option value="">Количества абономента 1</option>
                        </select>
                        <i class="fas fa-chevron-down arrow-select"></i>
                    </label>
                </div>
                <label class="date-label">
                    <button class="btn-plain btn-blue" type="submit">Сохранить изменения</button>
                </label>
            </div>

        </form>
    </div>
    <div class="question-popup delete-client">
        <div class="question-popup-head d-flex-justify">
            <h3>Причина отмены брони</h3>
            <button class="btn-plain close-popup"><i class="fas fa-times"></i></button>
        </div>
        <form action="#">
            <textarea name="" id="" cols="30" rows="10" placeholder="Введите сообщение"></textarea>
            <button class="btn-plain btn-blue" type="submit">Подтвердить</button>
        </form>
    </div>
    <div class="overlay"></div>
@endsection

@section('js')
    <script type="text/javascript" src="/index/js/jquery-weekdays.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript">
        $('.select').on('click', function () {
            $(this).find('.arrow-select').toggleClass('arrow-up')
        });

        $('.group-add').click(function (e) {

            $('.object-tab li.active').removeClass('active');
            $('.object-content div.active').removeClass('active');

            $('.add-group').addClass('active');
            e.preventDefault();
        });
        $('.client-add').click(function (e) {

            $('.object-tab li.active').removeClass('active');
            $('.object-content div.active').removeClass('active');

            $('.add-client').addClass('active');
            e.preventDefault();
        });

        $.fn.toggleProp = function () {
            this.prop('disabled', !this.prop('disabled'));
        }
        $('.checkbox-attr').on('click', function () {
            $(this).closest('.inventar-label').find('.input-attr').toggleProp();
        });

        $('.add-invent').on('click', function () {
            $('.invent-new').html('' +
                '<div class="form-item-half form-item-new d-flex-justify">\n' +
                '                <div class="inventar-label d-flex">\n' +
                '                    <div class="checkbox-cover">\n' +
                '                        <input type=\'checkbox\' class=\'ios8-switch checkbox-attr\' id=\'checkbox-2\'>\n' +
                '                        <label for=\'checkbox-2\'></label>\n' +
                '                        <input type="text" placeholder="Инвентар" class="input-attr" disabled>\n' +
                '                    </div>\n' +
                '                    <label class="price-current">\n' +
                '                        <input type="text" placeholder="Цена" class="input-attr" disabled>\n' +
                '                        <i class="icon i-tg"></i>\n' +
                '                        <button class="btn-plain delete-invent"><img src="img/icon/delete-invent.png" alt=""></button>\n' +
                '                    </label>\n' +
                '                </div>\n' +
                '            </div>');
            ;
        });
        $('.delete-invent').on('click', function () {
            alert(1);
        });

        $(function () {

            $('.datefilter').daterangepicker({
                autoUpdateInput: false,
                locale: {
                    "format": "DD/MM/YYYY",
                    "separator": " - ",
                    "applyLabel": "Применить",
                    "cancelLabel": "Отмена",
                    "fromLabel": "De",
                    "toLabel": "RU",
                    "customRangeLabel": "Custom",
                    "daysOfWeek": [
                        "Пн",
                        "Вт",
                        "Ср",
                        "Чт",
                        "Пт",
                        "Сб",
                        "Вс"
                    ],
                    "monthNames": [
                        "Январь",
                        "Февраль",
                        "Март",
                        "Апрель",
                        "Май",
                        "Июнь",
                        "Июль",
                        "Август",
                        "Сентябрь",
                        "Октябрь",
                        "Ноябрь",
                        "Декабрь"
                    ],
                    "firstDay": 0
                }
            });

            $('.datefilter').on('apply.daterangepicker', function (ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            });

            $('.datefilter').on('cancel.daterangepicker', function (ev, picker) {
                $(this).val('');
            });

            $('.single_time').daterangepicker({
                timePicker: true,
                timePicker24Hour: true,
                timePickerIncrement: 1,
                timePickerSeconds: false,
                locale: {
                    format: 'HH:mm'
                }
            }).on('show.daterangepicker', function (ev, picker) {
                picker.container.find(".calendar-table").hide();
            });

        });
        jQuery('.datetime').datetimepicker({
            datepicker: false,
            format: 'H:i'
        });

        function checkboxDropdown(el) {
            var $el = $(el);

            function updateStatus(label, result) {
                if (!result.length) {
                    label.html('Выбрать клиентов');
                }
            }

            ;
            $el.each(function (i, element) {
                var _this = this;

                var $list = $(this).find('.dropdown-list'),
                    $label = $(this).find('.dropdown-label1'),
                    $checkAll = $(this).find('.check-all'),
                    $inputs = $(this).find('.check'),
                    defaultChecked = $(this).find('input[type=checkbox]:checked'),
                    result = [];
                updateStatus($label, result);

                if (defaultChecked.length) {
                    defaultChecked.each(function () {
                        result.push($(this).next().text());
                        $label.html(result.join(", "));
                    });
                }

                $label.on('click', function () {
                    $(_this).toggleClass('open');
                });
                $checkAll.on('change', function () {
                    var checked = $(this).is(':checked');
                    var checkedText = $(this).next().text();
                    result = [];

                    if (checked) {
                        result.push(checkedText);
                        $label.html(result);
                        $inputs.prop('checked', false);
                    } else {
                        $label.html(result);
                    }

                    updateStatus($label, result);
                });
                $inputs.on('change', function () {
                    var checked = $(this).is(':checked');
                    var checkedText = $(this).next().text();

                    if ($checkAll.is(':checked')) {
                        result = [];
                    }

                    if (checked) {
                        result.push(checkedText);
                        $label.html(result.join(", "));
                        $checkAll.prop('checked', false);
                    } else {
                        var index = result.indexOf(checkedText);

                        if (index >= 0) {
                            result.splice(index, 1);
                        }

                        $label.html(result.join(", "));
                    }

                    updateStatus($label, result);
                });
                $(document).on('click touchstart', function (e) {
                    if (!$(e.target).closest($(_this)).length) {
                        $(_this).removeClass('open');
                    }
                });
            });
        }

        checkboxDropdown('.dropdown');
    </script>
@endsection
