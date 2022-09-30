<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 30.09.2022 20:51:23
    TPL file: /components_aboutsection.tpl
*/
function tpl_091e3cb077a0ba0594492d7d464c6e50(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><section id="about" class="about">
    <div class="container">
        <div class="row content">
            <div class="col-lg-6">
                <h2><?php echo Utils::ArrayGet('text1', $__tpl_data, null); ?></h2>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
                <p>
                    <?php echo Utils::ArrayGet('text2', $__tpl_data, null); ?>
                </p>
                <ul>
                    <li><i class="ri-check-double-line"></i><?php echo Utils::ArrayGet('text3', $__tpl_data, null); ?></li>
                    <li><i class="ri-check-double-line"></i><?php echo Utils::ArrayGet('text4', $__tpl_data, null); ?></li>
                    <li><i class="ri-check-double-line"></i><?php echo Utils::ArrayGet('text5', $__tpl_data, null); ?></li>
                </ul>
                <p class="fst-italic">
                    <?php echo Utils::ArrayGet('text6', $__tpl_data, null); ?>
                </p>
            </div>
        </div>

    </div>
</section><?php } ?><?php
} // tpl_091e3cb077a0ba0594492d7d464c6e50
