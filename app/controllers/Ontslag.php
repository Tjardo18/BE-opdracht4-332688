<?php

class Ontslag extends BaseController
{
    private $ontslagModel;

    public function __construct()
    {
        $this->ontslagModel = $this->model('OntslagModel');
    }

    public function index($Id = null)
    {
        $status = $this->ontslagModel->checkActive($Id)['IsActief'];

        if ($status == 1) {
            $this->ontslagModel->ontslag($Id);
            $newStatus = 'Instructeur is definitief verwijdert en<br> al zijn eerder toegewezen voertuigen zijn vrijgegeven';
        } else {
            $newStatus = 'Instructeur kan niet definitief verwijdert worden,<br>verander eerst de status van ziekte/verlof ';
        }

        $data = [
            'title' => $newStatus
        ];

        $this->view('ontslag/ontslag', $data);
    }
}
