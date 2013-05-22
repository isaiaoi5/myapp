<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            Libros
        </h1>
    </div>
</div>

<div class="span8 well">
    <div class="accordion" id="acordion2">                         
        <?php foreach ($libros as $value) { ?>
            <?php $aux = ++$num ?>
            <div class="accordion-group">
                <div class="accordion-heading">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#acordion2" href="#demo<?php echo $aux ?>">
                            <h3><?php echo $aux ?> Titulo: <?php echo $value->titulo; ?></h3>
                            <p>Signatura Topográfica : <?php echo $value->area; ?></p>
                            <p>Tipo de Archivo : <?php echo $value->tipo_archivo; ?></p>                             
                        </a>                        
                </div>                
                <div id="demo<?php echo $aux ?>" class="accordion-body collapse">
                    <div class="accordion-inner">
                        <label class="label label-info">
                            Descripción
                        </label>
                        <div class="alert alert-info">
                            <?php echo $value->descripcion; ?>
                        </div>                        
                        <label class="label label-info">
                            Autor y Editorial
                        </label>
                        <div class="alert alert-info">
                            <?php echo $value->Autor_id; ?></br>
                            <?php echo $value->Editorial_id; ?>
                        </div> 
                        <div class="alert alert-info">
                        	<p class="btn btn-info btn-mini">
                        		<?php echo anchor('subirLibro/descargar/'.$value->nombre.$value->tipo_archivo.'/'.$value->titulo.'_copiaUPDS'.$value->tipo_archivo, 'Descargar'); ?>
                            </p>
                        </div>
                        <div class="alert alert-info">
                        	<?php if ($value->tipo_archivo == '.jpg') { ?>
                        		<img src="<?php echo base_url().'files/miniaturas/'.$value->nombre.'_ciThumb'.$value->tipo_archivo; ?>">
                        	<?php } ?>   
                        	<?php if ($value->tipo_archivo == '.pdf') { ?>
                        		<iframe src="<?php echo $value->direccion; ?>" style="width:500px; height:375px;" frameborder="0"></iframe>
                        	<?php } ?>                          
                        </div>                       
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php echo $enlaces; ?>        
    </div>
</div>