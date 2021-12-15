<div id="page-wrapper">
	<div class="panel panel-default" align="left">
		<div class="panel-heading">
			<h1>Hasil</h1>
		</div>
		<div class="panel-body">
			<div class="row">
                <div class="col-md-2">
                    <label>Nama Peserta</label>
                </div>
                <div class="col-md-2">:</div>
                <div class="col-md-8">
                    <?=$nama?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Tes</label>
                </div>
                <div class="col-md-2">:</div>
                <div class="col-md-8">
                    <?=$ujian?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Reading</label>
                </div>
                <div class="col-md-2">:</div>
                <div class="col-md-8">
                    <?=$reading != null ? $reading : 0?> Jawaban benar dari 25 soal
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Listening</label>
                </div>
                <div class="col-md-2">:</div>
                <div class="col-md-8">
                    <?=$listening != null ? $listening : 0?> Jawaban benar dari 25 soal
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <label>Structure & written expression</label>
                </div>
                <div class="col-md-2">:</div>
                <div class="col-md-8">
                    <?=$structure != null ? $structure : 0?> Jawaban benar dari 20 soal
                </div>
            </div>
		</div>
	</div>
</div>