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

    public function Sendform(Facade $facade, $data)
    {
        if (isset($_POST['edit'])) {

            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $subject = $_POST['subject'];

            $db = Utils::DB();
            $db->update(form)
            -> set([
                name => $name,
                email => $email,
                subject => $subject,
            ])
            -> where ($id = id);
        }
    }
}
