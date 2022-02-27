<div class="c-list {{$class}}">

    <div class="l-cont">
        <div class="c-list__content">
            <h2 class="c-title1">
                <span class="c-title1__jap">{{$title_jap}}</span>
                <span class="c-title1__eng">{{$title_eng}}</span>
            </h2>

            @if (isset($list_text))
                <p class="c-list__text">{{$list_text}}</p>
            @endif

            <x-btn>
                <x-slot name="class">c-btn1</x-slot>
                <x-slot name="text">view all</x-slot>
            </x-btn>
        </div>
    </div>

    @if ($class=="c-list1")
        <ul class="c-list__list c-list1__list">
            <li class="c-list1__item"><a href="#">
                <div class="c-list1__item__inner">
                    <p class="c-list1__listtext">建築用塗料</p>
                </div>
            </a></li>
            <li class="c-list1__item"><a href="#">
                <div class="c-list1__item__inner">
                    <p class="c-list1__listtext">重防食用塗料</p>
                </div>
            </a></li>
            <li class="c-list1__item"><a href="#">
                <div class="c-list1__item__inner">
                    <p class="c-list1__listtext">自動車補修用塗料</p>
                </div>
            </a></li>
        </ul>
    @endif

    @if ($class=="c-list2")
        <ul class="c-list__list c-list2__list">
            <li class="c-list2__item"><a href="/products/feature/perfect/">
                    <div class="c-list2__item__inner">
                        <img src="/images/top/c-list2_img1.svg" alt="prefect">
                        <img src="/images/top/c-list2_img1-white.svg" alt="prefect" class="hover-only">
                    </div>
                </a></li>
            <li class="c-list2__item"><a href="/products/feature/naxe-cube-wp-system/">
                    <div class="c-list2__item__inner">
                        <img src="/images/top/c-list2_img2.svg" alt="wb">
                        <img src="/images/top/c-list2_img2-white.svg" alt="wb" class="hover-only">
                    </div>
                </a></li>
            <li class="c-list2__item"><a href="/products/feature/thermoeye/">
                    <div class="c-list2__item__inner">
                        <img src="/images/top/c-list2_img3.svg" alt="eye">
                        <img src="/images/top/c-list2_img3-white.svg" alt="eye" class="hover-only">
                    </div>
                </a></li>
            <li class="c-list2__item"><a href="http://emo-paint.com/" target="_blank">
                    <div class="c-list2__item__inner">
                        <img src="/images/top/c-list2_img4.svg" alt="emo">
                        <img src="/images/top/c-list2_img4-white.svg" alt="emo" class="hover-only">
                    </div>
                </a>
            </li>
        </ul>
    @endif

    @if ($class=="c-list3")
        <ul class="c-list__list c-list1__list">
            <li class="c-list1__item"><a href="#">
                <div class="c-list1__item__inner">
                    <p class="c-list1__listtext">塗料の基礎知識</p>
                </div>
            </a></li>
            <li class="c-list1__item"><a href="#">
                <div class="c-list1__item__inner">
                    <p class="c-list1__listtext">戸建て塗り替えの基本</p>
                </div>
            </a></li>
            <li class="c-list1__item"><a href="#">
                <div class="c-list1__item__inner">
                    <p class="c-list1__listtext">マンション塗り替え</p>
                </div>
            </a></li>
            <li class="c-list1__item"><a href="#">
                <div class="c-list1__item__inner">
                    <p class="c-list1__listtext">内装ペイント</p>
                </div>
            </a></li>
            <li class="c-list1__item"><a href="#">
                <div class="c-list1__item__inner">
                    <p class="c-list1__listtext">塗装用語解説</p>
                </div>
            </a></li>
        </ul>
    @endif

    @if ($class=="c-list4")
        <ul class="c-list__list c-list4__list">
            <li class="c-list4__item"><a href="#">
                <div class="c-list4__item__inner">
                    <div class="c-list4__item__img">
                        <img src="/images/top/top5_img.jpg" alt="">
                    </div>
                    <div class="c-list4__item__detail">
                        <p class="c-list4__label">新商品</p>
                        <p class="c-list4__date">2020.06.09 </p>
                        <p class="c-list4__text">この文章はダミーテキストです予めご了承ください</p>
                    </div>
                </div>
            </a></li>
            <li class="c-list4__item"><a href="#">
                <div class="c-list4__item__inner">
                    <div class="c-list4__item__img">
                        <img src="/images/top/top5_img.jpg" alt="">
                    </div>
                    <div class="c-list4__item__detail">
                        <p class="c-list4__label">お知らせ</p>
                        <p class="c-list4__date">2020.06.09 </p>
                        <p class="c-list4__text">この文章はダミーテキストです予めご了承ください</p>
                    </div>
                </div>
            </a></li>
            <li class="c-list4__item"><a href="#">
                <div class="c-list4__btn"></div>
                <div class="c-list4__item__inner">
                    <div class="c-list4__item__img">
                        <img src="/images/top/top5_noimg.jpg" alt="">
                    </div>
                    <div class="c-list4__item__detail">
                        <p class="c-list4__label">セミナー</p>
                        <p class="c-list4__date">2020.06.09 </p>
                        <p class="c-list4__text">この文章はダミーテキストです予めご了承ください</p>
                    </div>
                </div>
            </a></li>
            <li class="c-list4__item"><a href="#">
                <div class="c-list4__item__inner">
                    <div class="c-list4__item__img">
                        <img src="/images/top/top5_img.jpg" alt="">
                    </div>
                    <div class="c-list4__item__detail">
                        <p class="c-list4__label">イベント</p>
                        <p class="c-list4__date">2020.06.09 </p>
                        <p class="c-list4__text">この文章はダミーテキストです予めご了承ください</p>
                    </div>
                </div>
            </a></li>
            <li class="c-list4__item"><a href="#">
                <div class="c-list4__item__inner">
                    <div class="c-list4__item__img">
                        <img src="/images/top/top5_img.jpg" alt="">
                    </div>
                    <div class="c-list4__item__detail">
                        <p class="c-list4__label">キャンペーン</p>
                        <p class="c-list4__date">2020.06.09 </p>
                        <p class="c-list4__text">この文章はダミーテキストです予めご了承ください</p>
                    </div>
                </div>
            </a></li>
        </ul>
    @endif
    
</div>