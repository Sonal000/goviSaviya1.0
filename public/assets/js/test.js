$(document).ready(function () {
  // $("#cont").hide();

  // Function to fetch data from the show() function in controller
  function fetchData() {
    $.ajax({
      url: "http://localhost/goviSaviya1.0/Test/show/test/show",
      type: "GET",
      dataType: "json",
      success: function (response) {
        console.log(response.status);
        console.log(response);
        // Check if response is successful
        if (response.status === "success") {
          // Clear the .cont div
        //   $("#cont").empty();

          // Loop through the items and append them to the .cont div
          $.each(response.items, function(index, item){
            var html = item.name;
            html += "<br>";
            html += item.description?item.description:"";
            html += "<br>";
            html += "<div> ------</div>";
            
       
            
            $('#cont').append(html);
        });
        
        } else {
          // Display error message
          $("#cont").html("<p>Error display  data.</p>");
        }
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("AJAX Error:", textStatus, errorThrown);
        $("#cont").html("<p>Error fetching data.</p>");
      },
    });
  }

  // Call the fetchData function when the page loads
  fetchData();
});
