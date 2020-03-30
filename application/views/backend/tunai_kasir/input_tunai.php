    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h2 style="margin-top:0px">Input Tunai </h2>
                </div>
        
        <form action="<?php echo base_url()?>tunai_kasir/inputtunai_action" method="post">
        <div class="ibox-content col-md-4">
	    <div class="form-group">
            <label for="float">Jumlah</label>
            <input type="text" class="form-control numeric" name="tun_jumlah" id="searchTxt" required placeholder="Jumlah"/>
        </div>
        <div class="form-group">
            <label for="varchar">Wilayah </label>
            <div class="input-group">
            <input type="hidden" name="wil_kode" id="wil_kode"  required />
            <input type="text" class="form-control" name="nm_wil_kode" id="nm_wil_kode" autocomplete="off" onkeypress="return false" placeholder="Wilayah"  required />
            <div class="input-group-addon">
                <span onclick="lookup('<?=base_url()?>wilayah/lookup','wil_kode');" style="cursor: pointer;">Cari</span>
            </div>
            </div>
        </div>
    <div class="form-group">
            <label for="tinyint">Jenis : </label>
            
            <div class="radio"><input type="radio" for="radio1" checked value="0" name="tun_jenis">
                                                        <label for="radio1">
                                                            Simpanan
                                                        </label></div>
            <div class="radio"><input type="radio" for="radio2" value="1" name="tun_jenis"> 
                                                        <label for="radio2">
                                                            Investasi
                                                        </label></div>
            <div class="radio"><input type="radio" for="radio3" value="2" name="tun_jenis"> 
                                                        <label for="radio3">
                                                            Simkesan
                                                        </label></div>
            <div class="radio"><input type="radio" for="radio4" value="3" name="tun_jenis"> 
                                                        <label for="radio4">
                                                             Pinjaman
                                                        </label></div>
        </div>
	    <div class="form-group">
            <label for="tinyint">Kantor</label>
            <div class="radio"><input type="radio" for="radio1" checked value="K" name="tun_kantor">
                                                        <label for="radio1">
                                                            Pusat
                                                        </label></div>
            <div class="radio"><input type="radio" for="radio2" value="K1" name="tun_kantor"> 
                                                        <label for="radio2">
                                                            Gemawang
                                                        </label></div>
            <div class="radio"><input type="radio" for="radio3" value="K2" name="tun_kantor"> 
                                                        <label for="radio3">
                                                            Kranggan
                                                        </label></div>
            <div class="radio"><input type="radio" for="radio4" value="K3" name="tun_kantor"> 
                                                        <label for="radio4">
                                                             Kledung
                                                        </label></div>
            <div class="radio"><input type="radio" for="radio4" value="K4" name="tun_kantor"> 
                                                        <label for="radio4">
                                                             Candiroto
                                                        </label></div>
        </div>
	    <div class="form-group">
            <label for="datetime">Tanggal</label>
            <input type="date" class="form-control" name="tun_tanggal" id="todays-date" placeholder="Tanggal"  />
        </div>
	    <input type="hidden" name="tun_id" /> 
	    <button type="submit" class="btn btn-primary" onclick="return confirm('Click OK jika benar menyetor sejumlah Rp ' + rubah(searchTxt.value) + ', Jenis : ' + jenis[form.tun_jenis.value] + ', Kantor : ' + kantor[form.tun_kantor.value])">Proses</button> 
	    <a href="<?php echo site_url('tunai_kasir') ?>" class="btn btn-default hBack">Cancel</a>
	</div>
    
            </form>
        </div>
        </div>
<script>
var form = document.getElementById("tun_jenis");
var form = document.getElementById("tun_kantor");
var jenis = {};
jenis["0"] = "Simpanan";
jenis["1"] = "Investasi";
jenis["2"] = "Simkesan";
jenis["3"] = "Pinjaman";
var kantor = {};
kantor["K"] = "Pusat";
kantor["K1"] = "Gemawang";
kantor["K2"] = "Keranggan";
kantor["K3"] = "Kledung";
kantor["K4"] = "Candiroto";
</script>