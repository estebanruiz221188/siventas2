<?php 
class Catalogos_model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function cargar ()
    {
        $data["sv_giros"]=$this->cargar_especifico("sv_giros","prov_giro","span2 w70");
        $data["js"][]="$('.sv_giros').replaceWith(memory.sv_giros.html);";
        $data["js"][]="console.log(memory)";
        return $data;
    }

    function cargar_especifico($tab,$name,$class)
    {
        $this->load->database();
        $query = $this->db->get($tab);
        $data["html"]="";
        if($query->num_rows() > 0)
        {
            $data["html"].='<select name="'.$name.'" class="'.$class.' '.$tab.'">';
            foreach($query->result_array() as $row)
            {
                $k=array_keys($row);
                $data["html"].="<option value='".$row[$k[0]]."'>".$row[$k[1]]."</option>";
            }
            $data["html"].='</select>';
        }
        else
        {
            $data["html"].='<select name="'.$name.'" class="'.$class.' '.$tab.'" disabled><option value="">No hay giros en el sistema</option></select>';
        }
        return $data;
    }

    function add_catalog($catalogo,$valor)
    {
        $this->load->database();
        $query=$this->db->query("SHOW COLUMNS FROM ".$catalogo);
        if($query->num_rows() > 0)
        {
            $k=array();
            $i=0;
            foreach($query->result() as $row)
            {
                $k[$i]=$row->Field;
                $i++;
            }
        }
        $val[$k[1]]=$valor;
        $this->db->insert($catalogo,$val);
        $data["js"][]="$('.modal').modal('hide'); carga_de_catalogos();";
        $data["js"][]="$('.ingresar_a_catalogo').each(function(){this.reset();});";
        return $data;
    }
    
}
