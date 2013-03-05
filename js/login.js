function login()
{
	url=CI_ROOT+"login/login_usuario";
	data=_.gf("login");
	_.pj(url,data,"response");
}

function unlog()
{
	url=CI_ROOT+"login/unlog";
	_.pj(url,{},"response");
}