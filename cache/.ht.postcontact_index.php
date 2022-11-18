<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 18.11.2022 13:30:18
    TPL file: /postcontact_index.tpl
*/
function tpl_a68799c05871179af14a8a532fe81fed(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<main id="main">

<?php Facade::Run("components.breadcrumbs", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "Проверка данных", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

     <h2 style="margin-bottom: 25px; margin-left: 25px">На этой странице мы проверим правильность введенных данных</h2>
     <?php if(is_array(Utils::ArrayGet('rows', $__tpl_data, null))) { foreach (Utils::ArrayGet('rows', $__tpl_data, null) as $row) { ?>
     <div class="row record-row border-bottom border-top p-3 mb-2" data-id="<?php echo Utils::ArrayGet('id', $row, null); ?>">
        <div class="col-1 record-id"><strong><?php echo Utils::ArrayGet('id', $row, null); ?></strong></div>
        <div class="col-2 record-email"><?php echo Utils::ArrayGet('email', $row, null); ?></div>
        <div class="col-2 record-name"><?php echo Utils::ArrayGet('name', $row, null); ?></div>
        <div class="col-5 record-subject"><?php echo Utils::ArrayGet('subject', $row, null); ?></div>
        <div class="col-2">
            <button type="button" class="btn btn-edit w-100 btn-primary btn-sm">edit</button>
        </div>
     </div>
    <?php }} ?>

    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Изменение данных</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="contactEditForm">
                        <input type="hidden" name="action" value="SendForm">
                        <input type="hidden" id="contactEdit-id" name="id" value="">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="email" id="contactEdit-email" class="form-control">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="text" name="name" id="contactEdit-name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" name="subject" id="contactEdit-subject" class="form-control">
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
                let row = $(this).closest(".record-row");
                $("#contactEdit-email").val(row.find(".record-email").text());
                $("#contactEdit-name").val(row.find(".record-name").text());
                $("#contactEdit-subject").val(row.find(".record-subject").text());
                $("#contactEdit-id").val(row.find(".record-id").text());
                $("#exampleModal").modal("show");
            }
        );

        $("#contactEditForm").submit(function (e) {
            e.preventDefault();
            let formData = $(this).serializeArray();
            let postData = {};
            formData.forEach((item) => {
                postData[item.name] = item.value;
            });

            $.post({
                url: "/postcontact/index",
                data: postData,
                success: function(data){
                    try {
                        let res = (typeof data === 'object') ? data : JSON.parse(data);
                        if(res.result == "success") {
                            let row = $('.record-row[data-id="'+postData['id']+'"]');
                            row.find(".record-email").text(postData['email']);
                            row.find(".record-subject").text(postData['subject']);
                            row.find(".record-name").text(postData['name']);
                            $("#exampleModal").modal("hide");
                        }
                    } catch(error) {
                        alert(error.message);
                    }
                }
            })
        });
    </script>
</main>
<?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "end")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
<?php } ?><?php
} // tpl_a68799c05871179af14a8a532fe81fed
