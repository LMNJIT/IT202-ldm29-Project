// call when resest button pressed; just sets text to "" 
function reset() {
    $("#code").next().text("");
    $("#name").next().text("");
    $("#description").next().text("");
    $("#price").next().text("");
    $("#stock").next().text("");
}

$(document).ready( (event) => {
    $("#code").focus();

    $("#create_products_form").submit( () => {
        let isValid = true;

        const productcode = $("#code").val();
        if (productcode == "") {
            $("#code").val("This field is required.");
            isValid = false;
        } else if (productcode.length < 4) {
            $("#code").val("Must be 4 characters or more.");
            isValid = false;
        } else if (productcode.length > 10) {
            $("#code").val("Must not exceed 10 characters.");
            isValid = false;
        } else {
            $("#code").val("");
        }

        const name = $("#name").val();
        if (name == "") {
            $("#name").val("This field is required.");
            isValid = false;
        } else if (name.length < 10) {
            $("#name").val("Must be 10 characters or more.");
            isValid = false;
        } else if (name.length > 100) {
            $("#name").val("Must not exceed 100 characters.");
            isValid = false;
        } else {
            $("#name").val("");
        }

        const description = $("#description").val();
        if (description == "") {
            $("#description").val("");
            isValid = false;
        } else if (description.length < 10) {
            $("#description").val("Must be 10 characters or more.");
            isValid = false;
        } else if (description.length > 255) {
            $("#description").val("Must not exceed 255 characters.");
            isValid = false;
        } else {
            $("#description").val("");
        }

        const price = $("#price").val();
        if (!price) {
            $("#price").val("This field is required.");
            isValid = false;
        } else if (price < 0) {
            $("#price").val("Must be a positive number.");
            isValid = false;
        } else if (price == 0) {
            $("#price").val("Must not be 0.");
            isValid = false;
        } else if (price > 100000) {
            $("#price").val("Must not exceed 100,000");
            isValid = false;
        } else {
            $("#price").val("");
        }

        if (isValid == false) {
            event.preventDefault();
        } 
    });
});