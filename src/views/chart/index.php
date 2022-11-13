<div class="container">
    <h3 class="text-center">Sơ đồ</h3>
    <div id="pie_chart"></div>
    <div id="column_chart"></div>
    <?php
    // for ($i = 0; $i < 12; $i++) {
    //     $month = $i + 1;
    //     for ($item = 0; $item < sizeof($data); $item++) {
    //         if ($data[$item]['ngaymuon'] == $month) {
    //             echo $data[$item]['ngaymuon'];
    //         }
    //     }
    // }
    ?>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var data;
    var chart;
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        data = new google.visualization.DataTable();
        data.addColumn('string', 'Tháng');
        data.addColumn('number', 'Số lượng mượn');
        data.addColumn({
            type: "string",
            role: "tooltip"
        });
        data.addRows([
            <?php
            $value = "";
            for ($i = 0; $i < 12; $i++) {
                $month = $i + 1;
                for ($item = 0; $item < sizeof($data); $item++) {
                    if ($data[$item]['ngaymuon'] == $month) {
                        $value .= "['Tháng $month'," . $data[$item]['tong'] . ",'" . $data[$item]['nhande'] . "'],";
                    }
                }
                $value .= "['Tháng $month'," . 0 . ",'"  . "'],";
            }
            echo $value;
            ?>
        ]);

        var options = {
            'title': 'Tổng các đầu sách mượn trong tháng 11',
            bar: {
                groupWidth: "75%"
            },
        };
        chart = new google.visualization.LineChart(document.getElementById('pie_chart'));
        google.visualization.events.addListener(chart, 'select', selectHandler);
        chart.draw(data, options);
    }

    function selectHandler() {
        var selectedItem = chart.getSelection()[0];
        var value = data.getValue(selectedItem.row, 0);
        alert('The user selected ' + value);
    }
</script>