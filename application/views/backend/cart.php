
<?php if(is_allow('M_LAPORAN')): ?>
            <div class="col-lg-12 animated bounce">
                <div class="ibox">
                    <div class="ibox-title">
                        <span>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfosimpanan">
                        Klik Info Chart Kas
                        </button>
                        </span>
                    </div>
                        <div class="ibox-content">
                            <div class="flip-card-front">
                                <canvas id="kasir" height="100"></canvas>
                            </div>
                        </div>
            
                    </div>
            </div>
            <div class="col-lg-4 animated bounce">
                <div class="ibox">
                    <div class="ibox-title">
                        <span>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfosimpanan">
                        Klik Info Chart Simpanan
                        </button>
                        </span>
                    </div>
                        <div class="ibox-content">
                            <div class="flip-card-front">
                                <canvas id="simpanan" height="140"></canvas>
                            </div>
                        </div>
            
                    </div>
            </div>
            <div class="col-lg-4 animated bounce">
                <div class="ibox">
                    <div class="ibox-title">
                        <span>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfopinjaman">
                        Klik Info Chart Pinjaman 
                        </button>
                        </span>
                    </div>
                        <div class="ibox-content">
                            <div class="flip-card-front">
                                <canvas id="pinjaman" height="140"></canvas>
                            </div>
                        </div>

                    </div>
            </div>
            <div class="col-lg-4 animated bounce">
                <div class="ibox">
                    <div class="ibox-title">
                        <span>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInfoinvestasi">
                        Klik Info Chart Investasi 
                        </button>
                        </span>
                    </div>
                        <div class="ibox-content">
                            <div class="flip-card-front">
                                <canvas id="investasi" height="140"></canvas>
                            </div>
                        </div>

                    </div>
            </div>

<script>
function dateNow(splinter,sub){
    var set = new Date();
    var getDate = set.getDate().toString();
    if (getDate.length == 1){ //example if 1 change to 01
    getDate = "0"+getDate;
    }
    var getMonth = (set.getMonth()+1).toString();
    if (getMonth.length == 1){
    getBulan = "0"+getMonth-sub;
    }
    var getYear = set.getFullYear().toString();
    if (getBulan <= 0){
    getBulan = getBulan + 12;
    getYear = getYear - 1;
    }
    var dateNow = getYear +splinter+ getBulan; //today
    return dateNow;
    }
</script>
<?php include APPPATH.'data/modalchart/modal.php';?>
<?php include APPPATH.'data/kas.php';?>
<?php include APPPATH.'data/pinjaman.php';?>
<?php include APPPATH.'data/simpanan.php';?>
<?php include APPPATH.'data/investasi.php';?>
        <?php endif; ?>