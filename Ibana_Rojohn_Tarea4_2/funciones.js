function asyncCalculateSquare() {
    $.ajax({
        type: "POST",
        url: "pagina.php",
        data: `num=${document.getElementById("num").value}`,
        cache: false,
        success: function(response) {
            document.getElementById("container").textContent = response;
        }
    })
}
