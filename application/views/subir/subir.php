<link href="<?php echo base_url(); ?>uploadify/uploadify.css" media="screen" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>uploadify/jquery.uploadify.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    var texto = '';
	$("#fileUpload1").uploadify({
        'uploader'    : '<?php echo base_url();?>uploadify/uploadify.swf',
        'cancelImg'   : '<?php echo base_url();?>uploadify/cancel.png',
	'script'      : '<?php echo $rutaAbsolutaSubir;?>',
        'folder'      : '<?php echo base_url();?>uploads',
	'multi'       : true,
        'auto'        : true,
	'buttonText'  : 'Buscar',
	'displayData' : 'speed',
	'simUploadLimit': 2
	});
});
</script>

<div class="span8 well">
    <div class="alert alert-info">
        <a class="close" data-dismiss="alert">&times;</a>
        <h1>
            Libros
        </h1>
    </div>
</div>
<div class="span8 well">
    <div id="fileUpload1">tu tienes un problema con java scritp</div>
</div>