<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 27.09.2022 21:49:19
    TPL file: /common_modal_dialog.tpl
*/
function tpl_ada1f4cc1210dc390bcadeb694e3c855(Template $__tpl, &$__tpl_data){
?>
<?php if (Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><div
        class="modal"
        id="<?php echo Utils::ArrayGet('id', $__tpl_data, null); ?>"
        <?php echo Utils::ArrayGet('static', $__tpl_data, null) ? 'data-bs-backdrop="static" data-bs-keyboard="false"' : ''; ?>
        tabindex="-1"
        aria-labelledby="<?php echo Utils::ArrayGet('id', $__tpl_data, null); ?>Label"
        aria-hidden="true"
>
    <div class="modal-dialog <?php echo Utils::ArrayGet('scrollable', $__tpl_data, null) ? 'modal-dialog-scrollable' : ''; ?> <?php echo Utils::ArrayGet('centered', $__tpl_data, null) ? 'modal-dialog-centered' : ''; ?> "
         style="<?php if (Utils::ArrayGet('maxwidth', $__tpl_data, null)) { ?>max-width:<?php echo Utils::ArrayGet('maxwidth', $__tpl_data, null); ?>;<?php } ?><?php if (Utils::ArrayGet('minwidth', $__tpl_data, null)) { ?>min-width:<?php echo Utils::ArrayGet('minwidth', $__tpl_data, null); ?>;<?php } ?><?php if (Utils::ArrayGet('maxheight', $__tpl_data, null)) { ?>max-height:<?php echo Utils::ArrayGet('maxheight', $__tpl_data, null); ?>;<?php } ?><?php if (Utils::ArrayGet('minheight', $__tpl_data, null)) { ?>min-height:<?php echo Utils::ArrayGet('minheight', $__tpl_data, null); ?>;<?php } ?><?php if (Utils::ArrayGet('height', $__tpl_data, null)) { ?>height:<?php echo Utils::ArrayGet('height', $__tpl_data, null); ?>;<?php } ?>"
    >
        <div class="modal-content <?php if (Utils::ArrayGet('h100', $__tpl_data, null)) { ?>h-100<?php } ?>">
            <?php if (Utils::ArrayGet('title', $__tpl_data, null)) { ?>
            <div class="modal-header">
                <h5 class="modal-title" id="<?php echo Utils::ArrayGet('id', $__tpl_data, null); ?>Label"><?php echo Utils::ArrayGet('title', $__tpl_data, null); ?></h5>
                <?php if (Utils::ArrayGet('closeBtn', $__tpl_data, null)) { ?><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button><?php } ?>
            </div>
            <?php } ?>
            <?php } ?><?php if (Utils::ArrayGet('__component_part', $__tpl_data, null) == "end") { ?>
        </div>
    </div>
</div><?php } ?><?php
} // tpl_ada1f4cc1210dc390bcadeb694e3c855
