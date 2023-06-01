<?php require_once "proses_registrasi.php" ?>
<?php $total =0; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<div class="container">
    <h2 class="card-header">Form Registrasi IT Club Data Science</h2>
    <br>
    <form class="ml-4" method="post">
        <div class="form-group row">
            <label for="nim" class="col-4 col-form-label">NIM</label> 
            <div class="col-4">
            <input id="nim" name="nim" placeholder="Masukkan NIM" type="text" class="form-control" required="required">
            </div>
        </div>
        <div class="form-group row">
            <label for="nama" class="col-4 col-form-label">Nama</label> 
            <div class="col-4">
            <input id="nama" name="nama" placeholder="Masukkan Nama" type="text" class="form-control" required="required">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-4 col-form-label">Email</label> 
            <div class="col-4">
            <input id="email" name="email" placeholder="Masukkan Email" type="text" class="form-control" required="required">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">Jenis Kelamin</label> 
            <div class="col-4">
            <div class="custom-control custom-radio custom-control-inline">
                <input name="jenis_kelamin" id="jenis_kelamin_0" type="radio" class="custom-control-input" value="Pria" required="required"> 
                <label for="jenis_kelamin_0" class="custom-control-label">Pria</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input name="jenis_kelamin" id="jenis_kelamin_1" type="radio" class="custom-control-input" value="Wanita" required="required"> 
                <label for="jenis_kelamin_1" class="custom-control-label">Wanita</label>
            </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="domisili" class="col-4 col-form-label">Domisili</label> 
            <div class="col-4">
            <select id="domisili" name="domisili" class="custom-select" required="required">
                <?php foreach($domisili as $dom){ ?>
                        <option value="<?= $dom;?>"> <?= $dom;?><php</option>
                <?php } ?>
                
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="program_studi" class="col-4 col-form-label">Program Studi</label> 
            <div class="col-4">
            <select id="program_studi" name="program_studi" class="custom-select" required="required">
                <?php foreach($program_studi as $key => $value){ ?>
                <option value="<?= $key ?>"><?= $value ?></option>
                <?php } ?>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-4">Skill Programming</label> 
            <div class="col-4">
            <?php foreach($skills as $key => $value){?>
            <div class="custom-control custom-checkbox custom-control-inline">
                <input name="skill[]" id="<?= $key ?>" type="checkbox" class="custom-control-input" value="<?= $key ?>" > 
                <label for="<?= $key ?>" class="custom-control-label"><?= $key ?></label>
            </div>
            <?php } ?>
            </div>
        </div> 
        <div class="form-group row">
            <div class="offset-4 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <hr>
    <table class="table table-bordered">
        <tr class="table-danger">
            <th>NIM</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Domisili</th>
            <th>Program studi</th>
            <th>Skills</th>
            <th>Total</th>
            <th>Kategori Skill</th>
            <th>Email</th>
            
        </tr>
        <?php
        if(isset($_POST['submit'])){
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $domisili = $_POST['domisili'];
            $program_studi = $_POST['program_studi'];
            $skill_user = $_POST['skill'];
            }
        ?>
        <tr>
            <th><?= $nim; ?></th>
            <th><?= $nama; ?></th>
            <th><?= $jenis_kelamin; ?></th>
            <th><?= $domisili; ?></th>
            <th><?= $program_studi; ?></th>
            <th><?php foreach($skill_user as $skill){
                echo  " $skill";
                ?> <?php } ?>
            </th>
            <th><?php foreach ($skill_user as $skill_nilai) {
                        $total += $skills[$skill_nilai];
                ?> <?php } ?>
                <?= $total ?>
            </th>
            <th><?php 
                if ($total == 0 ) {
                    echo "tidak memadai";
                } elseif ($total>= 1 && $total<= 40) {
                    echo "kurang";
                } elseif ($total>= 41 && $total<= 60) {
                    echo "cukup";
                } elseif ($total>= 61 && $total<= 100) {
                    echo "baik";
                } elseif ($total>= 101 && $total<= 150) {
                    echo "sangat baik";} ?>
            </th>
            <th>
                <?= $email ?>
            </th>
        </tr>
        
    </table> 
</div>
<br>

</body>
</html>