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

}
