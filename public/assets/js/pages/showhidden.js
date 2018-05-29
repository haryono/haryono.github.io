

      $(function() {
           // start show hidden field upon check 
          // Get the form fields and hidden div
          var checkbox = $("#trigger");
          var checkboxstd = $("#triggerstandard");
          var checkboxothers =$("#triggerothers");
          var hidden = $("#hidden_fields");
          var hiddenstd = $("#hidden_fields2");
          var hiddenothers = $("#hidden_fields3");
          
          
          // Hide the fields.
          // Use JS to do this in case the user doesn't have JS 
          // enabled.
          if (!checkbox.is(':checked')) {
            hidden.hide();
          }
          if (!checkboxstd.is(':checked')) {
            hiddenstd.hide();
          }
          if (!checkboxothers.is(':checked')) {
            hiddenothers.hide();
          }
          // Setup an event listener for when the state of the 
          // checkbox changes.
          checkbox.change(function() {
            // Check to see if the checkbox is checked.
            // If it is, show the fields and populate the input.
            // If not, hide the fields.
            if (checkbox.is(':checked')) {
              // Show the hidden fields.
              hidden.show();
            } else {
              // Make sure that the hidden fields are indeed
              // hidden.
              hidden.hide();
              
              // You may also want to clear the value of the 
              // hidden fields here. Just in case somebody 
              // shows the fields, enters data to them and then 
              // unticks the checkbox.
              //
              // This would do the job:
              //
              // $("#hidden_field").val("");
            }
          });

            checkboxstd.change(function() {
            // Check to see if the checkbox is checked.
            // If it is, show the fields and populate the input.
            // If not, hide the fields.
            if (checkboxstd.is(':checked')) {
              // Show the hidden fields.
              hiddenstd.show();
            } else {
              // Make sure that the hidden fields are indeed
              // hidden.
              hiddenstd.hide();
              
              // You may also want to clear the value of the 
              // hidden fields here. Just in case somebody 
              // shows the fields, enters data to them and then 
              // unticks the checkbox.
              //
              // This would do the job:
              //
              // $("#hidden_field").val("");
            }
          });

            checkboxothers.change(function() {
            // Check to see if the checkbox is checked.
            // If it is, show the fields and populate the input.
            // If not, hide the fields.
            if (checkboxothers.is(':checked')) {
              // Show the hidden fields.
              hiddenothers.show();
            } else {
              // Make sure that the hidden fields are indeed
              // hidden.
              hiddenothers.hide();
              
              // You may also want to clear the value of the 
              // hidden fields here. Just in case somebody 
              // shows the fields, enters data to them and then 
              // unticks the checkbox.
              //
              // This would do the job:
              //
              // $("#hidden_field").val("");
            }
          });
          // end show hidden field upon check 
        });


    