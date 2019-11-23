<script>
    function ajax_post(){
        //create our XMLHTTPRequest
        var hr = new XMLHttpRequest();
        //create some variable we will send to php file
        var url = "my_parse.php";
        var fn = document.getElementById('firstname').value;
        var ln = document.getElementById('lastname').value;
        var g = document.getElementById('gender').value;
        var add = document.getElementById('address').value;
        var vars = "firstname=" +fn+ "&lastname=" +ln+ "&gender=" +g+ "&address=" +add;
        hr.open("POST", url, true);
        //set content type header information for sending urlencoded variables in the request
        hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //Access the onreadystatechange for the XMLHttpRequest object
        hr.onreadystatechange = function () {
            if (hr.readyState == 4 && hr.status == 200) {
                var return_data = hr.responseText;
                document.getElementById("status").innerHTML = return_data;
            }
        }
        //send data to php now... and wait for response to update the status div
        hr.send(vars);
        document.getElementById("status").innerHTML = "processing.....";
    }
</script>