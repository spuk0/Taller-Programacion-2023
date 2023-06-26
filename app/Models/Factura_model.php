<?php
namespace App\Models;
use CodeIgniter\Model;

class Factura_model extends Model{
    protected $table = 'factura';
    protected $primaryKey = 'id';
    protected $allowedFields = ['fecha_reserva','fecha_salida','usuario_id','total_venta'];

    public function getFactura($id = null){
        $db = \Config\Database::connect();
        $builder = $db->table('factura');
        $builder->select('*');
        $builder->join('usuarios','usuarios.id = factura.usuario_id');
        $builder->where('factura.id', $id);

        $query = $builder->get();

        return $query->getResultArray();
    }
}