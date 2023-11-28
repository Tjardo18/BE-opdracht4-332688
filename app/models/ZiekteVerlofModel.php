<?php

class ZiekteVerlofModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }


    public function wijzigen($InstructeurId)
    {
        $sql = "UPDATE Instructeur
            SET IsActief = CASE WHEN IsActief = 1 THEN 0 ELSE 1 END
            WHERE Id = $InstructeurId;";

        $this->db->query($sql);
        return $this->db->execute();
    }

    public function voertuig($InstructeurId)
    {
        $sql = "UPDATE VoertuigInstructeur
        SET IsActief = CASE WHEN IsActief = 1 THEN 0 ELSE 1 END
        WHERE InstructeurId = $InstructeurId;";

        $this->db->query($sql);
        return $this->db->execute();
    }

    public function checkInstucteur($InstructeurId)
    {
        $sql = "SELECT IsActief FROM Instructeur WHERE Id = $InstructeurId;";

        $this->db->query($sql);
        return $this->db->resultSetAssoc();
    }
}
