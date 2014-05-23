/* Display Risk Issues and Initiatives. */

$('div.riskInfo').hide();

var hoverTimeout;
var timeoutSec = 2000;

$(".wrapper").not(".heatmapAdjacenciesRisk").find(".heatmapTable td[class*='riskBubble-']").hover(function() {
    var thisBubble = $(this);
    hoverTimeout = setTimeout(function() {
        var riskBubbleCode = thisBubble.prop("class").split(' ')[0].split('-')[1];
        getRiskInfo(riskBubbleCode);
        //$('div.riskInfo').html(riskInfo).fadeIn('fast');
    }, timeoutSec);
}, function() {
    clearTimeout(hoverTimeout);
    $('div.riskInfo').fadeOut('fast');
});

function getRiskInfo(riskBubbleCode) {
    var riskInfoTable = "";
    // Ajax call starts
    $.ajax({
        url: 'http://10.249.56.184/pp_risk/heatmap/getRiskInfo/' + riskBubbleCode, // JQuery loads serverside.php
        type: 'GET',
        dataType: 'json', // Choosing a JSON datatype
        success: function(data) // Variable data contains the data we get from serverside
        {
            riskInfoTable = "<table class='riskInfoTable'><thead><tr><th colspan='2'>" + $.trim(data[0].Enterprise_Risk) + "</th></tr><tr><th>ISSUES</th><th>INITIATIVES</th></tr></thead>";

            $.each(data, function(i) {
                riskInfoTable += "<tr><td>" + $.trim($(data[i].Top_Issue).text()) + "</td><td>" + $(data[i].Top_Initiatives).text() + "</td></tr>";
            });

            riskInfoTable += "</table>";
            $('div.riskInfo').html(riskInfoTable).show("clip");
        }
    });
}