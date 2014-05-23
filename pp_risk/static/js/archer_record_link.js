/* Hyper Link Zones on the Scorecard Webpages */

$('#generalBox, #controlLinkBox, #keyInitiatives, #metricsBox').css('cursor', 'pointer')
$("#generalBox, #controlLinkBox, #keyInitiatives, #metricsBox").click(function() {
    var href = $(this).find('.archerLink').val();
    window.open(href, '_blank');
});