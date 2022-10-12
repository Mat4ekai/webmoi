<?php

class Postcontact_Index_View extends FacadePage
{

    public function InsertForm(Facade $facade, $data)
    {
        $db = Utils::DB();
        $result = $db -> query("SELECT * FROM form ORDER BY id DESC LIMIT 1");
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        foreach ($rows as $row) {
            printf("%s (%s)\n", $row["Name"], $row["email"], $row["subject"], $row["message"]);
        }
    }
}