<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 13.10.2022 17:13:48
    TPL file: /postcontact_index.tpl
*/
function tpl_a68799c05871179af14a8a532fe81fed(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
     <?php Facade::Run("components.breadcrumbs", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "Проверка данных", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
     <h2 style="margin-left: 25px; margin-bottom: 25px">На этой странице мы проверим правильность введенных данных</h2>
     <?php if(is_array(Utils::ArrayGet('rows', $__tpl_data, null))) { foreach (Utils::ArrayGet('rows', $__tpl_data, null) as $row) { ?>
     <div class="row">
          <div class="col" style="margin-left: 35px"><?php echo Utils::ArrayGet('email', $row, null); ?></div>
          <div class="col"><?php echo Utils::ArrayGet('name', $row, null); ?></div>
          <div class="col"><?php echo Utils::ArrayGet('subject', $row, null); ?></div>
          <button class="buttonpost" href="#openModal">edit</button>
         необходимо оформить модальное окно к каждой строке с разными ид

          <hr width="1450" size="3" style="0 auto">
     </div><br>
     <?php }} ?>
<?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "end")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
<?php } ?><?php
} // tpl_a68799c05871179af14a8a532fe81fed
