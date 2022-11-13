<div class="container">
    <h3 class="text-center">Sơ đồ</h3>
    <div id="pie_chart"></div>
    <div id="column_chart"></div>

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
        data.addColumn('number', 'số lượng');
        // data.addColumn({
        //     type: "string",
        //     role: "annotation"
        // });
        data.addRows([
            <?php
            $value = "";
            while ($data = $result->fetch()) {

                $value .= "['$data[nhande]',$data[tong]],";
            }
            ?>
            <?php echo $value ?>
        ]);

        var options = {
            'title': 'Tổng các đầu sách mượn trong tháng 11',
            bar: {
                groupWidth: "10%"
            },
        };
        chart = new google.visualization.ColumnChart(document.getElementById('pie_chart'));
        google.visualization.events.addListener(chart, 'select', selectHandler);
        chart.draw(data, options);
    }

    function selectHandler() {
        var selectedItem = chart.getSelection()[0];
        var value = data.getValue(selectedItem.row, 0);
        alert('The user selected ' + value);
    }
</script>