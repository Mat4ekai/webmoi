<?php

class Index_view extends FacadePage
{
    function Render(Facade $facade, $data)
    {
        return $this->CreateTemplate($facade, $data)
            ->Execute();
    }
}