<component name="common.page.document">

<main id="main">

<component name="components.breadcrumbs" $text1="Услуги" $text2="Главная" $text3="Услуги"/>

<section id="services" class="services">
    <div class="container">

        <h2 class="text__title section-title section-title--medium section-title--cyan">Наше оборудование</h2>
        <div class="row">
            <div class="col-lg-1" style="margin-right: -55px"></div>
            <component name="services.servicessection" $styles="" $text1="Горизонтальный токарный станок ЧПУ Okuma LB 15 II"
                                                         $text2="Максимальный диаметр обработки – 300 мм; Максимальная длина обработки – 600 мм; Револьверная голова на 12 инструментов; Гидравлическая задняя бабка."/>
            <component name="services.servicessection" $styles="margin-left: auto; margin-right: 55px" $text1="Горизонтальный токарный станок с ЧПУ SOLEX NL254 HC"
                                                         $text2="Максимальный диаметр обработки – 280 мм; Максимальная длина обработки – 1000 мм; Револьверная голова на 8 инструментов; Гидравлическая задняя бабка."/>
            <component name="services.servicessection" $styles="margin-left: auto; margin-right: auto" $text1="Горизонтальный токарный станок Z-MAT FL400"
                                                         $text2="Приводной инструмент 2+2 с осью Y и функцией оси С; Стойка управления - Siemens 808 Advanced; Макс.диаметр обработки — 250мм."/>
            <component name="services.servicessection" $styles="margin-left: auto; margin-right: auto" $text1="Вертикально-обрабатывающий центр Z-MAT VMC1050"
                                                         $text2="Размер стола 1300ммх520мм; Макс. нагрузка на стол 750кг; Кол-во инструмента — 24шт; Перемещение по осям X/Y/Z, мм - 1050/500/600."/>
            <component name="services.servicessection" $styles="margin-left: auto; margin-right: auto" $text1="Вертикально-обрабатывающий центр Z-MAT VMC700E"
                                                         $text2="Размер стола 1300ммх520мм; Макс. нагрузка на стол 750кг; Кол-во инструмента — 24шт; Перемещение по осям X/Y/Z, мм - 1050/500/600."/>
            <component name="services.servicessection" $styles="margin-left: auto; margin-right: auto" $text1="Вертикально-обрабатывающий центр GOODWAY GLS 2000 M"
                                                         $text2="Размер стола 1050ммх500мм; Макс. нагрузка на стол 600кг; Кол-во инструмента — 24шт; Перемещение по осям X/Y/Z, мм - 800/500/500."/>
            <component name="services.servicessection" $styles="margin-left: auto; margin-right: auto" $text1="Ленточнопильный станок 400 В JET HVBS-712K"
                                                         $text2="Биметаллическое ленточное полотно М42 20x0,9x2362 мм, 5/8 TP; Гидравлическая система подачи; Автоматический выключатель окончания распила."/>
            <component name="services.servicessection" $styles="margin-left: auto; margin-right: auto" $text1="Электроэрозионный вырезной станок REALREZ 630"
                                                         $text2="Централизованная система смазки. Система автонатяжения проволоки; Толщина резки до 1000 мм;Углы резания ±15°±30°±45°±60°; Цифровая шкала."/>
            </div>
        </div>
    </div>
</section>

 <div style="text-align: center">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Посмотреть все фотографии оборудования
        </button>
</div>

 <div class="modal fade" id="staticBackdrop" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Наше оборудование</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
            </div>
            <div class="modal-body">
                <img src="http://www.fsg-international.com/_media/img/xlarge/tornio-okuma-lb300-usato-fsg-international.jpg" class="modalphoto">
                <img src="https://www.prostanki.com/img/boardpics/2018_05/NVA8dc8ROvIlCGDH7y59.jpg" class="modalphoto">
                <img src="http://sc01.alicdn.com/kf/HTB1_PO4LpXXXXbBXVXXq6xXFXXXq/200734074/HTB1_PO4LpXXXXbBXVXXq6xXFXXXq.jpg" class="modalphoto">
                <img src="https://st17.stpulscen.ru/images/product/372/203/645_big.jpg" class="modalphoto">
                <img src="https://st17.stpulscen.ru/images/product/372/203/578_big.jpg" class="modalphoto">
                <img src="https://asw.ru/wa-data/public/shop/products/94/08/894/images/1257/1257.600.jpg" class="modalphoto">
                <img src="https://st2.stpulscen.ru/images/product/423/271/339_big.jpg" class="modalphoto">
                <img src="https://stankobox.ru/img/catalog/c747.png" class="modalphoto">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<section id="features" class="features">
    <div class="container">

        <div class="section-title">
            <h2>Услуги</h2>
            <p>Ознакомьтесь с нашими услугами.</p>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                    <component name="services.servicesfeaturessection" $tabnum="1" $active="active show" $text="Токарные работы"/>
                    <component name="services.servicesfeaturessection" $tabnum="2" $active="" $text="Фрезерные работы"/>
                    <component name="services.servicesfeaturessection" $tabnum="3" $active="" $text="Сварка металлов"/>
                    <component name="services.servicesfeaturessection" $tabnum="4" $active="" $text="Цинкование металлов"/>
                    <component name="services.servicesfeaturessection" $tabnum="5" $active="" $text="Прокатка металлов"/>
                </ul>
            </div>
        <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
                <component name="services.tabcontent" $active="active show" $text1="Токарные работы" $text2="Обработка резанием"
                                                        $text3="Это механическая обработка резанием или поверхностным пластическим деформированием наружных и внутренних поверхностей вращения, в том числе цилиндрических и конических, торцевание, отрезание, снятие фасок, обработка галтелей, прорезание канавок, нарезание внутренних и наружных резьб на токарных станках."
                                                        $imagenum="1" $tabnum="1"/>
                <component name="services.tabcontent" $text1="Фрезерные работы" $text2="Обработка резанием"
                                                        $text3="Это механическая обработка резанием плоскостей, пазов, лысок, при которой режущий инструмент совершает вращательное движение, а обрабатываемая заготовка - поступательное. Работа совершается на фрезерном станке."
                                                        $imagenum="2" $tabnum="2"/>
                <component name="services.tabcontent" $text1="Сварка металлов" $text2=""
                                                        $text3="Процесс получения неразъёмных соединений посредством установления межатомных связей между свариваемыми частями при их местном или общем нагреве. Применяется для создания сложных деталей."
                                                        $imagenum="3" $tabnum="3"/>
                <component name="services.tabcontent" $text1="Цинкование" $text2="Защита поверхности детали"
                                                        $text3="Цинкование — это технологический процесс обработки деталей или конструкций из металла, нацеленный на защиту от воздействия коррозии."
                                                        $imagenum="4" $tabnum="4"/>
                <component name="services.tabcontent" $text1="Прокатка металла" $text2="Обработка металлов давлением"
                                                        $text3="Процесс пластического деформирования тел, между вращающимися приводными валками. Деформация через валки, соединенные с двигателем прокатного станка."
                                                        $imagenum="5" $tabnum="5"/>
            </div>
        </div>
        </div>

    </div>
</section>

</main>

</component>
