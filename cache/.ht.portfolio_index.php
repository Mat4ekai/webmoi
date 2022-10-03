<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 03.10.2022 14:24:14
    TPL file: /portfolio_index.tpl
*/
function tpl_603bd71cdde8d341cac088dc1f99d39e(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<main id="main">

<?php Facade::Run("components.breadcrumbs", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "Наши работы", "text2" => "Главная", "text3" => "Наши работы", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<section id="portfolio" class="portfolio">
    <div class="container">
        <div class="row portfolio-container">
            <?php if(is_array(Utils::ArrayGet('images', $__tpl_data, null))) { foreach (Utils::ArrayGet('images', $__tpl_data, null) as $img) { ?>
            <?php Facade::Run("portfolio.portfoliophoto", array_merge($__tpl_data, array("__component_part" => "begin"), array("img" => (isset($img) ? $img : null), "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
            <?php }} ?>
        </div>
    </div>
</section>

</main>

<?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "end")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
<?php } ?><?php
} // tpl_603bd71cdde8d341cac088dc1f99d39e
