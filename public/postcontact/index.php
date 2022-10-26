<?php

class Postcontact_Index_View extends FacadePage
{

    public function Render(Facade $facade, $data)
    {
        $rows = Utils::DB()->orderBy("id", "desc")->get("form");
        $template = $this->CreateTemplate($facade, $data);
        $template->Set("rows", $rows);
        return $template->Execute();
    }

    public function SendForm(Facade $facade, $data)
    {
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['id'])) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];

            $db = Utils::DB();
            $db->where($id = 'id')->update('form', [
                $name => 'name',
                $email => 'email',
                $subject => 'subject',
            ]);
            //$res = $db->query("UPDATE form SET name = '$name', email ='$email', subject = '$subject' WHERE id = '$id'");

        }
    }
}
