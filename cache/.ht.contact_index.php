<?php
/*
    SB-Template simple compiled template.
    This script is generated, do not modify.
    Compiled: 03.10.2022 13:39:51
    TPL file: /contact_index.tpl
*/
function tpl_18733e56cd3c7f44917d139cee9861ca(Template $__tpl, &$__tpl_data){
?>
<?php if (empty(Utils::ArrayGet('__component_part', $__tpl_data, null)) || Utils::ArrayGet('__component_part', $__tpl_data, null) == "begin") { ?><?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<main id="main">

<?php Facade::Run("components.breadcrumbs", array_merge($__tpl_data, array("__component_part" => "begin"), array("text1" => "Контакты", "text2" => "Главная", "text3" => "Контакты", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>

<section id="contact" class="contact">
    <div class="container">
        <div>
            <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2222.773429949853!2d40.40664831622129!3d56.143730980659726!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x414c7bc1b4854967%3A0xb08d37c56ed08745!2z0YPQuy4g0JzQuNGA0LAsIDM1LCDQktC70LDQtNC40LzQuNGALCDQktC70LDQtNC40LzQuNGA0YHQutCw0Y8g0L7QsdC7LiwgNjAwMDA5!5e0!3m2!1sru!2sru!4v1659891050881!5m2!1sru!2sru" allowfullscreen></iframe>
        </div>
        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="info">
                    <?php Facade::Run("contact.contactinfo", array_merge($__tpl_data, array("__component_part" => "begin"), array("class" => "address", "icon" => "-geo-alt", "text1" => "Адрес:", "text2" => "Улица Мира, 35. Владимир, Россия", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
                    <?php Facade::Run("contact.contactinfo", array_merge($__tpl_data, array("__component_part" => "begin"), array("class" => "email", "icon" => "-envelope", "text1" => "Почта:", "text2" => "vladprompred@mail.ru", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
                    <?php Facade::Run("contact.contactinfo", array_merge($__tpl_data, array("__component_part" => "begin"), array("class" => "phone", "icon" => "-phone", "text1" => "Номер:", "text2" => "+7(975)638-48-52", "__component_part" => "begin")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?>
                </div>
            </div>
            <div class="col-lg-8 mt-5 mt-lg-0">
                <form action="/forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Ваше имя" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Ваша почта" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Тема" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Сообщение" required></textarea>
                    </div>
                    <div class="upload-file__wrapper">
                        <input
                                type="file"
                                name="files[]"
                                id="upload-file__input_1"
                                class="upload-file__input"
                                accept=".jpg, .jpeg, .png, .gif, .bmp, .doc, .docx, .xls, .xlsx, .txt, .tar, .zip, .7z, .7zip"
                                multiple
                        >
                        <label class="upload-file__label" for="upload-file__input_1">
                            <svg class="upload-file__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M286 384h-80c-14.2 1-23-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c11.6 11.6 3.7 33.1-13.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-23-23V366c0-13.3 10.7-24 24-24h136v8c0 31 24.3 56 56 56h80c30.9 0 55-26.1 57-55v-8h135c13.3 0 24 10.6 24 24zm-124 88c0-11-9-20-19-20s-19 9-20 20 9 19 20 20 21-9 20-20zm64 0c0-12-9-20-20-20s-20 9-19 20 9 20 20 20 21-9 20-20z"></path>
                            </svg>
                            <span class="upload-file__text">Прикрепить файл</span>
                        </label>
                    </div>
                    <div class="my-3">
                        <div class="loading">Отправление</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Ваше сообщение было отправлено. Спасибо!</div>
                    </div>
                    <div class="text-center"><button type="submit">Отправить сообщение</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

</main>

<?php Facade::Run("common.page.document", array_merge($__tpl_data, array("__component_part" => "begin"), array("__component_part" => "end")), $__tpl->getFacade()->getPath(), $__tpl->getFacade()->getUrl()); ?><?php } ?><?php
} // tpl_18733e56cd3c7f44917d139cee9861ca
