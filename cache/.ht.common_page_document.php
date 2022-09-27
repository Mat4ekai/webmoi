<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 20.09.2022 16:26:56
    TPL file: /common_page_document.tpl
*/
function tpl_e6816b7d29efc66af10da63a013e72d7(Template $__tpl, &$__tpl_data){
?>
<?php if (Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo Utils::ArrayGet('head.title', $__tpl_data, null); ?></title>
    <meta content="<?php echo Utils::ArrayGet('head.description', $__tpl_data, null); ?>" name="description">
    <meta content="<?php echo Utils::ArrayGet('head.keywords', $__tpl_data, null); ?>" name="keywords">

    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/main.css?<?php echo filemtime(ROOT_PATH."/assets/css/main.css");?>" rel="stylesheet">
    <script src="/assets/vendor/jquery/jquery-3.6.0.min.js?<?php echo filemtime(ROOT_PATH."/assets/vendor/jquery/jquery-3.6.0.min.js");?>"></script>
</head>

<body>
    <div class="container">
    <?php } ?><?php if (Utils::ArrayGet('__component_part', $__tpl_data, null) == "end") { ?>
    </div>
    <?php Facade::Run("common.modal.dialog", array_merge($__tpl_data, array("__component_part" => "begin"), array("id" => "ErrorDialog", "centered" => "true", "title" => "Ошибка", "maxwidth" => "400px", "closeBtn" => "true", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
        <div id="ErrorDialogContent" class="modal-body text-danger">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        </div>
    <?php Facade::Run("common.modal.dialog", array_merge($__tpl_data, array("__component_part" => "begin"), array("id" => "ErrorDialog", "centered" => "true", "title" => "Ошибка", "maxwidth" => "400px", "closeBtn" => "true", "__component_part" => "end")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

    <?php Facade::Run("common.modal.dialog", array_merge($__tpl_data, array("__component_part" => "begin"), array("id" => "InfoDialog", "centered" => "true", "title" => "Информация", "maxwidth" => "400px", "closeBtn" => "true", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
        <div id="InfoDialogContent" class="modal-body">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
        </div>
    <?php Facade::Run("common.modal.dialog", array_merge($__tpl_data, array("__component_part" => "begin"), array("id" => "InfoDialog", "centered" => "true", "title" => "Информация", "maxwidth" => "400px", "closeBtn" => "true", "__component_part" => "end")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<script>
    function ShowErrorDialog(text) {
        $("#ErrorDialogContent").html(text);
        $("#ErrorDialog").modal("show");
    }

    function ShowInfoDialog(text) {
        $("#InfoDialogContent").html(text);
        $("#InfoDialog").modal("show");
    }
</script>

<!-- Vendor JS Files -->
<script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Template Main JS File -->
<script src="/assets/js/main.js?<?php echo filemtime(ROOT_PATH."/assets/js/main.js");?>"></script>
</body>
</html><?php } ?><?php
} // tpl_e6816b7d29efc66af10da63a013e72d7
