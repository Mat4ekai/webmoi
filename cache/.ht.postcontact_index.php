<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 19.10.2022 17:02:37
    TPL file: /postcontact_index.tpl
*/
function tpl_a68799c05871179af14a8a532fe81fed(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<main id="main">

<?php Facade::Run("components.breadcrumbs", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "Проверка данных", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

     <h2 style="margin-bottom: 25px; margin-left: 25px">На этой странице мы проверим правильность введенных данных</h2>
     <?php if(is_array(Utils::ArrayGet('rows', $__tpl_data, null))) { foreach (Utils::ArrayGet('rows', $__tpl_data, null) as $row) { ?>
     <div class="row">
          <hr width="1250" size="5" style="0 auto">
          <div class="col-3" style="margin-left: 35px"><?php echo Utils::ArrayGet('email', $row, null); ?></div>
          <div class="col"><?php echo Utils::ArrayGet('name', $row, null); ?></div>
          <div class="col"><?php echo Utils::ArrayGet('subject', $row, null); ?></div>
         <button data-id="<?php echo Utils::ArrayGet('id', $row, null); ?>" type="button" class="btn btn-edit btn-primary btn-sm" style="width: 100px; height: 30px; margin-bottom: 15px; margin-right: 20px">
              edit
          </button>
          <hr width="1250" size="5" >
     </div><br>
    <?php }} ?>

    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменение данных</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя" required maxlength="25">
                    </div>
                    <div>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя" required maxlength="25">
                    </div>
                    <div>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя" required maxlength="25">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-primary">Подтвердить</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".btn-edit").click((e) => {
            let id = $(e.currentTarget).attr("data-id");
            $("#exampleModal .modal-body").html("<input type='text' name='id' class='form-control' id='" + id + "' placeholder='Поменяйте id'>")
            $("#exampleModal").modal("show");
        })
    </script>
</main>

<?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "end")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
<?php } ?><?php
} // tpl_a68799c05871179af14a8a532fe81fed
