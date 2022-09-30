<component name="components.head"/>
<component name="components.header"/>

<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
            <component name="components.carousel" $text1="Наши услуги" $text2="Использование комплексных методов механической обработки металла дают нам оптимальный результат."
                       $text3="Узнать больше" $slidejpg="slide-1.jpg" $activecaro="active"/>
            <component name="components.carousel" $text1="Механическая обработка" $text2="Обработка изделий из стали и других материалов с помощью механического воздействия с применением резца, сверла, фрезы и другого режущего инструмента."
                       $text3="Узнать больше" $slidejpg="slide-2.jpg" />
            <component name="components.carousel" $text1="Наши работы" $text2=" ВладПромПред предлагает ознакомиться с примерами готовых работ. На сайте Вы найдете фотографии изготовленных работ либо сможете заказать у нас изготовление изделий по индивидуальным чертежам."
                       $text3="Узнать больше" $slidejpg="slide-3.jpg" />
        </div>
        <component name="components.carouselcontrol" $turn="prev" $side="left"/>
        <component name="components.carouselcontrol" $turn="next" $side="right"/>
    </div>
</section>

<main id="main">
    <component name="components.aboutsection" $text1="Токарная и фрезерная обработка на станках с ЧПУ" $text2=" Преимущества работы с нашей компанией"
               $text3="Быстрые сроки доставки" $text4="Высокий уровень работ" $text5="Высококвалифицированные сотрудники"
               $text6="Наша компания основана в 2013 году, и за прошедший период успешно выполнила огромное количество заказов
                по производству продукции из различных видов материалов (металл, текстолит, фторопласт и др.)"/>

<section id="clients" class="clients section-bg">
    <div class="container">
        <div class="row">
            <component name="components.clientsection" $clientnum="1"/>
            <component name="components.clientsection" $clientnum="2"/>
            <component name="components.clientsection" $clientnum="3"/>
            <component name="components.clientsection" $clientnum="4"/>
            <component name="components.clientsection" $clientnum="5"/>
            <component name="components.clientsection" $clientnum="6"/>
        </div>
    </div>
</section>

<section id="services" class="services">
    <div class="container">
        <div class="row">
            <component name="components.featuressection" $icon="-briefcase" $text1="Доставка в любую точку РФ"
            $text2="Доставка заказа в любую точку РФ"/>
            <component name="components.featuressection" $icon="-card-checklist" $text1="Контроль качества"
            $text2="На всех этапах изготовления изделий, начиная от приемки материала до отправки деталей заказчику"/>
            <component name="components.featuressection" $icon="-bar-chart" $text1="Индивидуальный подход к каждому клиенту"
            $text2="Изготовление заказа под ваши параметры"/>
            <component name="components.featuressection" $icon="-binoculars" $text1="Гибкая ценовая политика"
            $text2="Система скидок и бонусов для партнеров"/>
            <component name="components.featuressection" $icon="-brightness-high" $text1="Нестандартные сложные изделия"
            $text2="Изготавливаем различные детали, независимо от из вида и сложности"/>
            <component name="components.featuressection" $icon="-calendar4-week" $text1="Кратчайшие сроки изготовления"
            $text2="Сроки выполнения заказа от 1 дня"/>
            </div>
        </div>
    </div>
</section>

<component name="components.footer"/>
<component name="components.vendor"/>