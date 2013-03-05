<?php 
class Login_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function login_usuario ($usuario,$password)
    {
        $this->load->library('session');
        $data["res"]=false;
        if(strlen($usuario)>4 && strlen($password)>4)
        {
            $this->load->database();
            $consulta=  "SELECT
                            login_usuario_id,
                            login_usuario_nombre,
                            login_usuario_status 
                        FROM `sv_login_usuario`
                        WHERE 
                        `login_usuario_usuario`=\"$usuario\" COLLATE utf8_bin
                        AND 
                        `login_usuario_password`=sha1($password)";
            $query=$this->db->query($consulta);
            $data["q"]=$consulta;
            if ($query->num_rows > 0)
            {
                $row = $query->row();
                if($row->login_usuario_status == 1)
                {
                    $sesion=array(
                        "sesion_usuario_activa"      =>true,
                        "sesion_usuario_id"          =>$row->login_usuario_id,
                        "sesion_usuario_nombre"      =>$row->login_usuario_nombre
                        );
                    $this->session->set_userdata($sesion);
                    $data["res"]=true;
                    $data["js"][]="window.location.href=CI_ROOT+'panel'";
                }
                else
                {
                    $data["js"][]="_.msgl('<div class=\"alert alert-error\">Su usuario ha sido suspendido.</div>','resp_login');";
                }
            }
            else
            {
                $data["js"][]="_.msgl('<div class=\"alert alert-error\">El usuario y contraseña no son válidos.</div>','resp_login');";
            }
        }
        else
        {
            $data["js"][]="_.msgl('<div class=\"alert alert-error\">El usuario y contraseña no son válidos.</div>','resp_login');";
        }
        return $data;
    }

    function estalogueado()
    {
        $this->load->library('session');
        if($this->session->userdata("sesion_usuario_activa")==true)
            return true;
        return false;
    }
    
}
