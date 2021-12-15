<div id="page-wrapper" >
    <div id="div-alert">
    </div>
    <div class="panel panel-default" align="left">
        <div class="panel-heading">
            <label>No. <?=$no?></label>&nbsp;(<?=$jenis_soal?>)
            <label align="right" class="col-md-6 countdown"></label>
        </div>
        <div class="panel-body">
            <div class="form-group" style="font-size: 15px;">
                <p><?=($soal)?></p>
            </div>
            <div class="form-group">
                <?php if ($audio!="") { ?>
                    <audio controls>
                        <source src="<?=base_url('assets').'/uploads/'.$audio;?>" type="audio/mpeg">Your browser does not support the audio element.
                    </audio>
                <?php } ?>
            </div>
            <?php for ($i=0; $i < $jmlJawaban; $i++) { ?>
                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="jawaban" onchange="jawab(<?=$id_jawaban[$i]?>,<?=$id?>,<?=$no-1?>)" value="<?=$id_jawaban[$i]?>" <?=$hasilJawab == $id_jawaban[$i] ? 'checked': ''?>>
                            <?php echo strip_tags($jawaban[$i]);?>
                        </label>
                    </div>
                </div>
            <?php } ?>
            <div>
                <?php if ($selanjutnya != 1) { ?>
                    <a href="<?=base_url('conujian/kertasujian/').$sebelumnya.'/'.'0';?>" class="btn btn-default">Soal sebelumnya</a>
                <?php } ?>
                <?php
                $ada=0;
                foreach ($list_ujian as $listU) {
                    if ($id == $listU->soal) {
                        switch ($listU->ragu) {
                            case '0':
                            echo '<div class="btn btn-warning" id="btn-ragu" onclick="ragu('.$listU->id.','.($no-1).')"><input type="checkbox" style="width:10px;height:10px;" name="btn-ragu-checkbox" id="btn-ragu-checkbox"/> Ragu-ragu</div>';
                            break;
                            case '1':
                            echo '<div class="btn btn-warning" id="btn-ragu" onclick="ragu('.$listU->id.','.($no-1).')"><input type="checkbox" style="width:10px;height:10px;" name="btn-ragu-checkbox" id="btn-ragu-checkbox" checked="checked"/> Ragu-ragu</div>';
                            break;

                            default:
                            echo '<div class="btn btn-warning" id="btn-ragu" onclick="ragu('.$listU->id.','.($no-1).')"><input type="checkbox" style="width:10px;height:10px;" name="btn-ragu-checkbox" id="btn-ragu-checkbox"/> Ragu-ragu</div>';
                            break;
                        }
                        $ada=1;
                        break;
                    }
                }
                if ($ada==0) {
                    echo '<div class="btn btn-warning hidden" id="btn-ragu"></div>';
                } ?>
                <?php if ($selanjutnya > 0) { ?>
                    <a href="<?=base_url('conujian/kertasujian/').$selanjutnya;?>" class="btn btn-default">Soal selanjutnya</a>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <b>Daftar soal</b> (Soal yang telah dijawab akan berwarna hijau. Ragu-ragu berwarna kuning. Belum dijawab berwarna putih)
        </div>
        <div class="panel-body">
            <div class="form-group">
                <?php
                $num=0;
                foreach ($list_soal as $listS) {
                    $ada=0;
                    foreach ((array)$list_ujian as $listU) {
                        if ($listS->id == $listU->soal) {
                            switch ($listU->ragu) {
                                case '0':
                                echo '<a href="'.base_url("conujian/kertasujian/").$num.'" id="btn-soal-'.$num.'" class="btn btn-success">'.++$num.'</a>';
                                break;
                                case '1':
                                echo '<a href="'.base_url("conujian/kertasujian/").$num.'" id="btn-soal-'.$num.'" class="btn btn-warning">'.++$num.'</a>';
                                break;

                                default:
                                echo '<a href="'.base_url("conujian/kertasujian/").$num.'" id="btn-soal-'.$num.'" class="btn btn-default">'.++$num.'</a>';
                                break;
                            }
                            $ada=1;
                            break;
                        }
                    }
                    if ($ada==0) {
                        echo '<a href="'.base_url("conujian/kertasujian/").$num.'" id="btn-soal-'.$num.'" class="btn btn-default">'.++$num.'</a>';
                    }
                } ?>
            </div>
            <div class="form-group" align="right">
                <button class="btn btn-default" data-toggle="modal" data-target="#myModal" onclick="selesaikan()">Selesai mengerjakan</button>
            </div>
        </div>
    </div>

    <!-- /. modals -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Apakah anda yakin telah menyelesaikan ujian?</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">
                        <span>Jawaban tidak dapat diubah setelah anda memilih menyelesaikan ujian</span>
                    </div>
                    <div class="form-group">
                        <label>Nama Tes</label>
                        <input class="form-control" name="tes" value="TOEFL" readonly/>
                    </div>
                    <div class="form-group">
                        <label>Keterangan soal</label>
                        <input class="form-control" name="soal-selesai" id="soal-selesai" value="8 Soal telah diisi, 4 Soal belum diisi" readonly/>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" name="konfirmasi">Centang lalu klik tombol selesaikan ujian</label>
                        <label id="warning-centang"></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="ujianSelesai()">Selesaikan ujian</button>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="<?php echo base_url('assets');?>/binary/assets/js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url('assets');?>/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php echo base_url('assets');?>/binary/assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="<?php echo base_url('assets');?>/binary/assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="<?php echo base_url('assets');?>/binary/assets/js/custom.js"></script>
<script src="<?php echo base_url('assets');?>/binary/assets/js/dataTables/jquery.dataTables.js"></script>
<script src="<?php echo base_url('assets');?>/binary/assets/js/dataTables/dataTables.bootstrap.js"></script>
<script type="text/javascript">
    var awal;
    var hitungWaktu;
    var saveWaktu;
    $(document).ready(function () {
        awal = "<?=$sekarang?>";
        hitungWaktu = setInterval(function() {


            var sekarang = awal.split(':');
            //by parsing integer, I avoid all extra string processing
            var jam = parseInt(sekarang[0], 10);
            var menit = parseInt(sekarang[1], 10);
            var detik = parseInt(sekarang[2], 10);
            --detik;
            menit = (detik < 0) ? --menit : menit;
            jam = (menit < 0) ? --jam : jam;
            if (jam < 0 && menit < 0 && detik < 0) {
                clearInterval(hitungWaktu);
                $.ajax({
                    url : "<?php echo site_url('conujian/hentikanUjian')?>",
                    type: "POST",
                    data: 'id_waktu=' + <?=$id_waktu?> + '&sekarang=' + awal + '&berhenti=' + awal,
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('.countdown').html('00:00:00');
                        awal = "00:00:00";
                        window.location.replace("<?php echo site_url('conujian/hasilUjian')?>");
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
            }else{
                detik = (detik < 0) ? 59 : detik;
                detik = (detik < 10) ? '0' + detik : detik;
                menit = (menit < 0) ? 59 : menit;
                menit = (menit < 10) ? '0' + menit : menit;
                jam = (jam < 0) ? '00' : jam;
                jam = (jam < 10) ? '0' + jam : jam;
                awal = jam + ':' + menit + ':' + detik;
                sessionStorage.setItem('waktuUjian', awal);
                $('.countdown').html(awal);
            }
        }, 1000);
        saveWaktu = setInterval(function() {
            let awal = sessionStorage.getItem('waktuUjian');
                $.ajax({
                    url : "<?php echo site_url('conujian/editWaktu')?>",
                    type: "POST",
                    data: 'id_waktu=' + <?=$id_waktu?> + '&sekarang=' + awal,
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('.countdown').html(data.sekarang);
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        alert('Error get data from ajax');
                    }
                });
            }, 30000);

    })

    function jawab(id_jawaban,id_soal,row) {
        $.ajax({
            url : "<?php echo site_url('conujian/save')?>",
            type: "POST",
            data: 'id_jawaban=' + id_jawaban + '&id_soal=' + id_soal,
            dataType: "JSON",
            success: function(data)
            {
                   jsucces = '<div class="alert alert-success" id="alert" align="center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Jawaban berhasil disimpan</div>';
                   $("#div-alert").append(jsucces);
                   if (data.save) {
                        $('[name="btn-ragu-checkbox"]').prop('checked', false);
                       $("#btn-soal-"+row).removeClass("btn-default");
                       $("#btn-soal-"+row).removeClass("btn-warning");
                       $("#btn-soal-"+row).addClass("btn-success");
                       $("#btn-ragu").removeClass("hidden");
                       $("#btn-ragu").attr('onclick', 'ragu('+data.id_ujian+','+row+')');
                       $("#btn-ragu").append('<input type="checkbox" style="width:10px;height:10px;" name="btn-ragu-checkbox" id="btn-ragu-checkbox"/> Ragu-ragu');
                   }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                jerror = '<div class="alert alert-danger" id="alert" align="center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Jawaban tidak berhasil disimpan</div>';
                   $("#div-alert").append(jerror);
            }
        });
    }

    function ragu(id_ujian,row) {
        raguB = 0;
        if ($('[name="btn-ragu-checkbox"]').prop("checked") == false) {
            raguB = 1;
        }
        $.ajax({
            url : "<?php echo site_url('conujian/ragu')?>",
            type: "POST",
            data: 'id_ujian=' + id_ujian +'&ragu='+ raguB,
            dataType: "JSON",
            success: function(data)
            {
                if (raguB==1) {
                    $('[name="btn-ragu-checkbox"]').prop('checked', true);
                    $("#btn-soal-"+row).removeClass("btn-success");
                    $("#btn-soal-"+row).addClass("btn-warning");
                    rsucces = '<div class="alert alert-warning" id="alert" align="center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Anda ragu dengan soal no : '+row+'</div>';
                    $("#div-alert").append(rsucces);
                }else{
                    $('[name="btn-ragu-checkbox"]').prop('checked', false);
                    $("#btn-soal-"+row).removeClass("btn-warning");
                    $("#btn-soal-"+row).addClass("btn-success");
                    rsucces = '<div class="alert alert-success" id="alert" align="center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Anda yakin dengan soal no : '+row+'</div>';
                    $("#div-alert").append(rsucces);
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                rerror = '<div class="alert alert-danger" id="alert" align="center"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>Error get data from ajax</div>';
                $("#div-alert").append(rerror);
            }
        });
    }

    function selesaikan(argument) {
        $.ajax({
            url : "<?php echo site_url('conujian/jumlahIsi')?>",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                belumIsi = data.allSoal-data.allUjian;
                $('[name="soal-selesai"]').val(data.allUjian+' Soal yang telah dijawab, '+belumIsi+' soal belum dijawab dan '+data.allRagu+' soal yang masih ragu');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
    }

    function ujianSelesai() {
        if ($('[name="konfirmasi"]').prop('checked') == true) {
            clearInterval(hitungWaktu);
            $.ajax({
                url : "<?php echo site_url('conujian/hentikanUjian')?>",
                type: "POST",
                data: 'id_waktu=' + <?=$id_waktu?> +'&sekarang='+ $('.countdown').text() + '&berhenti=' + $('.countdown').text(),
                dataType: "JSON",
                success: function(data)
                {
                    window.location.replace("<?php echo site_url('conujian/hasilUjian')?>");
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
            });
        }else{
            $("#warning-centang").text("Centang konfirmasi dahulu");
        }
    }
</script>

</body>
</html>
