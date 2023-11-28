<?php

class AlleVoertuigenModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getVoertuigen()
    {
        $sql = "SELECT V.Id AS VoertuigID,
                       TV.TypeVoertuig,
                       V.Type,
                       V.Kenteken,
                       V.Bouwjaar,
                       V.Brandstof,
                       TV.Rijbewijscategorie,
                       CONCAT_WS(
                            ' ',
                            I.Tussenvoegsel,
                            I.Achternaam
                        ) AS InstructeurNaam,
                        I.Id AS InstructeurID
                FROM Voertuig V
                JOIN TypeVoertuig TV ON V.TypeVoertuigId = TV.Id
                LEFT JOIN VoertuigInstructeur VI ON V.Id = VI.VoertuigId
                LEFT JOIN Instructeur I ON VI.InstructeurId = I.Id
                WHERE VI.InstructeurId IS NOT NULL || VI.InstructeurId IS NULL
                ORDER BY V.Bouwjaar DESC, I.Achternaam ASC;";

        $this->db->query($sql);

        return $this->db->resultSet();
    }
}
