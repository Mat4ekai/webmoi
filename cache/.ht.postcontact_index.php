<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 26.10.2022 17:33:30
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
          <hr width="700" size="5">
          <div data-id2="<?php echo Utils::ArrayGet('email', $row, null); ?>" class="col-3 email-edit" style="margin-left: 35px"><?php echo Utils::ArrayGet('email', $row, null); ?></div>
          <div data-id3="<?php echo Utils::ArrayGet('name', $row, null); ?>" class="col name-edit"><?php echo Utils::ArrayGet('name', $row, null); ?></div>
          <div data-id4="<?php echo Utils::ArrayGet('subject', $row, null); ?>" class="col subject-edit"><?php echo Utils::ArrayGet('subject', $row, null); ?></div>
         <button data-email="<?php echo Utils::ArrayGet('email', $row, null); ?>" data-name="<?php echo Utils::ArrayGet('name', $row, null); ?>" data-subject="<?php echo Utils::ArrayGet('subject', $row, null); ?>"  type="button" class="btn btn-edit btn-primary btn-sm" style="width: 100px; height: 30px; margin-bottom: 15px; margin-right: 20px">
              edit
          </button>
          <hr width="700" size="5" >
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
                    <form method="POST" action="" value="SendForm">
                        <input type="hidden" name="action">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <div class="modal-body1"></div>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <div class="modal-body2"></div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="modal-body3"></div>
                        </div>
                        <div class="text-center"><button type="submit" style="margin-top: 50px" class="btn btn-danger">Отправить сообщение</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(".btn-edit").click(
            function() {
            var email = $(this).attr('data-email');
            var name = $(this).attr('data-name');
            var subject = $(this).attr('data-subject');

            $("#exampleModal .modal-body1").html("<input type='text' name='email' class='form-control' style='margin-top: 15px' id='" + email + "' placeholder='Поменяйте почту'>");
            $("#exampleModal .modal-body2").html("<input type='text' name='name' class='form-control' style='margin-top: 15px' id='" + name + "' placeholder='Поменяйте имя'>");
            $("#exampleModal .modal-body3").html("<input type='text' name='subject' class='form-control' style='margin-top: 15px' id='" + subject + "' placeholder='Поменяйте тему'>");
            $("#exampleModal").modal("show");
        })
    </script>
</main>

<?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "end")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
<?php } ?><?php
} // tpl_a68799c05871179af14a8a532fe81fed
