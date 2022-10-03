<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 03.10.2022 12:40:32
    TPL file: /components_breadcrumbs.tpl
*/
function tpl_e6a5404cd13e98f7f6ea7df63ab40fa1(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2><?php echo Utils::ArrayGet('text1', $__tpl_data, null); ?></h2>
            <ol>
                <li><a href="index"><?php echo Utils::ArrayGet('text2', $__tpl_data, null); ?></a></li>
                <li><?php echo Utils::ArrayGet('text3', $__tpl_data, null); ?></li>
            </ol>
        </div>

    </div>
</section><?php } ?><?php
} // tpl_e6a5404cd13e98f7f6ea7df63ab40fa1
