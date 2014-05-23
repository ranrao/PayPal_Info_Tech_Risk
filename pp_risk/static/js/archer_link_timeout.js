var url = "https://pp-archer.corp.ebay.com";
var win = window.open(url, "s", "width= 1, height= 1, left=0, top=0, resizable=no, toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no").blur();
setTimeout(function() {
    win.close();
}, 3000);
window.focus();