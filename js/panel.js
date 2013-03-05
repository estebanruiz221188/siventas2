function view(panel)
{
	$(".panel").addClass('oculto');
	$("#"+panel).removeClass('oculto');
}

function view_s(panel)
{
	$("#"+panel).parent().find(".subpanel").addClass('oculto');
	$("#"+panel).show().removeClass('oculto');
}

function buscar_proveedor()
{
	url=CI_ROOT+"panel/buscar_proveedor";
	data=_.gf("buscar_proveedor");
	_.pj(url,data,"response");
}

function crear_proveedor()
{
	url=CI_ROOT+"panel/crear_proveedor";
	data=_.gf("crear_proveedor");
	_.pj(url,data,"response");
}

function ver_proveedor(p)
{
	url=CI_ROOT+"panel/ver_proveedor";
	data={"id":p};
	_.pj(url,data,"response");
}

function eliminar_proveedor(p)
{
	if(confirm('Está seguro de eliminar a este proveedor ?'))
	url=CI_ROOT+"panel/eliminar_proveedor";
	data={"id":p};
	_.pj(url,data,"response");
}

function ingresar_a_catalogo()
{
	url=CI_ROOT+"panel/ingresar_a_catalogo";
	data=_.gf("ingresar_a_catalogo");
	_.pj(url,data,"response");
}

function carga_de_catalogos()
{
	url=CI_ROOT+"panel/carga_catalogos";
	_.pj(url,{},"response");
}

$(document).ready(function() {
	
	// Funciones para los botones del submenu.
	$(".well li:not(.nav-header)").click(function(event){$(this).parent().find('li').removeClass('active'); $(this).addClass('active')});

	// Carga de catálogos dinámicos.
	carga_de_catalogos();

});
