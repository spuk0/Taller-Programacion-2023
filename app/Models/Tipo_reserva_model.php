<?php

namespace App\Models;

use CodeIgniter\Model;

class Tipo_reserva_model extends Model
{
    protected $table = 'tipo_reserva';
    protected $primaryKey = 'id';
    protected $allowedFields = ['descripcion','activo'];

    public function getTipoReserva(){
        return $this->findAll();
    }
}