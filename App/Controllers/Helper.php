<?php

use Luecano\NumeroALetras\NumeroALetras;

class Helper extends Controller
{
    public function __construct()
    {
        $this->verifyAuthUser();
        parent::__construct();
        $this->formatter = new NumeroALetras();
    }
    public function NumeroALetras($price, string $divisa): string
    {
        return $this->formatter->toInvoice($price, 3, $divisa);
    }
}