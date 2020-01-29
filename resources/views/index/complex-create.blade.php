@extends('index.layouts.layout')

@section('content')
<section class="search-result">
    <div class="container">
        <h1>Добавление объекта</h1>
    </div>
</section>
<section class="main add-object">
    <div class="container">
        <div class="add-object-cover">
            <div class="row">
                <add-complex :auth_id = '{{ Auth::user()->user_id }}'></add-complex>
                <div class="col-md-4 col-sm-4"></div>
                <div class="col-md-8 col-sm-8">
                    <form action="#">
                        <div class="form-item-half d-flex-justify">
                            <div class="edit-cover">
                                <a href="#tab-4" data-toggle="tab" class="btn-plain  add-call invent-add">
                                    <img src="/index/img/icon/plus-grey.png" alt="">Добавить инвентар
                                </a>
                            </div>
                            <label class="date-label">
                                <div class="new-invent">
                                    <div class="checkbox-cover d-flex-justify">
                                        <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-103'>
                                        <label for='checkbox-103'></label>
                                        <p>Ракетка - <span>500</span></p>
                                        <button class="btn-plain invent-edit">
                                            <i class="icon book-edit"></i>
                                        </button>
                                    </div>
                                </div>
                            </label>
                        </div>
                        <div class="new-invent-box">
                            <div class="form-item-half d-flex-justify">
                                <div class="edit-cover">

                                </div>
                                <label class="date-label">
                                    <div class="new-invent">
                                        <div class="checkbox-cover d-flex-justify">
                                            <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-110'>
                                            <label for='checkbox-110'></label>
                                            <p>Ракетка - <span>500</span></p>
                                            <button class="btn-plain invent-edit">
                                                <i class="icon book-edit"></i>
                                            </button>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </form>
                    <form action="#">
                        <div class="new-object">
                            <div class="new-object-head d-flex-justify">
                                <h3>Объект 1</h3>
                                <button class="btn-plain plus-blue">Добавить объект <i class="fas fa-plus"></i></button>
                            </div>
                            <div class="new-object-body">
                                <div class="form-item-half d-flex-justify">
                                    <label class="f-item">
                                        <input type="text" placeholder="Название объекта">
                                    </label>
                                    <label class="file-cover">
                                        <img src="/index/img/icon/upload.svg" alt="">
                                        Загрузить фотографии объекта
                                        <input type="file">
                                    </label>
                                </div>
                                <div class="form-item-half d-flex-justify">
                                    <div class="sidebar-item">
                                        <label class="select-label select">
                                            <select name="#">
                                                <option value="">Тип площадки</option>
                                                <option value="">Тип площадки 1</option>
                                                <option value="">Тип площадки 2</option>
                                            </select>
                                            <i class="fas fa-chevron-down arrow-select"></i>
                                        </label>
                                    </div>
                                    <div class="sidebar-item">
                                        <label class="select-label select">
                                            <select name="#">
                                                <option value="">Тип покрытия</option>
                                                <option value="">Тип покрытия 1</option>
                                                <option value="">Тип покрытия 2</option>
                                            </select>
                                            <i class="fas fa-chevron-down arrow-select"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-item-half d-flex-justify">
                                    <label class="f-item">
                                        <input type="text" placeholder="Стоимость">
                                    </label>
                                    <label class="f-item f-item-discount">
                                        <input type="text" placeholder="Предоплата" class="discount-price">
                                        <div class="discount-price-cover d-flex">
                                            <label class="checkbox-container">
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark">
                                                    тг
                                                </span>
                                            </label>
                                            <label class="checkbox-container">
                                                <input type="radio" name="radio">
                                                <span class="checkmark">
                                                    %
                                                </span>
                                            </label>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-item-half d-flex-justify">
                                    <div class="dropdown-checkbox">
                                        <div class="dropdown">
                                            <label class="dropdown-label">Инфраструктура</label>
                                            <div class="dropdown-list">
                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group-all"
                                                        class="check-all checkbox-custom" id="checkbox-main" />
                                                    <label for="checkbox-main" class="checkbox-custom-label">Выбрать
                                                        все</label>
                                                </div>

                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group"
                                                        class="check checkbox-custom" id="checkbox-custom_01" />
                                                    <label for="checkbox-custom_01"
                                                        class="checkbox-custom-label">Тренер</label>
                                                </div>

                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group"
                                                        class="check checkbox-custom" id="checkbox-custom_02" />
                                                    <label for="checkbox-custom_02"
                                                        class="checkbox-custom-label">Освещение</label>
                                                </div>

                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group"
                                                        class="check checkbox-custom" id="checkbox-custom_03" />
                                                    <label for="checkbox-custom_03"
                                                        class="checkbox-custom-label">Трибуна</label>
                                                </div>

                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group"
                                                        class="check checkbox-custom" id="checkbox-custom_04" />
                                                    <label for="checkbox-custom_04"
                                                        class="checkbox-custom-label">Освещение</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="f-item">
                                        <input type="text" placeholder="Размер объекта" class="size-mask">
                                    </label>
                                </div>
                                <a href="objects-inside.html" class="btn-plain link-dashed"><img src="/index/img/icon/pen.svg"
                                        alt=""> Редактировать
                                    время, дату, стоимость</a>
                            </div>
                        </div>
                    </form>
                    <form action="#">
                        <div class="new-object">
                            <div class="new-object-head d-flex-justify">
                                <h3>Объект 1</h3>
                                <button class="btn-plain remove-object">Удалить объект <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <div class="new-object-body">
                                <div class="form-item-half d-flex-justify">
                                    <label class="f-item">
                                        <input type="text" placeholder="Название объекта">
                                    </label>
                                    <label class="file-cover">
                                        <img src="/index/img/icon/upload.svg" alt="">
                                        Загрузить фотографии объекта
                                        <input type="file">
                                    </label>
                                </div>
                                <div class="form-item-half d-flex-justify">
                                    <div class="sidebar-item">
                                        <label class="select-label select">
                                            <select name="#">
                                                <option value="">Тип площадки</option>
                                                <option value="">Тип площадки 1</option>
                                                <option value="">Тип площадки 2</option>
                                            </select>
                                            <i class="fas fa-chevron-down arrow-select"></i>
                                        </label>
                                    </div>
                                    <div class="sidebar-item">
                                        <label class="select-label select">
                                            <select name="#">
                                                <option value="">Тип покрытия</option>
                                                <option value="">Тип покрытия 1</option>
                                                <option value="">Тип покрытия 2</option>
                                            </select>
                                            <i class="fas fa-chevron-down arrow-select"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-item-half d-flex-justify">
                                    <label class="f-item">
                                        <input type="text" placeholder="Стоимость">
                                    </label>
                                    <label class="f-item f-item-discount">
                                        <input type="text" placeholder="Предоплата" class="discount-price">
                                        <div class="discount-price-cover d-flex">
                                            <label class="checkbox-container">
                                                <input type="radio" checked="checked" name="radio">
                                                <span class="checkmark">
                                                    тг
                                                </span>
                                            </label>

                                            <label class="checkbox-container">
                                                <input type="radio" name="radio">
                                                <span class="checkmark">
                                                    %
                                                </span>
                                            </label>

                                        </div>
                                    </label>
                                </div>
                                <div class="form-item-half d-flex-justify">
                                    <div class="dropdown-checkbox">
                                        <div class="dropdown">
                                            <label class="dropdown-label">Инфраструктура</label>

                                            <div class="dropdown-list">
                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group-all"
                                                        class="check-all checkbox-custom" id="checkbox-main1" />
                                                    <label for="checkbox-main1" class="checkbox-custom-label">Выбрать
                                                        все</label>
                                                </div>

                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group"
                                                        class="check checkbox-custom" id="checkbox-custom_011" />
                                                    <label for="checkbox-custom_011"
                                                        class="checkbox-custom-label">Тренер</label>
                                                </div>

                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group"
                                                        class="check checkbox-custom" id="checkbox-custom_021" />
                                                    <label for="checkbox-custom_021"
                                                        class="checkbox-custom-label">Освещение</label>
                                                </div>

                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group"
                                                        class="check checkbox-custom" id="checkbox-custom_031" />
                                                    <label for="checkbox-custom_031"
                                                        class="checkbox-custom-label">Трибуна</label>
                                                </div>

                                                <div class="checkbox">
                                                    <input type="checkbox" name="dropdown-group"
                                                        class="check checkbox-custom" id="checkbox-custom_041" />
                                                    <label for="checkbox-custom_041"
                                                        class="checkbox-custom-label">Освещение</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <label class="f-item">
                                        <input type="text" placeholder="Размер объекта" class="size-mask">
                                    </label>
                                </div>
                                <a href="objects-inside.html" class="btn-plain link-dashed"><img src="/index/img/icon/pen.svg"
                                        alt=""> Редактировать
                                    время, дату, стоимость</a>
                                <div class="form-item-half d-flex-justify">
                                    <button class="btn-plain btn-greysub"><i class="fas fa-chevron-left"></i> Назад
                                    </button>
                                    <div class="btn-box d-flex-justify">
                                        <button class="btn-plain btn-redsub">Удалить объект</button>
                                        <button class="btn-plain btn-blue" type="submit">Разместить</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="question-popup add-invent-modal">
    <div class="question-popup-head d-flex-justify">
        <h3>Добавить инвентар</h3>
        <button class="btn-plain close-popup"><i class="fas fa-times"></i></button>
    </div>
    <form action="#">
        <div class="inventar-label d-flex">
            <input type="text" placeholder="Инвентар" class="input-attr invent-text">
            <label class="price-current">
                <input type="text" placeholder="Цена" class="input-attr">
                <i class="icon i-tg"></i>
            </label>
        </div>
        <button class="btn-plain btn-blue" type="submit">Сохранить</button>
    </form>
</div>
<div class="question-popup edit-invent-modal">
    <div class="question-popup-head d-flex-justify">
        <h3>Редактировать инвентар</h3>
        <button class="btn-plain close-popup"><i class="fas fa-times"></i></button>
    </div>
    <form action="#">
        <div class="inventar-label d-flex">
            <div class="checkbox-cover">
                <input type='checkbox' class='ios8-switch checkbox-attr' id='checkbox-106'>
                <label for='checkbox-106'></label>
                <input type="text" placeholder="Инвентар" class="input-attr">
            </div>
            <label class="price-current">
                <input type="text" placeholder="Цена" class="input-attr">
                <i class="icon i-tg"></i>
            </label>
        </div>
        <div class="inventar-label d-flex">
            <button class="btn-plain btn-blue" type="submit">Сохранить</button>
        </div>

    </form>
</div>
<div class="overlay"></div>
@endsection
@section('js')
@endsection