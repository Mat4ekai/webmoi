<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 03.10.2022 12:47:52
    TPL file: /common_page_document.tpl
*/
function tpl_e6816b7d29efc66af10da63a013e72d7(Template $__tpl, &$__tpl_data){
?>
<?php if (Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><!DOCTYPE html>
<html lang="en">
<?php Facade::Run("common.page.head", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
<body>
    <?php Facade::Run("common.page.header", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
    <?php } ?><?php if (Utils::ArrayGet('__component_part', $__tpl_data, null) == "end") { ?>
    <?php Facade::Run("common.page.footer", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
    <?php Facade::Run("common.page.vendor", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
</body>
</html><?php } ?><?php
} // tpl_e6816b7d29efc66af10da63a013e72d7
