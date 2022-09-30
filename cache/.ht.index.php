<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 30.09.2022 22:04:57
    TPL file: /index.tpl
*/
function tpl_0f17278e8f07f06fdfbd8b5ee1ceb114(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><?php Facade::Run("components.head", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
<?php Facade::Run("components.header", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
        <div class="carousel-inner" role="listbox">
            <?php Facade::Run("components.carousel", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "Наши услуги", "text2" => "Использование комплексных методов механической обработки металла дают нам оптимальный результат.", "text3" => "Узнать больше", "slidejpg" => "slide-1.jpg", "activecaro" => "active", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.carousel", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "Механическая обработка", "text2" => "Обработка изделий из стали и других материалов с помощью механического воздействия с применением резца, сверла, фрезы и другого режущего инструмента.", "text3" => "Узнать больше", "slidejpg" => "slide-2.jpg", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.carousel", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "Наши работы", "text2" => " ВладПромПред предлагает ознакомиться с примерами готовых работ. На сайте Вы найдете фотографии изготовленных работ либо сможете заказать у нас изготовление изделий по индивидуальным чертежам.", "text3" => "Узнать больше", "slidejpg" => "slide-3.jpg", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
        </div>
        <?php Facade::Run("components.carouselcontrol", array_merge($__tpl_data, array("__component_part" => "begin"), array("turn" => "prev", "side" => "left", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
        <?php Facade::Run("components.carouselcontrol", array_merge($__tpl_data, array("__component_part" => "begin"), array("turn" => "next", "side" => "right", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
    </div>
</section>

<main id="main">
    <?php Facade::Run("components.aboutsection", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "Токарная и фрезерная обработка на станках с ЧПУ", "text2" => " Преимущества работы с нашей компанией", "text3" => "Быстрые сроки доставки", "text4" => "Высокий уровень работ", "text5" => "Высококвалифицированные сотрудники", "text6" => "Наша компания основана в 2013 году, и за прошедший период успешно выполнила огромное количество заказов по производству продукции из различных видов материалов (металл, текстолит, фторопласт и др.)", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<section id="clients" class="clients section-bg">
    <div class="container">
        <div class="row">
            <?php Facade::Run("components.clientsection", array_merge($__tpl_data, array("__component_part" => "begin"), array("clientnum" => "1", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.clientsection", array_merge($__tpl_data, array("__component_part" => "begin"), array("clientnum" => "2", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.clientsection", array_merge($__tpl_data, array("__component_part" => "begin"), array("clientnum" => "3", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.clientsection", array_merge($__tpl_data, array("__component_part" => "begin"), array("clientnum" => "4", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.clientsection", array_merge($__tpl_data, array("__component_part" => "begin"), array("clientnum" => "5", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.clientsection", array_merge($__tpl_data, array("__component_part" => "begin"), array("clientnum" => "6", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
        </div>
    </div>
</section>

<section id="services" class="services">
    <div class="container">
        <div class="row">
            <?php Facade::Run("components.featuressection", array_merge($__tpl_data, array("__component_part" => "begin"), array("icon" => "-briefcase", "text1" => "Доставка в любую точку РФ", "text2" => "Доставка заказа в любую точку РФ", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.featuressection", array_merge($__tpl_data, array("__component_part" => "begin"), array("icon" => "-card-checklist", "text1" => "Контроль качества", "text2" => "На всех этапах изготовления изделий, начиная от приемки материала до отправки деталей заказчику", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.featuressection", array_merge($__tpl_data, array("__component_part" => "begin"), array("icon" => "-bar-chart", "text1" => "Индивидуальный подход к каждому клиенту", "text2" => "Изготовление заказа под ваши параметры", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.featuressection", array_merge($__tpl_data, array("__component_part" => "begin"), array("icon" => "-binoculars", "text1" => "Гибкая ценовая политика", "text2" => "Система скидок и бонусов для партнеров", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.featuressection", array_merge($__tpl_data, array("__component_part" => "begin"), array("icon" => "-brightness-high", "text1" => "Нестандартные сложные изделия", "text2" => "Изготавливаем различные детали, независимо от из вида и сложности", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("components.featuressection", array_merge($__tpl_data, array("__component_part" => "begin"), array("icon" => "-calendar4-week", "text1" => "Кратчайшие сроки изготовления", "text2" => "Сроки выполнения заказа от 1 дня", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            </div>
        </div>
    </div>
</section>

<?php Facade::Run("components.footer", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
<?php Facade::Run("components.vendor", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?><?php } ?><?php
} // tpl_0f17278e8f07f06fdfbd8b5ee1ceb114
