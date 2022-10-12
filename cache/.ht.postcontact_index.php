<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 12.10.2022 17:21:25
    TPL file: /postcontact_index.tpl
*/
function tpl_a68799c05871179af14a8a532fe81fed(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<?php Facade::Run("components.breadcrumbs", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "Проверка данных", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
     <h2 style="margin-left: 25px">На этой странице мы проверим правильность введенных данных</h2>
     <div>
          <h4 style="margin-left: 75px">Проверьте правильность данных:</h4>
          <a value="SendForm">*типо данные в столбике*</a><br>
     </div>





<?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "end")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?><?php } ?><?php
} // tpl_a68799c05871179af14a8a532fe81fed
