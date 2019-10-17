<div class="page-header" style="background-color: lightgrey;">
  			<h1 class="text-center" style="padding-top: 10px;">Bienvenido a Gaucho Rocket</h1>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">		
					<div class="card">
						<div class="loginBox">
							
							<form action="/GauchoRocket/login" method="post">                           	
								<div class="form-group">									
									<input type="email" class="form-control input-lg" name="email" placeholder="Email" required>        
								</div>							
								<div class="form-group">        
									<input type="password" class="form-control input-lg" name="password" placeholder="Password" required>       
								</div>								    
									<button name="btn-login" type="submit" class="btn btn-success btn-block">Login</button>
							</form>
<!--  							<p><a href="#showForm" data-toggle="collapse" aria-expanded="false" aria-controls="collapse">No recuerdas tu password?</a></p>	
							<div class="collapse" id="showForm">
								<div class='well'>
									<form action="/GauchoRocket/login" method="post">
										<div class="form-group">										
											<input type="email" class="form-control" name="email-spassword" placeholder="Ingrese email asociado con el password." required>
										</div>
										<button type="submit" name="btn-spassword"class="btn btn-dark">Recuperar Password</button>
									</form>								
								</div>
							</div> -->
													
							<hr><p>Nuevo en el sitio? <a href="/GauchoRocket/registro" title="Registrarse">Registrarse</a>.</p>								
						</div>
					</div>
				</div>
			</div>
		</div>