      <!-- Seccion de inventario -->

      <div class="row-fluid panel oculto" id="p_inventario">

        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <li class="nav-header submenu_titulo">Inventario</li>
              <li class="active"><a href="javascript:view_s('sp_productos')"><i class="icon-shopping-cart"></i>Productos</a></li>
              <li><a href="javascript:view_s('sp_proveedores')"><i class="icon-user"></i>Proveedores</a></li>
            </ul>
          </div>
        </div>

        <div class="span9 subpanel" id="sp_productos">
          <div class="hero-unit separado">
            <div class="row-fluid">
              <div class="span12">
                <h2>Productos</h2>
                <p>Seccion destinada a la alta y baja de productos.</p>
                <p><a class="btn" href="#">View details &raquo;</a></p>
              </div>
            </div>
          </div>
        </div>

        <div class="oculto span9 subpanel" id="sp_proveedores">
          <div class="hero-unit separado">
            <div class="row-fluid">
              <div class="span12">
                <p>

                  <div class="tabbable">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#tab1" data-toggle="tab">Buscar proveedor existente</a></li>
                      <li><a href="#tab2" data-toggle="tab">Dar de alta un proveedor</a></li>
                    </ul>
                    <div class="tab-content">

                      <div class="tab-pane active" id="tab1">
                        <form class="form-search" action="javascript:buscar_proveedor()" id="buscar_proveedor">
                          <div class="input-append">
                            <input type="text" name="proveedor" class="span2 search-query wspan2">
                            <button type="submit" class="btn">Buscar</button>
                          </div>
                        </form>
                        <div id="line_buscar_proveedor"></div>

                      </div>

                      <div class="tab-pane" id="tab2">
                        <form class="form-search" action="javascript:crear_proveedor()" id="crear_proveedor">

                          <div class="row-fluid">
                            <div class="span6">
                              Razón social:*<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-user"></i></span>
                                <input type="text" name="prov_razonSocial" class="span2 w100">
                              </div>
                            </div>
                            <div class="span6">
                              RFC:<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-list"></i></span>
                                <input type="text" name="prov_rfc" class="span2 w100">
                              </div>
                            </div>
                          </div>

                          <div class="row-fluid">
                            <div class="span6">
                              Calle y número:*<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-list"></i></span>
                                <input type="text" name="prov_calleYNumero" class="span2 w100">
                              </div>
                            </div>
                            <div class="span6">
                              Colonia:*<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-list"></i></span>
                                <input type="text" name="prov_colonia" class="span2 w100">
                              </div>
                            </div>
                          </div>

                          <div class="row-fluid">
                            <div class="span6">
                              Ciudad, municipio o delegacion:*<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-list"></i></span>
                                <input type="text" name="prov_ciudad" class="span2 w100">
                              </div>
                            </div>
                            <div class="span6">
                              Estado:*<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-list"></i></span>
                                <input type="text" name="prov_estado" class="span2 w100">
                              </div>
                            </div>
                          </div>

                          <div class="row-fluid">
                            <div class="span6">
                              Pais:*<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-list"></i></span>
                                <input type="text" name="prov_pais" class="span2 w100">
                              </div>
                            </div>
                            <div class="span6">
                              Código Postal:<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-list"></i></span>
                                <input type="text" name="prov_cp" class="span2 w100">
                              </div>
                            </div>
                          </div>

                          <div class="row-fluid">
                            <div class="span6">
                              Persona de contacto:*<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-user"></i></span>
                                <input type="text" name="prov_personaDeContacto" class="span2 w100">
                              </div>
                            </div>
                            <div class="span6">
                              Email:<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-envelope"></i></span>
                                <input type="text" name="prov_email" class="span2 w100">
                              </div>
                            </div>
                          </div>

                          <div class="row-fluid">
                            <div class="span6">
                              Teléfono y extención:*<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-phone"></i></span>
                                <input type="text" name="prov_telefonoYExtencion" class="span2 w100">
                              </div>
                            </div>
                            <div class="span6">
                              Fax:<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-file-alt"></i></span>
                                <input type="text" name="prov_fax" class="span2 w100">
                              </div>
                            </div>
                          </div>

                          <div class="row-fluid">
                            <div class="span6">
                              Tipo de persona fiscal:*<br>
                              <div class="input-prepend w90">
                                <span class="add-on"><i class="icon-legal"></i></span>
                                <select class="span2 w100" name="prov_tipoDePersonaFiscal">
                                  <option value="1">Persona moral (Empresa)</option>
                                  <option value="2">Persona física</option>
                                </select>
                              </div>
                            </div>
                            <div class="span6">
                              Giro:*<br>
                              <div class="input-prepend input-append w90">
                                <span class="add-on"><i class="icon-building"></i></span>
                                <select class="span2 w70 sv_giros" name="prov_giro">
                                </select>
                                <a href="#modal_ingresar_a_catalogo" class="btn w20" role="button" data-toggle="modal">Nuevo giro</a>
                              </div>
                            </div>
                          </div>
                          <br>
                          <div id="line_crear_proveedor"></div>

                          <div class="row-fluid">
                            <div class="span12 centro">
                              <input type="submit" class="btn btn-primary btn-large" value="Crear proveedor">
                            </div>
                          </div>

                        </form>
                        
                        <div id="modal_crear_proveedor" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Atención</h3>
                          </div>
                          <div class="modal-body">
                            <p id="modal_crear_proveedor_container"></p>
                          </div>
                          <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                          </div>
                        </div>

                        <div id="modal_ingresar_a_catalogo" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Agregar un giro</h3>
                          </div>
                          <div class="modal-body">
                            <p id="modal_ingresar_a_catalogo_container">
                              <form class="form-search ingresar_a_catalogo" action="javascript:ingresar_a_catalogo()" id="ingresar_a_catalogo">

                                <div class="row-fluid">
                                  <div class="span12">
                                    Giro a agregar:*<br>
                                    <div class="input-prepend w90">
                                      <span class="add-on"><i class="icon-building"></i></span>
                                      <input type="text" name="valor" class="span2 w100">
                                      <input type="hidden" name="catalogo" value="sv_giros">
                                    </div>
                                  </div>
                                  <div class="span12 centro">
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="Crear giro">
                                  </div>
                                </div>

                              </form>
                            </p>
                          </div>
                          <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>

                </p>
              </div>
            </div>
          </div>
        </div>

      </div>