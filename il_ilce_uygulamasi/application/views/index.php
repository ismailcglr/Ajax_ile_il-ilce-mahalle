<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>İl-İlçe/Uygulaması</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3 align="center" class="mt-5">İl-İlçe-Mahalle</h3>
            <hr>
            <label for="">İl seçiniz <sup>*</sup></label>
            <select name="" id="il">
                <?php foreach ($il as $ill){ ?>
                <option value="<?= $ill->id ?>"><?= $ill->name ?></option>
                <?php } ?>
            </select><br>
            <label for="">İlçe seçiniz <sup>*</sup></label>
            <select name="" id="ilce">
            </select><br>
            <label for="">Mahalle seçiniz <sup>*</sup></label>
            <select name="" id="mahalle">
            </select>
        </div>
    </div>
</div>
<script>
    $("#il").change(function (){
        $("#mahalle").find("option").remove();
        let sec_il=$("#il").val();
        let ilData={ilId:sec_il};
        $.ajax({
            type: "POST",
            url: 'http://localhost/il_ilce_uygulamasi/main/ilce',
            data: ilData,
            success: function(response){
                let ilce=response.ilce;
                ilce.forEach(function (get){
                    $("#ilce").append("<option value='"+get.id+"'>"+get.ilce+"</option>");
                });
                $("#il").change(function (){
                    $("#ilce").find('option').remove();
                });
            }
        });
    });
    $("#ilce").change(function (){
        var sec_ilce=$("#ilce").val();
        console.log(sec_ilce);
        var ilceData={ilceId:sec_ilce};
        $.ajax({
            type: "POST",
            url: 'http://localhost/il_ilce_uygulamasi/main/mahalle',
            data: ilceData,
            success:function (respon){
                let mahalle=respon.mahalle;
                console.log(respon.mahalle);
                mahalle.forEach(function (gett){
                    console.log(gett.mahalle);
                    $("#mahalle").append("<option value='"+gett.id+"'>"+gett.mahalle+"</option>");
                });
                $("#ilce").change(function (){
                    $("#mahalle").find("option").remove();
                });
            }
        });
    });
</script>
</body>
</html>