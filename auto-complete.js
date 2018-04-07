let MIN_LENGTH = 1;

document.getElementById("keyword").onkeyup = function () {
    sendRequest()
};

let calculate = document.getElementById("calculate");
let weightType = document.getElementById("weightType");
let weight = document.getElementById("weight");
let worth = document.getElementById("worth");
let quantity = document.getElementById("quantity");
let results = $("results");

function clearFields() {
    $('#results').fadeOut(0);
    weight.innerHTML = "Weight : ";
    worth.innerHTML = "Worth : $";
    quantity.innerHTML = "Quantity : ";
}

function sendRequest() {

    let x = document.getElementById("keyword").value;

    // clear the default fields
    clearFields();

    // check if length is less than minimum
    if (x.length < MIN_LENGTH) {
        results.hide();
        return true;
    }

    // send the ajax request
    $.get(
        "calculate.php",
        {keyword: x, weightType: weightType.value, calculate: calculate.value},
        function (data) {
            // parse the data to JSON
            let results = jQuery.parseJSON(data);

            // loop throw each query
            $(results).each(function (key, value) {
                $(value).each(function (key1, value1) {
                    $(value1).each(function (key2, value2) {
                        weight.append(value2['weight'] + " " + value2['weightType'] + '/s');
                        worth.append(value2['worth']);
                        quantity.append(value2['quantity']);
                        $('#results').fadeIn(0);
                    });
                });
            });
        }
    );
}
