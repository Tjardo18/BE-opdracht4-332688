<?php

class ZiekteVerlof extends BaseController
{
    private $ziekteVerlofModel;

    public function __construct()
    {
        $this->ziekteVerlofModel = $this->model('ZiekteVerlofModel');
    }

    public function index($instructeurId)
    {
        $this->ziekteVerlofModel->wijzigen($instructeurId);
        $this->ziekteVerlofModel->voertuig($instructeurId);
        $status = $this->ziekteVerlofModel->checkInstucteur($instructeurId)['IsActief'];

        header("refresh:3;url=../../instructeur");

        if ($status == 1) {
            $newStatus = 'Instructeur is beter/terug van verlof gemeld';
        } else {
            $newStatus = 'Instructeur is ziek/met verlof gemeld';
        }

        $data = [
            'title' => $newStatus
        ];

        $this->view('ziekteverlof/ziekteverlof', $data);
    }
}
