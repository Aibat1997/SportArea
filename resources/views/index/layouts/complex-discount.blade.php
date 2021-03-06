<div class="tab-pane {{ request()->tab == 4 ? 'active' : '' }}" id="tab-4">
    <div class="discount-box">
        <div class="row">
            <div class="col-md-3 col-sm-4">
                <div class="discount-cover">
                    <h2>Активные скидки</h2>
                    <ul class="discount-list">
                        @foreach ($discounts as $discount)
                        <li>
                            <div class="discount-list-item">
                                @if ($discount->cd_type == 1)
                                <h3>Общая скидка</h3>
                                <p>{{$discount->cd_price}} {{ $discount->cd_pay_type == 1 ? 'тг.' : '%' }} скидка при регистрации</p>
                                <form action="/complex/discount/change" method="POST">
                                    @csrf
                                    <input type="hidden" name="c_id" value="{{ $discount->cd_id }}">
                                    <input type="hidden" name="cd_status" value="{{ $discount->cd_status == 1 ? 0 : 1 }}">
                                    <button class="btn-plain">{{ $discount->cd_status == 0 ? 'Активировать' : 'Деактивировать' }}</button>
                                </form>
                                @elseif($discount->cd_type == 2)
                                <h3>Индивидуальная скидка</h3>
                                <p>{{$discount->cd_price}} {{ $discount->cd_pay_type == 1 ? 'тг.' : '%' }} скидка по промо-коду</p>
                                <p>{{$discount->cd_promocode}} - до {{ App\Http\Helpers::simpleDate($discount->cd_finish_date) }}</p>
                                <form action="/complex/discount/change" method="POST">
                                    @csrf
                                    <input type="hidden" name="c_id" value="{{ $discount->cd_id }}">
                                    <input type="hidden" name="cd_status" value="{{ $discount->cd_status == 1 ? 0 : 1 }}">
                                    <button class="btn-plain">{{ $discount->cd_status == 0 ? 'Активировать' : 'Деактивировать' }}</button>
                                </form>
                                @else
                                <h3>Автоматизированная скидка</h3>
                                <p>{{$discount->cd_price}} {{ $discount->cd_pay_type == 1 ? 'тг.' : '%' }} скидка по достижению {{$discount->cd_hours}} часов игры</p>
                                <form action="/complex/discount/change" method="POST">
                                    @csrf
                                    <input type="hidden" name="c_id" value="{{ $discount->cd_id }}">
                                    <input type="hidden" name="cd_status" value="{{ $discount->cd_status == 1 ? 0 : 1 }}">
                                    <button class="btn-plain">{{ $discount->cd_status == 0 ? 'Активировать' : 'Деактивировать' }}</button>
                                </form>
                                @endif
                            </div>
                            <img src="/index/img/icon/discount-elipsis.svg" alt="" class="discount-elipsis">
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-8">
                <div class="discount-create">
                    <h2>Создание скидки</h2>
                    @if($errors->any())
                    <div class="alert alert-success dont-show">{{$errors->first()}}</div>
                    @endif
                    <form action="/complex/{{ request()->route('complex')->sc_id }}/discount" method="POST"
                        autocomplete="off">
                        @csrf
                        <input type="hidden" name="cd_type" value="1">
                        <div class="object-filter static-filter d-flex-justify">
                            <div class="sidebar-item">
                                <label class="input-search">
                                    <input type="text" placeholder="Общая скидка" disabled>
                                </label>
                            </div>
                            <div class="sidebar-item">
                                <label class="select-label input-search">
                                    <input type="text" name="dates" placeholder="Сентябрь – Октябрь" class="datefilter">
                                    <i class="icon i-calendar"></i>
                                </label>
                            </div>
                            <div class="sidebar-item">
                                <label class="select-label input-search">
                                    <input type="text" name="times" placeholder="По времени" class="single_time">
                                    <i class="icon i-clock"></i>
                                </label>
                            </div>
                            <div class="sidebar-item">
                                <label class="select-label input-search">
                                    <input type="text" name="cd_price" placeholder="Сумма скидки"
                                        class="discount-price">
                                    <div class="discount-price-cover d-flex">
                                        <label class="checkbox-container">
                                            <input type="radio" name="cd_pay_type" value="1" checked="checked">
                                            <span class="checkmark">
                                                тг
                                            </span>
                                        </label>

                                        <label class="checkbox-container">
                                            <input type="radio" name="cd_pay_type" value="0">
                                            <span class="checkmark">
                                                %
                                            </span>
                                        </label>

                                    </div>
                                </label>
                            </div>
                            <div class="sidebar-item">
                                <div class="weekDays-selector">
                                    <input type="checkbox" id="weekday-mon" name="cd_week_days[]" value="1"
                                        class="weekday" />
                                    <label for="weekday-mon">Пн</label>
                                    <input type="checkbox" id="weekday-tue" name="cd_week_days[]" value="2"
                                        class="weekday" />
                                    <label for="weekday-tue">Вт</label>
                                    <input type="checkbox" id="weekday-wed" name="cd_week_days[]" value="3"
                                        class="weekday" />
                                    <label for="weekday-wed">Ср</label>
                                    <input type="checkbox" id="weekday-thu" name="cd_week_days[]" value="4"
                                        class="weekday" />
                                    <label for="weekday-thu">Чт</label>
                                    <input type="checkbox" id="weekday-fri" name="cd_week_days[]" value="5"
                                        class="weekday" />
                                    <label for="weekday-fri">Пт</label>
                                    <input type="checkbox" id="weekday-sat" name="cd_week_days[]" value="6"
                                        class="weekday" />
                                    <label for="weekday-sat">Сб</label>
                                    <input type="checkbox" id="weekday-sun" name="cd_week_days[]" value="7"
                                        class="weekday" />
                                    <label for="weekday-sun">Вс</label>
                                </div>
                            </div>
                            <div class="sidebar-item">
                                <button class="btn-plain btn-blue">Создать скидку</button>
                            </div>
                        </div>
                    </form>
                    <div class="discount-ind-cover">
                        <form action="/complex/{{ request()->route('complex')->sc_id }}/discount" method="POST"
                            autocomplete="off">
                            @csrf
                            <input type="hidden" name="cd_type" value="2">
                            <div class="object-filter static-filter d-flex-justify">
                                <div class="sidebar-item">
                                    <label class="input-search">
                                        <input type="text" placeholder="Индивидуальная скидка" disabled>
                                    </label>
                                </div>
                                <div class="sidebar-item">
                                    <label class="select-label select datalist">
                                        <i class="icon user"></i>
                                        <input list="options" id="userchoise" placeholder="Логин клиента">
                                        <datalist id="options">
                                            @include('index.layouts.select-user')
                                        </datalist>
                                        <input type="hidden" name="cd_user_id">
                                        <i class="fas fa-chevron-down arrow-select"></i>
                                    </label>
                                </div>
                                <div class="sidebar-item">
                                    <label class="select-label input-search">
                                        <input type="text" name="cd_price" placeholder="Сумма скидки"
                                            class="discount-price">
                                        <div class="discount-price-cover d-flex">
                                            <label class="checkbox-container">
                                                <input type="radio" name="cd_pay_type" value="1" checked="checked">
                                                <span class="checkmark">
                                                    тг
                                                </span>
                                            </label>

                                            <label class="checkbox-container">
                                                <input type="radio" name="cd_pay_type" value="0">
                                                <span class="checkmark">
                                                    %
                                                </span>
                                            </label>

                                        </div>
                                    </label>
                                </div>
                                <div class="sidebar-item">
                                    <label class="select-label input-search">
                                        <input type="text" name="dates" placeholder="Сентябрь – Октябрь"
                                            class="datefilter">
                                        <i class="icon i-calendar"></i>
                                    </label>
                                </div>
                                <div class="sidebar-item">
                                    <label class="select-label input-search">
                                        <input type="text" name="times" placeholder="По времени" class="single_time">
                                        <i class="icon i-clock"></i>
                                    </label>
                                </div>
                                <div class="sidebar-item">
                                    <button class="btn-plain btn-blue">Создать скидку</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="discount-auto-cover">
                        <form action="/complex/{{ request()->route('complex')->sc_id }}/discount" method="POST"
                            autocomplete="off">
                            @csrf
                            <input type="hidden" name="cd_type" value="3">
                            <div class="object-filter static-filter d-flex-justify">
                                <div class="sidebar-item">
                                    <label class="input-search">
                                        <input type="text" placeholder="Автоматизированная скидка" disabled>
                                    </label>
                                </div>
                                <div class="sidebar-item">
                                    <label class="input-search">
                                        <input type="number" name="cd_hours" placeholder="После скольки часов">
                                    </label>
                                </div>
                                <div class="sidebar-item">
                                    <label class="select-label input-search">
                                        <input type="text" name="cd_price" placeholder="Сумма скидки"
                                            class="discount-price">
                                        <div class="discount-price-cover d-flex">
                                            <label class="checkbox-container">
                                                <input type="radio" name="cd_pay_type" value="1" checked="checked">
                                                <span class="checkmark">
                                                    тг
                                                </span>
                                            </label>

                                            <label class="checkbox-container">
                                                <input type="radio" name="cd_pay_type" value="0">
                                                <span class="checkmark">
                                                    %
                                                </span>
                                            </label>

                                        </div>
                                    </label>
                                </div>
                                <div class="sidebar-item">
                                    <label class="select-label input-search">
                                        <input type="text" name="dates" placeholder="Сентябрь – Октябрь"
                                            class="datefilter">
                                        <i class="icon i-calendar"></i>
                                    </label>
                                </div>
                                <div class="sidebar-item">
                                    <label class="select-label input-search">
                                        <input type="text" name="times" placeholder="По времени" class="single_time">
                                        <i class="icon i-clock"></i>
                                    </label>
                                </div>
                                <div class="sidebar-item">
                                    <button class="btn-plain btn-blue">Создать скидку</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>