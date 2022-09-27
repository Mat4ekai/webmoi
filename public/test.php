<?php

class Test_view extends FacadePage
{
    function Render(Facade $facade, $data)
    {
        $buttons = [];
        for($i = 1; $i <= 10; $i++) {
            $buttons[] = "Button ".$i;
        }
        return $this->CreateTemplate($facade, $data)
            ->Set("param2", "Test param")
            ->Set("buttons", $buttons)
            ->Execute();
    }
}