<?php

// Truy vấn tổng nhập kho và xuất kho theo từng tháng
$sqlNhapKho = "
  SELECT DATE_FORMAT(thoigian, '%Y-%m') as Thang, tensanpham, SUM(soluong) as TongNhapKho 
  FROM sanpham 
  GROUP BY Thang, tensanpham";
$resultNhapKho = $mysqli->query($sqlNhapKho);

$nhapKhoData = [];
while ($row = $resultNhapKho->fetch_assoc()) {
    $nhapKhoData[$row['Thang']][$row['tensanpham']] = $row['TongNhapKho'];
}

$sqlXuatKho = "
  SELECT DATE_FORMAT(thoigian, '%Y-%m') as Thang, tensanpham, SUM(soluong) as TongXuatKho 
  FROM xuatkho 
  GROUP BY Thang, tensanpham";
$resultXuatKho = $mysqli->query($sqlXuatKho);

$xuatKhoData = [];
while ($row = $resultXuatKho->fetch_assoc()) {
    $xuatKhoData[$row['Thang']][$row['tensanpham']] = $row['TongXuatKho'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <title>Thống kê sản phẩm</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php?quanly=7ngay">7 ngày</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">1 tháng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?quanly=1nam">1 năm</a>
                    </li>
                </ul>
            </div>
        </nav>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Thống kê</h1>
            </div>
            <?php if (isset($_SESSION['hovaten'])) { ?>
                <h3>Xin chào: <?php echo $_SESSION['hovaten'] ?></h3>
            <?php } ?>

            <!-- Biểu đồ tròn -->
            <?php
            $query = "SELECT IFNULL(SUM(sp.soluong), 0) AS soluong_sanpham, IFNULL(SUM(xk.soluong), 0) AS soluong_xuatkho
                      FROM sanpham sp
                      LEFT JOIN xuatkho xk ON sp.tensanpham = xk.tensanpham
                      WHERE sp.tensanpham = 'Thực phẩm tươi sống'";
            $result = $mysqli->query($query);
            $row = $result->fetch_assoc();

            $soluong_sanpham = (int)$row['soluong_sanpham'];
            $soluong_xuatkho = (int)$row['soluong_xuatkho'];
            $soluong_conlai = $soluong_sanpham - $soluong_xuatkho;

            $phamtram_sanpham = ($soluong_sanpham > 0) ? round(($soluong_sanpham / ($soluong_sanpham + $soluong_xuatkho)) * 100, 2) : 0;
            $phamtram_xuatkho = ($soluong_xuatkho > 0) ? round(($soluong_xuatkho / ($soluong_sanpham + $soluong_xuatkho)) * 100, 2) : 0;
            $phamtram_conlai = 100 - $phamtram_xuatkho;

            $data = array(
                array('Loại', 'Phần trăm'),
                array('Đã xuất kho', $phamtram_xuatkho),
                array('Còn lại trong kho', $phamtram_conlai)
            );
            ?>
            <script type="text/javascript">
                google.charts.load('current', {'packages': ['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                    var data = google.visualization.arrayToDataTable(<?php echo json_encode($data); ?>);
                    var options = {
                        title: 'Tỷ lệ số lượng sản phẩm "Thực phẩm tươi sống"',
                        is3D: true,
                    };
                    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                    chart.draw(data, options);
                }
            </script>
            <div id="piechart_3d" style="width: 100%; height: 500px;"></div>

            <!-- Biểu đồ cột -->
            <h3>Thống kê xuất/nhập kho theo tháng</h3>
            <script type="text/javascript">
                google.charts.load('current', {'packages': ['corechart', 'bar']});
                google.charts.setOnLoadCallback(drawBarChart);

                function drawBarChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Tháng');
                    <?php
                    $sanphamList = [];
                    foreach ($nhapKhoData as $monthData) {
                        foreach (array_keys($monthData) as $sanpham) {
                            if (!in_array($sanpham, $sanphamList)) {
                                $sanphamList[] = $sanpham;
                            }
                        }
                    }
                    foreach ($xuatKhoData as $monthData) {
                        foreach (array_keys($monthData) as $sanpham) {
                            if (!in_array($sanpham, $sanphamList)) {
                                $sanphamList[] = $sanpham;
                            }
                        }
                    }

                    foreach ($sanphamList as $sanpham) {
                        echo "data.addColumn('number', 'Nhập kho $sanpham');";
                        echo "data.addColumn('number', 'Xuất kho $sanpham');";
                    }

                    $months = array_unique(array_merge(array_keys($nhapKhoData), array_keys($xuatKhoData)));
                    sort($months);
                    foreach ($months as $month) {
                        $row = ["'$month'"];
                        foreach ($sanphamList as $sanpham) {
                            $row[] = isset($nhapKhoData[$month][$sanpham]) ? $nhapKhoData[$month][$sanpham] : 0;
                            $row[] = isset($xuatKhoData[$month][$sanpham]) ? $xuatKhoData[$month][$sanpham] : 0;
                        }
                        echo "data.addRow([" . implode(',', $row) . "]);";
                    }
                    ?>

                    var options = {
                        chart: {
                            title: 'Thống kê sản phẩm theo tháng',
                            subtitle: 'Tổng nhập kho và tổng xuất kho theo từng loại mặt hàng',
                        },
                        bars: 'vertical',
                        vAxis: {format: 'decimal'},
                        height: 500,
                        colors: ['#1b9e77', '#d95f02', '#7570b3', '#e7298a', '#66a61e', '#e6ab02']
                    };

                    var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_material'));
                    chart.draw(data, options);
                }
            </script>
            <div id="columnchart_material" style="width: 100%; height: 500px;"></div>
        </main>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
