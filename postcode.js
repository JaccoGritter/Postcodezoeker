$(document).ready(function(){


    $("#myButton").click(function(){

        let searchTerm = $("#postcode").val();
        let postcode = getPostcode(searchTerm);
        let city = "invalid";
        let straat = "invalid";
        if (postcode != 'no postcode'){
            $.get("getcity.php", { postcode: postcode }, function (data) {
                let response = JSON.parse(data);
                if(response.totalItemCount != 0) {
                    straat = response._embedded.adres[0].openbareruimte;
                    city = response._embedded.adres[0].woonplaats;
                    $("#straat").html('<b>' + straat + '</b>');
                    $("#stad").html('<b>' + city + '</b>');
                    } else {
                        $("#straat").html('<b>niet gevonden</b>');
                        $("#stad").html('<b>niet gevonden</b>');
                    }
            });
        } else {
            $("#straat").html('<b>niet gevonden</b>');
            $("#stad").html('<b>niet gevonden</b>');
        }
    });


    function getPostcode(searchTerm){
        if(searchTerm.length == 6) {
            if (!isNaN( searchTerm.substring(0,4)) ) {
                searchTerm = searchTerm.substring(0,4) + searchTerm.charAt(4).toUpperCase() + searchTerm.charAt(5).toUpperCase();
                return searchTerm;
            }
        } 
        return ('no postcode');
    }

  });