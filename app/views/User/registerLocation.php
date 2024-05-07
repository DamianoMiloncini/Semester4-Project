<html>

<head>
    <title>Register Location</title>
    <!-- need some JS :) -->
    <script>
        function populateCities() {
            var province = document.getElementById("province");
            var citySelect = document.getElementById("city");

            //have an array of cities according to the province
            var cities = {
                "Quebec":  ["Montreal","Laval","Montreal-Nord","Quebec"], //add more cities later on
                "Ontario": ["Toronto","Ottawa","Mississauga","Brampton"] //add more cities later on
            };

            // Clear existing options
            citySelect.innerHTML = "";
            //get the value selected by the user
            var selectedProvince = province.value;

            cities[selectedProvince].forEach(function(city){
                var option = document.createElement("option");
                option.text = city;
                option.value = city;
                citySelect.appendChild(option);
            });
        }
    </script>
</head>

    <body>
    <div class='container'>
    <form id="locationInfo" method="POST" action="">
        <h3>Enter your location details</h3>
        <div class="form-group">
            <label>Address<input type="number" class="form-control" name="address" placeholder="821"></label>
        </div>
        <div class="form-group">
            <label>Street<input type="text" class="form-control" name="street" placeholder="Sainte Croix Ave"></label>
        </div>
        <div class="form-group">
            <label>City<select id="city" class="form-control" name="city">
                    <!-- is going to be populated by JS -->
                </select>
            </label>
        </div>
        <div class="form-group">
            <label>Province<select id="province" class="form-control" onchange="populateCities()" name="province">
                    <option value="Ontario">Ontario</option>
                    <option value="Quebec">Quebec</option>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label>Postal Code<input type="text" class="form-control" name="postal_code" placeholder="H4L 3X9"></label>
        </div>
        <input type="submit" class="userBtn" name="button" value="Save Location">
    </form>
    </div>

    </body>
</html>