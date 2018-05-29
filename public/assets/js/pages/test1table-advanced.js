$(document).ready(function () {
    //table tools example
    $('#table1').DataTable({
        "dom": '<"m-t-10"B><"m-t-10 pull-left"f><"m-t-10 pull-right"l>rt<"pull-left m-t-10"i><"m-t-10 pull-right"p>',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });

});
