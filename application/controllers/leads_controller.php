<?php
                        //extendemos CI_Controller
class leads_controller extends CI_Controller{
    public function __construct() {
        //llamamos al constructor de la clase padre
        parent::__construct();
         
        //llamo al helper url
        $this->load->helper("url"); 
         
        //llamo o incluyo el modelo
        $this->load->model("leads_model");
         
        //cargo la libreria de sesiones
        $this->load->library("session");
    }
     
    //controlador por defecto
    public function index(){
         
        //array asociativo con la llamada al metodo
        //del modelo
        $leads["ver"]=$this->leads_model->ver();
         
        //cargo la vista y le paso los datos
        $this->load->view("leads_view",$leads);
    }
     
    //controlador para añadir
    public function add(){
         
        //compruebo si se a enviado submit
        if($this->input->post("submit")){
         
        //llamo al metodo add
        $add=$this->leads_model->add(
                $this->input->post("id"),
                $this->input->post("nombre"),
                $this->input->post("email"),
                $this->input->post("telefono"),
                $this->input->post("pais"),
                $this->input->post("campaign"),
                $this->input->post("source"),
                $this->input->post("medium")
                );
        }
        if($add==true){
            //Sesion de una sola ejecución
            $this->session->set_flashdata('correcto', 'Lead añadido correctamente');
        }else{
            $this->session->set_flashdata('incorrecto', 'Lead añadido correctamente');
        }
         
        //redirecciono la pagina a la url por defecto
        redirect(base_url("leads_controller"));

    }
     
    //controlador para modificar al que
    //le paso por la url un parametro
    public function mod($id){
        if(is_numeric($id)){
          $datos["mod"]=$this->leads_model->mod($id);
          $this->load->view("modificar_view",$datos);
          if($this->input->post("submit")){
                $mod=$this->leads_model->mod(
                        $id,
                        "MOD",
                        $this->input->post("nombre"),
                        $this->input->post("email"),
                        $this->input->post("telefono"),
                        $this->input->post("pais"),
                        $this->input->post("campaign"),
                        $this->input->post("source"),
                        $this->input->post("medium")
                        );
                if($mod==true){
                    $this->session->set_flashdata('correcto', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                   Lead modificado correctamente
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                }else{
                    $this->session->set_flashdata('incorrecto', '<div class="alert alert-warn alert-dismissible fade show" role="alert">
                    Lead modificado incorrectamente
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>');
                }
                redirect(base_url("leads_controller"));
            }
        }else{
            redirect(base_url("leads_controller"));
        }
    }
     
    //Controlador para eliminar
    public function eliminar($id){
        if(is_numeric($id)){
          $eliminar=$this->leads_model->eliminar($id);
          if($eliminar==true){
              $this->session->set_flashdata('correcto', '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Lead eliminado correctamente
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>');
          }else{
              $this->session->set_flashdata('incorrecto', '<div class="alert alert-warn alert-dismissible fade show" role="alert">
              Lead eliminado incorrectamente
               <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
             </div>');
          }
          redirect(base_url("leads_controller"));
        }else{
            redirect(base_url("leads_controller"));
        }
    }
}
?>