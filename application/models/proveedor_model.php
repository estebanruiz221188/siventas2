<?php 
class Proveedor_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function buscar ($busqueda)
    {
        $this->load->database();
        $this->db->like('prov_razonSocial', $busqueda);
        $this->db->or_like('prov_personaDeContacto', $busqueda);
        $query=$this->db->get('sv_proveedores');
        $data["html"]="";
        if($query->num_rows() > 0)
        {
            $data["html"].='<table class="table table-striped table-bordered">
                              <thead>
                                <tr>
                                  <th>ID</th>
                                  <th>Razon social</th>
                                  <th>Persona de contacto</th>
                                  <th>Herramientas</th>
                                </tr>
                              </thead>
                              <tbody>';
            foreach($query->result() as $row)
            {
               $data["html"].=" <tr id='prov_tr_$row->prov_id'>
                                  <td>$row->prov_id</td>
                                  <td>$row->prov_razonSocial</td>
                                  <td>$row->prov_personaDeContacto</td>
                                  <td>
                                    <button class='btn' onclick='ver_proveedor($row->prov_id)'><i class='icon-eye-open'></i> Ver</button>
                                    <button class='btn'><i class='icon-edit'></i> Editar</button>
                                    <button class='btn btn-danger' onclick='eliminar_proveedor($row->prov_id)'><i class='icon-trash'></i> Eliminar</button>
                                  </td>
                                </tr>";
            }
            $data["html"].='</tbody></table>';
        }
        else
        {
            $data["html"].='Sin resultados para esta busqueda.';
        }
        $data["js"][]="$('#line_buscar_proveedor').html(memory.html);";
        return $data;
    }

    function crear($data)
    {
        $error=0;
        $msg="";
        if($data["prov_razonSocial"]=="")       {$error=1; $msg.="- Verificar la razón social.<br>";}
        if($data["prov_calleYNumero"]=="")      {$error=1; $msg.="- Verificar la calle y número.<br>";}
        if($data["prov_colonia"]=="")           {$error=1; $msg.="- Verificar la colinia.<br>";}
        if($data["prov_ciudad"]=="")            {$error=1; $msg.="- Verificar la ciudad.<br>";}
        if($data["prov_estado"]=="")            {$error=1; $msg.="- Verificar el estado.<br>";}
        if($data["prov_pais"]=="")              {$error=1; $msg.="- Verificar el pais.<br>";}
        if($data["prov_personaDeContacto"]=="") {$error=1; $msg.="- Verificar la persona de contacto.<br>";}
        if($data["prov_telefonoYExtencion"]==""){$error=1; $msg.="- Verificar el teléfono.<br>";}
        if($data["prov_giro"]==""){$error=1; $msg.="- Verificar el giro de la empresa.<br>";}

        if($error==1)
        {
            $data["msg"]=$msg;
            $data["js"][]="$('#modal_crear_proveedor_container').html(memory.msg); $('#modal_crear_proveedor').modal();";
        }
        else
        {
            $proveedor=array(
                    'prov_giro'                 =>$data["prov_giro"],
                    'prov_razonSocial'          =>$data["prov_razonSocial"],
                    'prov_rfc'                  =>$data["prov_rfc"],
                    'prov_calleYNumero'         =>$data["prov_calleYNumero"],
                    'prov_colonia'              =>$data["prov_colonia"],
                    'prov_ciudad'               =>$data["prov_ciudad"],
                    'prov_estado'               =>$data["prov_estado"],
                    'prov_pais'                 =>$data["prov_pais"],
                    'prov_cp'                   =>$data["prov_cp"],
                    'prov_email'                =>$data["prov_email"],
                    'prov_telefonoYExtencion'   =>$data["prov_telefonoYExtencion"],
                    'prov_fax'                  =>$data["prov_fax"],
                    'prov_fechaDeAlta'          =>date("Y-m-d H:i:s"),
                    'prov_personaDeContacto'    =>$data["prov_personaDeContacto"],
                    'prov_tipoDePersonaFiscal'  =>$data["prov_tipoDePersonaFiscal"],
                    'prov_status'               =>1
                );
            $this->load->database();
            $this->db->insert("sv_proveedores",$proveedor);
            $data["js"][]="_.msgl('<div class=\'alert alert-success\'>Proveedor creado correctamente.</div>','line_crear_proveedor');";
            $data["js"][]="_.reset('crear_proveedor');";

        }
        return $data;
    }

    function eliminar($id)
    {
        $this->load->database();
        $this->db->delete('sv_proveedores', array('prov_id' => $id));
        $data["js"][]="$('#prov_tr_".$id."').remove();";
        return $data;
    }

    function ver($id)
    {
        $this->load->database();
        $query=$this->db->get_where('sv_proveedores', array('prov_id' => $id));
        $query=$query->row_array();
        $data["html"]=$this->load->view("subpaneles/ver_proveedor",$query,true);
        $data["js"][]="$('#line_buscar_proveedor').html(memory.html);";
        return $data;
    }
    
}
