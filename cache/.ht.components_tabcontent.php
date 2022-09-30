<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 30.09.2022 22:14:39
    TPL file: /components_tabcontent.tpl
*/
function tpl_e65753c253707c684c74766bff37678d(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><div class="tab-pane <?php echo Utils::ArrayGet('active', $__tpl_data, null); ?>" id="tab-<?php echo Utils::ArrayGet('tabnum', $__tpl_data, null); ?>">
    <div class="row">
        <div class="col-lg-8 details order-2 order-lg-1" >
            <h3><?php echo Utils::ArrayGet('text1', $__tpl_data, null); ?></h3>
            <p class="fst-italic"><?php echo Utils::ArrayGet('text2', $__tpl_data, null); ?></p>
            <p><?php echo Utils::ArrayGet('text3', $__tpl_data, null); ?></p>
        </div>
        <div class="col-lg-4 text-center order-1 order-lg-2">
            <img src="assets/img/features-<?php echo Utils::ArrayGet('imagenum', $__tpl_data, null); ?>.png" alt="" height="174" width="260">
        </div>
    </div>
</div><?php } ?><?php
} // tpl_e65753c253707c684c74766bff37678d
