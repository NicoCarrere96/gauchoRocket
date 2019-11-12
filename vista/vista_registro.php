<br>
<div class="page-header w3-text-white" style="background-image: url('public/img/fondo4.jpg'); background-size: cover ">
    <h1 class="text-center" style="padding-top: 10px;">Registrese en Gaucho Rocket<img src="public/img/rocket.png" height="50px"></h1>
</div>

<div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">   
          <div class="card">
            <div class="loginBox">
              
              <form action="/gauchoRocket/registro" method="post">
                <div class="form-group">                  
                  <input type="text" class="form-control input-lg" name="nombre" placeholder="Nombre" required>        
                </div>              
                 <div class="form-group">                  
                  <input type="text" class="form-control input-lg" name="apellido" placeholder="Apellido" required>        
                </div>
                  <div class="form-group">
                      <input type="text" class="form-control input-lg" name="dni" placeholder="DNI" required>
                  </div>
                  <div class="form-group">
                      <input type="date" class="form-control input-lg" name="fecha_nac" placeholder="Fecha de Nacimiento" required>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control input-lg" name="direccion" placeholder="Direccion" required>
                  </div>
                  <div class="form-group">
                  <input type="email" class="form-control input-lg" name="email" placeholder="Email" required>        
                </div>
                  <div class="form-group">
                      <input type="text" class="form-control input-lg" name="nick" placeholder="Nombre de Usuario" required>
                  </div>
                  <div class="form-group">
                  <input type="password" class="form-control input-lg" name="password" placeholder="Contrase&ntilde;a" required>       
                </div>
                <div class="form-group">        
                  <input type="password" class="form-control input-lg" name="rpt-password" placeholder="Repetir Contrase&ntilde;a" required>       
                </div>                      
                  <button type="submit" name="btn-registro" class="btn btn-block w3-deep-orange">Registrarse</button>
              </form>
                </div>
              </div>
                          
            </div>
          </div>
        </div>
