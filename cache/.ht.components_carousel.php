<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 27.09.2022 17:14:32
    TPL file: /components_carousel.tpl
*/
function tpl_b89b46d54e570363d2962cf3af755fc4(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><div class="carousel-item <?php echo Utils::ArrayGet('activecaro', $__tpl_data, null); ?>" style="background-image: url(assets/img/slide/<?php echo Utils::ArrayGet('slidejpg', $__tpl_data, null); ?>)">
    <div class="carousel-container">
        <div class="container">
            <h2 class="animate__animated animate__fadeInDown"><?php echo Utils::ArrayGet('text1', $__tpl_data, null); ?></h2>
            <p class="animate__animated animate__fadeInUp"><?php echo Utils::ArrayGet('text2', $__tpl_data, null); ?></p>
            <a href="services.html" class="btn-get-started animate__animated animate__fadeInUp scrollto"><?php echo Utils::ArrayGet('text3', $__tpl_data, null); ?></a>
        </div>
    </div>
</div><?php } ?><?php
} // tpl_b89b46d54e570363d2962cf3af755fc4
