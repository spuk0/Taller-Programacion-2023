<?php

namespace App\Models;

use CodeIgniter\Model;

class Reservas_model extends Model
{
    protected $table = 'reservas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombreReserva', 'descripcionReserva', 'imagen', 'tipo_id', 'precio', 'precio_vta', 'stock', 'stock_min', 'eliminada', 'nroHabitacion'];


    public function getBuilderReservas()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('reservas');

        $builder->select('*');

        $builder->join('tipo_reserva', 'tipo_reserva.id = reservas.tipo_id'); //Une la tabla tipo_reserva, asignando reservas.tipo_id a tipo_reserva.id

        return $builder;
    }

    public function getReservas($id = null)
    {
        $builder = $this->getBuilderReservas();

        $builder->where('reservas.id', $id);

        $query = $builder->get();

        return $query->getRowArray();
    }

    public function updateStock($id = null, $stock_actual = null)
    {
        $builder = $this->getBuilderReservas();

        $builder->where('reservas.id', $id);

        $builder->set('reservas.stock', $stock_actual);

        $builder->update();
    }
    
}