
<?php
$bmi=null;
$phanloai='';
if (isset($_GET['Chieu_cao']) && isset($_GET['Can_nang'])) {
    $ChieuCao = $_GET['Chieu_cao'];
    $CanNang = $_GET['Can_nang'];
    if ($ChieuCao > 0 && $CanNang > 0) {
        $bmi = $CanNang / (($ChieuCao / 100) * ($ChieuCao / 100));
        if ($bmi < 18.5) {
            $phanloai = 'Skeleton';
        } elseif ($bmi < 24.9) {
            $phanloai = 'Hu-mần';
        } elseif ($bmi < 29.9) {
            $phanloai = 'beo vl';
        } else {
            $phanloai = 'Ur mom';
        }
    } else {
        echo "Chiều cao và cân nặng phải lớn hơn 0";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tinh BMI</title>
</head>
<style>
    * {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;

    }

    .main {
        background-color: grey;
        width: 400px;
        height: 180px;
        margin: 100px auto;
    }

    .bt_group {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bt {
        width: 100px;
        height: auto;
        align-items: center;
        border-radius: 30px;
        padding: 5px 10px;
        margin: 0 12px;
        cursor: pointer;
    }

    form {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    table {
        margin: 20px 0;
        border-spacing: 10px 10px
    }
</style>

<body>
    <div class="main">
        <form action="">
            <table>
                <tr>
                    <td><label for="ChieuCao">Chiều Cao </label></td>
                    <td><input type="number" min="0" id="ChieuCao" name="Chieu_cao" placeholder="Cm"></td>
                </tr>
                <tr>
                    <td><label for="CanNang">Cân Nặng </label></td>
                    <td><input type="number" min="0" id="CanNang" name="Can_nang" placeholder="Kg"></td>
                </tr>
            </table>
            <div class="bt_group">
                <button class="bt" type="submit">Tính BMI</button>
                <button class="bt" type="reset">Nhập lại</button>
            </div>
        </form>
    </div>

    <?php if ($bmi !== null) : ?>
        <div class="main">
            <h3>BMI: <?= number_format($bmi, 2) ?></h3>
            <h3>Phân loại: <?= $phanloai ?></h3>
        </div>
    <?php endif; ?>

</body>

</html>