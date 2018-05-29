$(document).ready(function () {

    var max_fields = 10;
    var max_fields2 = 10;
    var max_fields3 = 10;
    var max_fields4 = 10;    
    var max_fields5 = 10;
    var max_fields6 = 10;
    var max_fields7 = 10;
    var max_fields8 = 10;

    var counter = 1;
    var counter2 = 1;
    var counter3 = 1;
    var counter4 = 1;    
    var counter5 = 1;
    var counter6 = 1;
    var counter7 = 1;
    var counter8 = 1;  

/**
            table salesperson
**/
    // add row, delete row example
    var newra = $('#newra').DataTable({responsive: true});
    //row addition code
    $('#addButton').on('click', function (e) {
        e.preventDefault();
        if(counter <= max_fields){
            newra.row.add([
            '<input type="text" class="form-control" name="ramember_name[]" placeholder="e.g. David Coolie" />',
            ]).draw();
            counter++;
        }
    });
    //row deletion code
    $('#newra tbody').on('click', 'tr', function () {
        if ($(this).hasClass('danger')) {
            $(this).removeClass('danger');
        } else {
            newra.$('tr.danger').removeClass('danger');
            $(this).addClass('danger');
        }
    });
    $('#delButton').click(function () {
        if (!$("#newra tr").hasClass('danger')) {
            alert('please select a row first');
            //exit;
        }
        newra.row('.danger').remove().draw(false);
        counter--;
    });

/**
         end of table salesperson
**/

/**
            table consultant
**/
    // add row, delete row example
    var workactivity = $('#workactivity').DataTable({responsive: true});
    //row addition code
    $('#addButton2').on('click', function (e) {
        e.preventDefault();
        if(counter2 <= max_fields2){
            workactivity.row.add([
                '<input type="text" class="form-control" name="consultant_name[]" placeholder="e.g. David Coolie"  />',
                '<input type="text" class="form-control" name="service_type2[]" placeholder="e.g. tourism"  />',
                '<input type="date" class="form-control" name="commence_date2[]" placeholder="e.g. 12/12/2016" />',
                '<input type="date" class="form-control" name="expiry_date2[]" placeholder="e.g. 24/12/2017" />'
                ]).draw();
            counter2++;
        }
    });
    //row deletion code
    $('#workactivity tbody').on('click', 'tr', function () {
        if ($(this).hasClass('danger')) {
            $(this).removeClass('danger');
        } else {
            workactivity.$('tr.danger').removeClass('danger');
            $(this).addClass('danger');
        }
    });

    $('#delButton2').click(function () {
        if (!$("#workactivity tr").hasClass('danger')) {
            alert('please select a row first');
            //exit;
        }
        workactivity.row('.danger').remove().draw(false);
        counter2--;
    });
/**
           end of table consultant
**/
/**
            tablebizsafe1
**/
    // add row, delete row example
    var tablebizsafe1 = $('#tablebizsafe1').DataTable({responsive: true});
    //row addition code
    $('#addButton3').on('click', function (e) {
        e.preventDefault();
        if(counter3 <= max_fields3){
            tablebizsafe1.row.add([
                '<input type="text" class="form-control" name="rep_name[]" placeholder="e.g. David Coolie"  />',
                '<input type="text" class="form-control" name="rep_designation[]" placeholder="e.g. manager"  />',
                '<input type="text" class="form-control" name="rep_email[]" placeholder="e.g. email@email.com" />',
                '<input type="file" class="form-control" name="rep_signature[]" placeholder="e.g. signature" />'
                ]).draw();
            counter3++;
        }
    });
    //row deletion code
    $('#tablebizsafe1 tbody').on('click', 'tr', function () {
        if ($(this).hasClass('danger')) {
            $(this).removeClass('danger');
        } else {
            tablebizsafe1.$('tr.danger').removeClass('danger');
            $(this).addClass('danger');
        }
    });

    $('#delButton3').click(function () {
        if (!$("#tablebizsafe1 tr").hasClass('danger')) {
            alert('please select a row first');
            //exit;
        }
        tablebizsafe1.row('.danger').remove().draw(false);
        counter3--;
    });
/**
           end of tablebizsafe1
**/
/**
            tablebizsafe2
**/
    // add row, delete row example
    var tablebizsafe2 = $('#tablebizsafe2').DataTable({responsive: true});
    //row addition code
    $('#addButton4').on('click', function (e) {
        e.preventDefault();
        if(counter4 <= max_fields4){
            tablebizsafe2.row.add([
                '<input type="text" class="form-control" name="member_name[]" placeholder="e.g. David Coolie"  />',
                '<input type="text" class="form-control" name="member_designation[]" placeholder="e.g. manager"  />',
                '<input type="text" class="form-control" name="member_email[]" placeholder="e.g. email@email.com" />',
                '<input type="file" class="form-control" name="member_signature[]" placeholder="e.g. signature" />'
                ]).draw();
            counter4++;
        }
    });
    //row deletion code
    $('#tablebizsafe2 tbody').on('click', 'tr', function () {
        if ($(this).hasClass('danger')) {
            $(this).removeClass('danger');
        } else {
            tablebizsafe2.$('tr.danger').removeClass('danger');
            $(this).addClass('danger');
        }
    });

    $('#delButton4').click(function () {
        if (!$("#tablebizsafe2 tr").hasClass('danger')) {
            alert('please select a row first');
            //exit;
        }
        tablebizsafe2.row('.danger').remove().draw(false);
        counter4--;
    });
/**
           end of tablebizsafe2
**/
/**
            tablebizsafe3
**/
    // add row, delete row example
    var tablebizsafe3 = $('#tablebizsafe3').DataTable({responsive: true});
    //row addition code
    $('#addButton5').on('click', function (e) {
        e.preventDefault();
        if(counter5 <= max_fields5){
            tablebizsafe3.row.add([
                '<input type="text" class="form-control" name="manager_name[]" placeholder="e.g. David Coolie"  />',
                '<input type="text" class="form-control" name="manager_designation[]" placeholder="e.g. manager"  />',
                '<input type="text" class="form-control" name="manager_email[]" placeholder="e.g. email@email.com" />',
                '<input type="file" class="form-control" name="manager_signature[]" placeholder="e.g. signature" />'
                ]).draw();
            counter5++;
        }
    });
    //row deletion code
    $('#tablebizsafe3 tbody').on('click', 'tr', function () {
        if ($(this).hasClass('danger')) {
            $(this).removeClass('danger');
        } else {
            tablebizsafe3.$('tr.danger').removeClass('danger');
            $(this).addClass('danger');
        }
    });

    $('#delButton5').click(function () {
        if (!$("#tablebizsafe3 tr").hasClass('danger')) {
            alert('please select a row first');
            //exit;
        }
        tablebizsafe3.row('.danger').remove().draw(false);
        counter5--;
    });
/**
           end of tablebizsafe3
**/
/**
            tablestd1
**/
    // add row, delete row example
    var tablestd1 = $('#tablestd1').DataTable({responsive: true});
    //row addition code
    $('#addButton6').on('click', function (e) {
        e.preventDefault();
        if(counter6 <= max_fields6){
            tablestd1.row.add([
                '<input type="text" class="form-control" name="rep_namestd[]" placeholder="e.g. David Coolie"  />',
                '<input type="text" class="form-control" name="rep_designationstd[]" placeholder="e.g. manager"  />',
                '<input type="text" class="form-control" name="rep_emailstd[]" placeholder="e.g. email@email.com" />',
                '<input type="file" class="form-control" name="rep_signaturestd[]" placeholder="e.g. signature" />'
                ]).draw();
            counter6++;
        }
    });
    //row deletion code
    $('#tablestd1 tbody').on('click', 'tr', function () {
        if ($(this).hasClass('danger')) {
            $(this).removeClass('danger');
        } else {
            tablestd1.$('tr.danger').removeClass('danger');
            $(this).addClass('danger');
        }
    });

    $('#delButton6').click(function () {
        if (!$("#tablestd1 tr").hasClass('danger')) {
            alert('please select a row first');
            //exit;
        }
        tablestd1.row('.danger').remove().draw(false);
        counter6--;
    });
/**
           end of tablestd1
**/
/**
            tablestd2
**/
    // add row, delete row example
    var tablestd2 = $('#tablestd2').DataTable({responsive: true});
    //row addition code
    $('#addButton7').on('click', function (e) {
        e.preventDefault();
        if(counter7 <= max_fields7){
            tablestd2.row.add([
                '<input type="text" class="form-control" name="member_namestd[]" placeholder="e.g. David Coolie"  />',
                '<input type="text" class="form-control" name="member_designationstd[]" placeholder="e.g. manager"  />',
                '<input type="text" class="form-control" name="member_emailstd[]" placeholder="e.g. email@email.com" />',
                '<input type="file" class="form-control" name="member_signaturestd[]" placeholder="e.g. signature" />'
                ]).draw();
            counter7++;
        }
    });
    //row deletion code
    $('#tablestd2 tbody').on('click', 'tr', function () {
        if ($(this).hasClass('danger')) {
            $(this).removeClass('danger');
        } else {
            tablestd2.$('tr.danger').removeClass('danger');
            $(this).addClass('danger');
        }
    });

    $('#delButton7').click(function () {
        if (!$("#tablestd2 tr").hasClass('danger')) {
            alert('please select a row first');
            //exit;
        }
        tablestd2.row('.danger').remove().draw(false);
        counter7--;
    });
/**
           end of tablestd2
**/
/**
            tablestd3
**/
    // add row, delete row example
    var tablestd3 = $('#tablestd3').DataTable({responsive: true});
    //row addition code
    $('#addButton8').on('click', function (e) {
        e.preventDefault();
        if(counter8 <= max_fields8){
            tablestd3.row.add([
                '<input type="text" class="form-control" name="manager_namestd[]" placeholder="e.g. David Coolie"  />',
                '<input type="text" class="form-control" name="manager_designationstd[]" placeholder="e.g. manager"  />',
                '<input type="text" class="form-control" name="manager_emailstd[]" placeholder="e.g. email@email.com" />',
                '<input type="file" class="form-control" name="manager_signaturestd[]" placeholder="e.g. signature" />'
                ]).draw();
            counter8++;
        }
    });
    //row deletion code
    $('#tablestd3 tbody').on('click', 'tr', function () {
        if ($(this).hasClass('danger')) {
            $(this).removeClass('danger');
        } else {
            tablestd3.$('tr.danger').removeClass('danger');
            $(this).addClass('danger');
        }
    });

    $('#delButton8').click(function () {
        if (!$("#tablestd3 tr").hasClass('danger')) {
            alert('please select a row first');
            //exit;
        }
        tablestd3.row('.danger').remove().draw(false);
        counter8--;
    });
/**
           end of tablestd3
**/


});
$(document).ready(function () {
    var oTable;
    /* Apply the jEditable handlers to the table */
    $('#inline_edit tbody td').editable(function (sValue) {
        /* Get the position of the current data from the node */
        var aPos = oTable.fnGetPosition(this);

        /* Get the data array for this row */
        var aData = oTable.fnGetData(aPos[0]);

        /* Update the data array and return the value */
        aData[aPos[1]] = sValue;
        return sValue;
    }, {"onblur": 'submit'});
    /* Submit the form when bluring a field */

    /* Init DataTables */
    oTable = $('#inline_edit').dataTable();
});