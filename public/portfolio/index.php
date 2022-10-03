<?php

class Portfolio_Index_View extends FacadePage
{
    public function Render(Facade $facade, $data)
    {
        $dir = dir(ROOT_PATH . "/assets/img/portfolio");
        $images = [];
        while ($item = $dir->read()) {
            if ($item[0] != '.') {
                $images[] = $item;
            }
        }
        $data['images'] = $images;
        return parent::Render($facade, $data);
    }
}