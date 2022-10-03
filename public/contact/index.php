<?php
class Contact_Index_View extends FacadePage {

    public function SendForm(Facade $facade, $data)
    {
        // подключиться к базе данных и сохранить запись
//        echo $_REQUEST['name'];
//        print_R($_REQUEST);
        $_REQUEST['action'] = null;
        return parent::Render($facade, $data);
    }
}