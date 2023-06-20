<?php
namespace App\Models;
use CodeIgniter\Model;

class Contacto_model extends Model
{
    protected $table = "contacto";
    protected $primaryKey = "id";
    protected $allowedFields = ["name", "email", "message"]; //Tiene que ser en orden de la tabla
}