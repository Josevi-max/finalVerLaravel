$("input").change(function() {
    if (this.value < 1) {
        this.value = 1;
    }
});

$("#buy").click(function() {
    var value = $(".form-control").val() * 29;
    return confirm("Estas a punto de hacer una compra de " + value + " €");
});