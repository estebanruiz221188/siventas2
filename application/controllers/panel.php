<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	
	function index()
	{
		$this->load->model("login_model");
		if($this->login_model->estalogueado())
		{
			$this->load->library('session');
			$menu["nombre_usuario"]=$this->session->userdata("sesion_usuario_nombre");;
			$data["url"]=base_url();
			$data["menu"]=$this->load->view("menu_panel",$menu,true);
			$data["contenido"]=$this->load->view("panel",$menu,true);
			$this->load->view("html_panel",$data);
		}
		else
		{
			echo "<script>window.location.href='".base_url()."'</script>";
		}
	}

	function buscar_proveedor()
	{
		$this->load->model("login_model");
		if($this->login_model->estalogueado())
		{
			$this->load->model("proveedor_model");
			$data=$this->proveedor_model->buscar($_POST["proveedor"]);
		}
		else
		{
			$data["js"][]="unlog(); window.location.href=CI_ROOT;";
		}
		echo json_encode($data);
	}

	function crear_proveedor()
	{
		$this->load->model("login_model");
		if($this->login_model->estalogueado())
		{
			$this->load->model("proveedor_model");
			$data=$this->proveedor_model->crear($_POST);
		}
		else
		{
			$data["js"][]="unlog(); window.location.href=CI_ROOT;";
		}
		echo json_encode($data);
	}

	function ver_proveedor()
	{
		$this->load->model("login_model");
		if($this->login_model->estalogueado())
		{
			$this->load->model("proveedor_model");
			$data=$this->proveedor_model->ver($_POST["id"]);
		}
		else
		{
			$data["js"][]="unlog(); window.location.href=CI_ROOT;";
		}
		echo json_encode($data);
	}

	function eliminar_proveedor()
	{
		$this->load->model("login_model");
		if($this->login_model->estalogueado())
		{
			$this->load->model("proveedor_model");
			$data=$this->proveedor_model->eliminar($_POST["id"]);
		}
		else
		{
			$data["js"][]="unlog(); window.location.href=CI_ROOT;";
		}
		echo json_encode($data);
	}

	function carga_catalogos()
	{
		$this->load->model("login_model");
		if($this->login_model->estalogueado())
		{
			$this->load->model("catalogos_model");
			$data=$this->catalogos_model->cargar();
		}
		else
		{
			$data["js"][]="unlog(); window.location.href=CI_ROOT;";
		}
		echo json_encode($data);
	}

	function ingresar_a_catalogo()
	{
		$this->load->model("login_model");
		if($this->login_model->estalogueado())
		{
			$this->load->model("catalogos_model");
			$data=$this->catalogos_model->add_catalog($_POST["catalogo"],$_POST["valor"]);
		}
		else
		{
			$data["js"][]="unlog(); window.location.href=CI_ROOT;";
		}
		echo json_encode($data);
	}

}