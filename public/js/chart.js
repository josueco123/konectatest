am4core.useTheme(am4themes_animated);

$(document).ready(function () {
    get_sells();
    function get_sells() {
        $.ajax({
            type: 'get',
            url: "api/getsells",
            dataType: 'json',
            success: datos => {
                console.log(datos)                
                createChar(datos.sells)
            }
        });
    }

    function createChar(data)
    {

        const chart =  am4core.create("chartdiv", am4charts.PieChart);
        
        chart.data = data;

        const pieSeries = chart.series.push(new am4charts.PieSeries());
        pieSeries.dataFields.value = "total_sells";
        pieSeries.dataFields.category = "name";
        pieSeries.slices.template.propertyFields.fill = "color";

        chart.legend = new am4charts.Legend();
    
    }
});



