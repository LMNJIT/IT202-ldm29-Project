// call when resest button pressed; just sets text to "" 
function resetProducts() {
    $("#code").val("");
    $("#name").val("");
    $("#description").val("");
    $("#price").val("");
    $("#stock").val("");
}

$(document).ready( () => {
    $("#code").focus();

    $("#create_form").submit( () => {
        let isValid = true;

        const productcode = $("#code").val().trim();
        if (productcode === "") {
            $("#code").next().text("This field is required");
            isValid = false;
        } else if (productcode.length < 4) {
            $("#code").next().text("Must be 4 characters or more.");
            isValid = false;
        } else if (productcode.length > 10) {
            $("#code").next().text("Must not exceed 10 characters.");
            isValid = false;
        } else {
            $("#code").next().text("");
        }

        const name = $("#name").val();
        if (name == "") {
            $("#name").next().text("This field is required");
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

        const description = $("#description").text();
        if (description == "") {
            $("#description").text("This field is required.");
            isValid = false;
        } else if (description.length < 10) {
            $("#description").text("Must be 10 characters or more.");
            isValid = false;
        } else if (description.length > 255) {
            $("#description").text("Must not exceed 255 characters.");
            isValid = false;
        } else {
            $("#description").text("");
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
        } else if (isValid == true) {

        }
    });
});