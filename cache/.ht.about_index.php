<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 03.10.2022 13:36:46
    TPL file: /about_index.tpl
*/
function tpl_04e33f67dd0a782cffe32744b4523819(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<main id="main">
<?php Facade::Run("components.breadcrumbs", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "О нас", "text2" => "Главная", "text3" => "О нас", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<?php Facade::Run("components.aboutsection", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "ВладПромПред", "text2" => "Компания «ВладПромПред» предлагает различные виды работ по металлу: токарные работы, фрезеровочные, сварка металлов, цинкование и другие. Мы готовы осуществить металлообработку любой сложности, так как:", "text3" => "Наши цеха оснащены качественным многофункциональным оборудованием", "text4" => "В штате трудятся профильные специалисты с большим опытом работы в сфере металлообработки", "text5" => "Мы максимально ответственно выполняем заказ, детально изучая требования клиента", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<section class="page-section" id="services">
    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">Почему услугу металлообработки следует заказать у компании «ВладПромПред»?</h2>
        <hr class="divider">
        <div class="row gx-4 gx-lg-5">
            <?php Facade::Run("about.skillssection", array_merge($__tpl_data, array("__component_part" => "begin"), array("icon" => "-cart fs-1", "text1" => "Мы предлагаем своим клиентам адекватные цены.", "text2" => "Также у нас существует система скидок.", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("about.skillssection", array_merge($__tpl_data, array("__component_part" => "begin"), array("icon" => "-calendar2-check fs-1", "text1" => "Сроки изготовления заказа на металлообработку максимально короткие.", "text2" => "Это удается достичь за счет грамотной организации труда, полностью автоматизированного производства и опытных специалистов.", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("about.skillssection", array_merge($__tpl_data, array("__component_part" => "begin"), array("icon" => "-award fs-1", "text1" => "Сотрудники компании имеют многолетний опыт работы с металлом, поэтому качество изделий соответствует высокому стандарту.", "text2" => "Кроме того, на предприятии установлен строгий контроль качества, что позволяет полностью исключить брак.", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php Facade::Run("about.skillssection", array_merge($__tpl_data, array("__component_part" => "begin"), array("icon" => "-tools fs-1", "text1" => "Мы оказываем высокий спектр услуг по металлообработке.", "text2" => "Начиная токарной обработкой, заканчивая сваркой металла.", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
        </div>
    </div>
</section>

</main>

<?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "end")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?><?php } ?><?php
} // tpl_04e33f67dd0a782cffe32744b4523819
