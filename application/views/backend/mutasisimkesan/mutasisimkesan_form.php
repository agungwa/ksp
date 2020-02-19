<!doctype html>
<html>
    <head>
        <title></title>
    </head>
    <body>
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2 style="margin-top:0px"><?php echo $button ?> Mutasi Simkesan </h2>
                </div>
        
        <form action="<?php echo $action; ?>" method="post">
        <div class="ibox-content col-md-12">
        <div class="col-md-8">
	    
        <div class="form-group">
        <label for="text">Rekening Simkesan </label>
                <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
                        <td>
            <div class="input-group">
            <input type="hidden" name="sik_kode[]" id="sik_kode" required />
            <input type="text" class="form-control" name="nm_sik_kode" id="nm_sik_kode" placeholder="Simkesan" value="<?php echo $nm_sik_kode; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>simkesan/lookup','sik_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>                        
            <td >
            <b class="badge badge-primary text-wrap">Jumlah </b><input type="text" name="ulang" id="ulang" readonly/></td>  
            <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
            </tr>  
                </table>
            </div>
	    <div class="form-group">
            <label for="datetime">Tanggal Mutasi <?php echo form_error('msk_tglmutasi') ?></label>
            <input type="date" class="form-control" name="msk_tglmutasi" id="todays-date" placeholder="Msk Tglmutasi" value="<?php echo $msk_tglmutasi; ?>" />
        </div>

        <div class="form-group">
            <label for="varchar">Wilayah Tujuan <?php echo form_error('msk_tujuan') ?></label>
            <div class="input-group">
            <input type="hidden" name="tujuan_id" id="tujuan_id" value="<?php echo $msk_tujuan; ?>" />
            <input type="text" class="form-control" name="nm_msk_tujuan" id="nm_tujuan_id" placeholder="Wilayah Tujuan" value="<?php echo $msk_tujuan; ?>" readonly/>
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','tujuan_id');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
        
	    <input type="hidden" name="msk_id[]" value="<?php echo $msk_id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('mutasisimkesan') ?>" class="btn btn-default">Batal</a>
	</div>
            </form>

        <script type="text/javascript">
            $(document).ready(function(){      
            var i=1;  

            $('#add').click(function(){  
                i++;  
                $('#dynamic_field').append(
                    
                    '<tr id="row'+i+'" class="dynamic-added"><input type="hidden" name="msk_id[]" /><td><div class="input-group"><input type="hidden" name="sik_kode[]" id="sik_kode'+i+'" /><input type="text" class="form-control" name="nm_sik_kode'+i+'" id="nm_sik_kode'+i+'" placeholder="simkesan" readonly required/><div class="input-group-addon"><span onclick="lookup(\'<?=base_url()?>simkesan/lookup\',\'sik_kode'+i+'\');" style="cursor: pointer;">Cari</span></div></td></tr>');  
                    var ulang = i;
                        document.getElementById('ulang').value = ulang;
                        document.getElementById('myForm');
            });

            $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
            });
            

            });  
        </script>
        </div>
        </div>
    </body>
</html>