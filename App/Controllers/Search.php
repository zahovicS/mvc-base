<?php

use Peru\Jne\DniFactory;
use Peru\Sunat\RucFactory;

class Search extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function dni($dni)
    {
        $factory = new DniFactory();
        $cs = $factory->create();
        $person = $cs->get($dni[0]);
        if (!$person) {
            echo json_encode('not found');
            return;
        }
        echo json_encode($person);
        return;
    }
    public function ruc($ruc)
    {
        $factory = new RucFactory();
        $cs = $factory->create();
        $company = $cs->get($ruc[0]);
        if (!$company) {
            echo json_encode('not found');
            return;
        }
        echo json_encode($company);
        return;
    }
}