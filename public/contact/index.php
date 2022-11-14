<?php

class Contact_Index_View extends FacadePage
{

    public function SendForm(Facade $facade, $data)
    {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            $db_table = "form";

            //try {

                /*
                                $db = Utils::DB();
                                $db->insert("my_table", [
                                    'field1' => "dsdsdsd",
                                    'field2' => "dsdsdsd fdffd",
                                ]);

                                $res = $db->query("SELECT * FROM ... WHERE ...");
                                $res = $db->query("UPDATE .... SET field1 = 'dssdsd' WHERE ...");

                                $db->where("field1", "2121")->update("table_name", [
                                    'field1' => "dsdsdsd",
                                    'field2' => "dsdsdsd fdffd",
                                ]);

                                $db->where("field1", "2121")->delete("table_name");

                                $res = $db->where("field1", "2121")->get("table_name");
                */
                   Utils::DB()->insert($db_table, [
                    'name'    => $name,
                    'email'   => $email,
                    'subject' => $subject,
                    'message' => $message
                ]);
            //$_REQUEST['action'] = null;
            //return parent::Render($facade, $data);
            $next = '/postcontact/index';
            header('Location: '.$next);


        }
    }
}