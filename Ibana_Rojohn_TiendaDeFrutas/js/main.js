function asyncFilter(id, filters) {
    let queryParams = "";

    for (const filter of filters) {
        queryParams += `${filter}=${document.getElementById(filter)}.value&`;
    }

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("container").innerHTML = this.responseText;
        }
    }

    xmlhttp.open("POST", `php/${id}.php`, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(queryParams);
}

function asyncFilterFruta() {
    asyncFilter("fruta", [
        "nombre",
        "temporada",
        "precio",
    ])
}

function asyncFilterEmpleado() {
    asyncFilter("empleado", [
        "nif",
        "nombre",
        "edad",
        "cargo",
        "sueldo",
    ])
}

function asyncFilterCliente() {
    asyncFilter("cliente", [
        "nif",
        "nombre",
        "edad",
        "pais",
        "ciudad",
    ])
}

function asyncFilterVenta() {
    let queryParams = "";

    const filters = [
        "factura",
        "empleado",
        "cliente",
        "fruta",
    ];

    for (const filter of filters) {
        console.log(document.getElementById(filter).value)
        queryParams += `${filter}=${document.getElementById(filter).value}&`;
    }

    $.ajax({
        type: "GET",
        url: `ventaFilter.php`,
        data: queryParams,
        success: function(response) {
            document.getElementById("container").innerHTML = response;
        }
    })
}
