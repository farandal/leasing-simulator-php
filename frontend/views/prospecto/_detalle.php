
   <div class="row span6 ">
       <h5><u> Datos personales </u></h2>
                <ul>
                    <li><div><b>Nombre:</b></b> <?=$model->pe_nombre?></div></li>
                    <li><div><b>Apellido:</b> <?=$model->pe_apellido?></div></li>
                    <li><div><b>Rut:</b> <?=$model->pe_rut?></div></li>
                    <li><div><b>Email:</b> <?=$model->pe_email?></div></li>
                    <li><div><b>Teléfono:</b> <?=$model->pe_telefono?></div></li>
                    <li><div><b>Celular:</b>  <?=$model->pe_celular?></div></li>

                </ul>
   </div>

   <div class="row span5 ">
       <h5><u>  Datos Vehículo</u></h2>
                <ul>
                    <li><div><b>Tipo Equipo:</b> <?=$model->eq_tipo?></div></li>
                    <li><div><b>Marca:</b> <?=$model->eq_marca?></div></li>
                    <li><div><b>Modelo:</b> <?=$model->eq_modelo?></div></li>
                    <li><div><b>Año:</b> <?=$model->eq_ano?></div></li>
                    <li><div><b>Estado:</b> <?=$model->eq_estado?></div></li>
                </ul>
   </div>

   <div class="row span6 ">
       <h5><u>  Datos Empresa </u></h2>
              <ul>
                <li><div><b>Empresa:</b> <?=$model->em?></div></li>
                <li><div><b>Nombre :</b> <?=$model->em_nombre?></div></li>
                <li><div><b>Rut :</b> <?=$model->em_rut?></div></li>
              </ul>
   </div>

   <div class="row span5 ">
       <h5><u>  Datos cotización </u></h2>
       <ul>
       <li><div><b>Moneda:</b> <?=$model->co_moneda?></div></li>
                <li><div><b>Monto:</b> <?=$model->co_monto?></div></li>
                <li><div><b>Plazo:</b> <?=$model->co_plazo?></div></li>
                <li><div><b>Pie:</b> <?=$model->co_pie?></div></li>
                <li><div><b>Tipo Pie:</b> <?=$model->co_pie_tipo?></div></li>
                <li><div><b>Cantidad:</b> <?=$model->eq_qty?></div></li>
       </ul>
   </div>

