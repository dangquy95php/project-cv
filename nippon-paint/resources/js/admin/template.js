CKEDITOR.addTemplates('default',{
    templates: [
        {
            title:'製品特長ボックス(見出し+本文)',
            description:'建築用塗料',
            html:`
            <div class="p-building4__box">
                <h3 class="p-building4__box__title1">
                    <span>1.</span>見出しが入ります
                </h3>
                <p class="p-building4__box__text">見出しに対応する特長のテキストが入りますこの文章はダミーです予めご了承下さい。見出しに対応する特長のテキストが入りますこの文章はダミーです予めご了承下さい。</p>
            </div>
            `
        },
        {
            title:'製品特長ボックス(見出し+本文+画像)',
            description:'建築用塗料',
            html:`
                <div class="p-building4__box">
                    <h3 class="p-building4__box__title1">
                        <span>2.</span>見出しが入ります
                    </h3>
                    <p class="p-building4__box__text">見出しに対応する特長のテキストが入りますこの文章はダミーです予めご了承下さい。見出しに対応する特長のテキストが入りますこの文章はダミーです予めご了承下さい。</p>

                    <p class="p-building4__box__title2">画像見出しキャプション</p>
                    <p class="p-building4__box__text">画像キャプションが入ります。この文章はダミーです予めご了承下さい。この文章はダミーです予めご了承下さい。</p>
                    <div class="p-building4__box__img">
                        <img src="/images/products/building/noimg3.jpg" alt="2. 見出しが入ります">
                    </div>
                </div>
            `
        },
        {
            title:'製品特長ボックス(複数連続)',
            description:'建築用塗料',
            html:`
                <div class="p-building4__grbox">
                    <div class="p-building4__box">
                        <h3 class="p-building4__box__title1">
                            <span>1.</span>見出しが入ります
                        </h3>
                        <p class="p-building4__box__text">見出しに対応する特長のテキストが入りますこの文章はダミーです予めご了承下さい。見出しに対応する特長のテキストが入りますこの文章はダミーです予めご了承下さい。</p>
                    </div>
                    <div class="p-building4__box">
                        <h3 class="p-building4__box__title1">
                            <span>2.</span>見出しが入ります
                        </h3>
                        <p class="p-building4__box__text">見出しに対応する特長のテキストが入りますこの文章はダミーです予めご了承下さい。見出しに対応する特長のテキストが入りますこの文章はダミーです予めご了承下さい。</p>

                        <p class="p-building4__box__title2">画像見出しキャプション</p>
                        <p class="p-building4__box__text">画像キャプションが入ります。この文章はダミーです予めご了承下さい。この文章はダミーです予めご了承下さい。</p>

                        <div class="p-building4__box__img">
                            <img src="/images/products/building/noimg3.jpg" alt="2. 見出しが入ります">
                        </div>
                    </div>
                </div>
            `
        },
        {
            title:'カラーラインナップ',
            description:'建築用塗料',
            html:`
                <ul class="p-building3__list">
                    <li class="p-building3__item">
                        <div class="p-building3__item__img">
                            <img src="/images/products/building/noimg2.jpg" alt="クールブラック">
                        </div>
                        <div class="p-building3__item__text">
                            <p class="p-building3__item__text1">クールブラック</p>
                            <p class="p-building3__item__text2">全日射：28.4%<br><span>（近赤外：61.0%）</span></p>
                        </div>
                    </li>
                    <li class="p-building3__item">
                        <div class="p-building3__item__img">
                            <img src="/images/products/building/noimg2.jpg" alt="クールブラック">
                        </div>
                        <div class="p-building3__item__text">
                            <p class="p-building3__item__text1">クールブラック</p>
                            <p class="p-building3__item__text2">全日射：28.4%<br><span>（近赤外：61.0%）</span></p>
                        </div>
                    </li>
                    <li class="p-building3__item">
                        <div class="p-building3__item__img">
                            <img src="/images/products/building/noimg2.jpg" alt="クールディープグレー">
                        </div>
                        <div class="p-building3__item__text">
                            <p class="p-building3__item__text1">クールディープグレー</p>
                            <p class="p-building3__item__text2">全日射：32.9%<br><span>（近赤外：67.4%）</span></p>
                        </div>
                    </li>
                    <li class="p-building3__item">
                        <div class="p-building3__item__img">
                            <img src="/images/products/building/noimg2.jpg" alt="クールコーヒーブラウン">
                        </div>
                        <div class="p-building3__item__text">
                            <p class="p-building3__item__text1">クールコーヒーブラウン</p>
                            <p class="p-building3__item__text2">全日射：31.1%<br><span>（近赤外：61.4%）</span></p>
                        </div>
                    </li>
                    <li class="p-building3__item">
                        <div class="p-building3__item__img">
                            <img src="/images/products/building/noimg2.jpg" alt="クールコーヒーブラウン">
                        </div>
                        <div class="p-building3__item__text">
                            <p class="p-building3__item__text1">クールコーヒーブラウン</p>
                            <p class="p-building3__item__text2">全日射：31.1%<br><span>（近赤外：61.4%）</span></p>
                        </div>
                    </li>
                </ul>
            `
        },
        {
            title:'使用量、{1缶当たりの塗り面積（m²）}',
            description:'建築用塗料',
            html:`
                <div class="c-table">
                    <table>
                        <thead>
                            <tr>
                                <th>{仕上げの種類}</th>
                                <th>{使用量<br class="sp-only">（kg/㎡/回）}</th>
                                <th>1缶当たりの<br class="sp-only">塗り面積<br class="sp-only">（m²／回／缶）</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{凹凸模様吹き仕上げ（タイルガン）}</td>
                                <td>{1.40～2.00}</td>
                                <td>{10～14}</td>
                            </tr>
                            <tr>
                                <td>{ゆず肌ローラー仕上げ（砂骨ローラー）}</td>
                                <td>{1.40～2.00}</td>
                                <td>{10～14}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        },
        {
            title:'希釈率',
            description:'建築用塗料',
            html:`
                <div class="c-table4 c-table4--style1 c-table--large">
                    <div class="c-table__scroll sp-only">
                        <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                        <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th colspan="2">塗装方法</th>
                                <th>1コート<br>希釈率（％）</th>
                                <th>1コート<br>使用量（kg/㎡/回）</th>
                                <th>2コート<br>希釈率（％）</th>
                                <th>2コート<br>使用量（kg/㎡/回）</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>1</th>
                                <td>{塗装方法が入ります}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>{塗装方法が入ります}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                            </tr>
                            <tr>
                                <th>3</th>
                                <td>{塗装方法が入ります}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                            </tr>
                            <tr>
                                <th>4</th>
                                <td>{塗装方法が入ります}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                            </tr>
                            <tr>
                                <th>5</th>
                                <td>{塗装方法が入ります}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                                <td>{xx}〜{xx}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        },
        {
            title:'乾燥時間',
            description:'建築用塗料',
            html:`
                <div class="c-table c-table--large">
                    <div class="c-table__scroll sp-only">
                        <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                        <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>{仕上げの種類}</th>
                                <th>5～10℃</th>
                                <th>23℃</th>
                                <th>30℃</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>指触乾燥</th>
                                <td>{40}分</td>
                                <td>{15}分</td>
                                <td>{10}分</td>
                            </tr>
                            <tr>
                                <th>指触乾燥</th>
                                <td>{40}分</td>
                                <td>{15}分</td>
                                <td>{10}分</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        },
        {
            title:'価格',
            description:'建築用塗料',
            html:`
                <div class="c-table">
                    <table>
                        <thead>
                            <tr>
                                <th>{仕上げの種類}</th>
                                <th><span class="pc-only">{材工価格}</span><span class="sp-only">{使用量<br>（kg/㎡/回）}</span></th>
                                <th><span class="pc-only">備考</span><span class="sp-only">1缶当たりの<br>塗り面積<br>（m²／回／缶）</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{新設（内・外壁面）}</td>
                                <td>{1840}円/平方メートル</td>
                                <td>{3工程・水性カチオンシーラー透明＋水性ケンエースグロス}</td>
                            </tr>
                            <tr>
                                <td><span class="pc-only">{改修（内・外壁面）}</span><span class="sp-only">{新設（内・外壁面）}</span></td>
                                <td>{1430}円/平方メートル</td>
                                <td><span class="pc-only">{2工程条件によっては別途下塗り工程が必要な場合があります。}</span><span class="sp-only">{2工程・水性カチオンシーラー透明＋水性ケンエースグロス}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        },
        {
            title:'塗料単価',
            description:'重防食用塗料',
            html:`
                <div class="c-table">
                    <table>
                        <thead>
                            <tr>
                                <th>石油缶当り（円）</th>
                                <th>Kg当り（円）</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        },
        {
            title:'消防法表示',
            description:'重防食用塗料',
            html:`
                <div class="c-table">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>塗料液</th>
                                <th>硬化剤</th>
                                <th>粉末</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>化学名</th>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>危険物区分</th>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>危険物等級</th>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        },
        {
            title:'消防法表示2',
            description:'重防食用塗料',
            html:`
                <div class="c-table">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>塗料液</th>
                                <th>硬化剤</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>化学名</th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>危険物区分</th>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>危険物等級</th>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        },
        {
            title:'消防法表示3',
            description:'重防食用塗料',
            html:`
                <div class="c-table">
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>塗料液</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>化学名</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>危険物区分</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th>危険物等級</th>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        },
        {
            title:'混合比',
            description:'自動車補修用塗料',
            html:`
                <div class="c-table c-table--large">
                    <div class="c-table__scroll sp-only">
                        <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                        <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>FSクリヤー</th>
                                <th>ハードナー</th>
                                <th>シンナー</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>標準仕様</th>
                                <td>100</td>
                                <td>33.3</td>
                                <td>10〜30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        },
        {
            title:'乾燥',
            description:'自動車補修用塗料',
            html:`
                <div class="c-table c-table--large">
                    <div class="c-table__scroll sp-only">
                        <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                        <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>区分</th>
                                <th>条件</th>
                                <th>乾燥時間</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>指触乾燥時間</th>
                                <td>自然乾燥</td>
                                <td>20℃&times;10分</td>
                            </tr>
                            <tr>
                                <th colspan="1" rowspan="2">ポリッシュ可能時間</th>
                                <td>強制乾燥</td>
                                <td>60℃&times;12分以上</td>
                            </tr>
                            <tr>
                                <td>自然乾燥</td>
                                <td>20℃&times;8時間以上</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        },
        {
            title:'ポットライフ',
            description:'自動車補修用塗料',
            html:`
                <div class="c-table c-table--large">
                    <div class="c-table__scroll sp-only">
                        <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                        <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>温度</th>
                                <th>10℃</th>
                                <th>20℃</th>
                                <th>30℃</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>ポットライフ</th>
                                <td>{x}時間</td>
                                <td>{x}時間</td>
                                <td>{x}時間</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        },
        {
            title:'樹脂仕様',
            description:'自動車補修用塗料',
            html:`
                <div class="c-table c-table--large">
                    <div class="c-table__scroll sp-only">
                        <img class="c-table__scroll__arrow" src="/images/common/icon-arrow.svg" alt="">
                        <img class="c-table__scroll__text" src="/images/common/scroll.svg" alt="SCROLL">
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                                <th>{クリヤー}</th>
                                <th>{バンパー用ハードナー}</th>
                                <th>{シンナー}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{樹脂仕様名が入ります}</th>
                                <td>{xxx}</td>
                                <td>{xxx}</td>
                                <td>{xxx}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            `
        }
    ]}
);
