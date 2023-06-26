<?php
namespace App\Models;
use CodeIgniter\Model;

class Ventas_detalle_model extends Model{
    protected $table = 'ventas_detalle';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','venta_id','reserva_id','precio','cantidad'];

    public function getDetalles($id = null, $id_usuario = null){
        $db = \Config\Database::connect();
        $builder = $db->table('ventas_detalle');
        $builder->select('*');
        $builder->join('factura','factura.id = ventas_detalle.venta_id');
        $builder->join('reservas','reservas.id = ventas_detalle.producto_id');
        $builder->join('usuarios','usuarios.id = factura.usuario_id');
        if($id != null){
            $builder->where('factura.id', $id);
        }

        $query = $builder->get();
        return $query->getResultArray();
    }
}