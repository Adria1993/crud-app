<?php
               //extendemos CI_Model
class leads_model extends CI_Model{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //cargamos la base de datos
        $this->load->database();
    }
     
    public function ver(){
        //Hacemos una consulta
        $consulta=$this->db->query("SELECT * FROM leads;");
         
        //Devolvemos el resultado de la consulta
        return $consulta->result();
    }
     
    public function add($id,$nombre,$email,$telefono,$pais,$campaign,$source,$medium){
            $consulta=$this->db->query("INSERT INTO leads VALUES(NULL,'$nombre','$email','$telefono','$pais','$campaign','$source','$medium');");
            if($consulta==true){
              return true;
            }else{
                return false;
            }
    }
     
    public function mod($id,$modificar="NULL",$nombre="NULL",$email="NULL",$telefono="NULL",$pais="NULL",$campaign="NULL",$source="NULL",$medium="NULL"){
        if($modificar=="NULL"){
            $consulta=$this->db->query("SELECT * FROM leads WHERE id=$id");
            return $consulta->result();
        }else{
            $consulta=$this->db->query("
              UPDATE leads SET nombre='$nombre', email='$email', telefono='$telefono', pais='$pais', campaign='$campaign', source='$source', medium='$medium' 
              WHERE id=$id;
                  ");
          if($consulta==true){
              return true;
          }else{
              return false;
          }
        }
    }
     
    public function eliminar($id){
       $consulta=$this->db->query("DELETE FROM leads WHERE id=$id");
       if($consulta==true){
           return true;
       }else{
           return false;
       }
    }
 
 
}
?>