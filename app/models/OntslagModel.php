<?php

class OntslagModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function checkActive($InstructeurId)
    {
        $sql = "SELECT IsActief FROM Instructeur WHERE Id = $InstructeurId;";

        $this->db->query($sql);

        header("refresh:3;../../instructeur");

        return $this->db->resultSetAssoc();
    }


    public function ontslag($InstructeurId)
    {
        $sql = "DELETE FROM VoertuigInstructeur WHERE InstructeurId = $InstructeurId;
                DELETE FROM Instructeur WHERE Id = $InstructeurId;";


        $this->db->query($sql);

        header("refresh:3;../../instructeur");

        return $this->db->execute();
    }
}
