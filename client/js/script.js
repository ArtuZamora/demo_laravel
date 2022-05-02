var baseUrl = "http://localhost:81/demo_laravel/public/api/editoriales";
var deleteId = "";

$(document).ready(function() {
    fillTable();

    // Activate tooltip
    $('[data-toggle="tooltip"]').tooltip();

    // Select/Deselect checkboxes
    var checkbox = $('table tbody input[type="checkbox"]');
    $("#selectAll").click(function() {
        if (this.checked) {
            checkbox.each(function() {
                this.checked = true;
            });
        } else {
            checkbox.each(function() {
                this.checked = false;
            });
        }
    });
    checkbox.click(function() {
        if (!this.checked) {
            $("#selectAll").prop("checked", false);
        }
    });

    //Code for CRUD
    $(".table tbody").on("click", "a.edit", function() {
        var id = $(this).attr("data-id");
        $.ajax({
            url: baseUrl + "/" + id,
            type: "GET",
            dataType: "json",
            success: function(editorial) {
                $("#editFrm input[name=id]").val(editorial.id);
                $("#editFrm input[name=codigo_editorial]").val(
                    editorial.codigo_editorial
                );
                $("#editFrm input[name=nombre_editorial]").val(
                    editorial.nombre_editorial
                );
                $("#editFrm input[name=contacto]").val(editorial.contacto);
                $("#editFrm input[name=telefono]").val(editorial.telefono);
            },
        });
    });
    $(".table tbody").on("click", "a.delete", function() {
        deleteId = $(this).attr("data-id");
    });
    $("#createFrm").on("submit", function(event) {
        event.preventDefault();
        var codigo_editorial = $("#createFrm input[name=codigo_editorial]").val();
        var nombre_editorial = $("#createFrm input[name=nombre_editorial]").val();
        var contacto = $("#createFrm input[name=contacto]").val();
        var telefono = $("#createFrm input[name=telefono]").val();
        var editorialObj = new editorial(null, codigo_editorial, nombre_editorial, contacto, telefono);
        $.ajax({
            url: baseUrl,
            type: "POST",
            data: editorialObj,
            dataType: "json",
            success: function(response) {
                $("#addEmployeeModal").modal("hide");
                Swal.fire(
                    "Enhorabuena",
                    "El registro se creó correctamente",
                    "success"
                )
                $('#createFrm input').val("");
                fillTable();
            },
            error: function(response) {
                if (response.status == 200) {
                    $("#addEmployeeModal").modal("hide");
                    Swal.fire(
                        "Enhorabuena",
                        "El registro se creó correctamente",
                        "success"
                    )
                    $('#createFrm input').val("");
                    fillTable();
                } else {
                    Swal.fire(
                        "Error",
                        "El registro no pudo ser creado",
                        "error"
                    );
                }
            }
        });
    });
    $("#editFrm").on("submit", function(event) {
        event.preventDefault();
        var id = $("#editFrm input[name=id]").val();
        var codigo_editorial = $("#editFrm input[name=codigo_editorial]").val();
        var nombre_editorial = $("#editFrm input[name=nombre_editorial]").val();
        var contacto = $("#editFrm input[name=contacto]").val();
        var telefono = $("#editFrm input[name=telefono]").val();
        var editorialObj = new editorial(id, codigo_editorial, nombre_editorial, contacto, telefono);
        $.ajax({
            url: baseUrl,
            type: "PUT",
            data: editorialObj,
            dataType: "json",
            success: function() {
                $("#editEmployeeModal").modal("hide");
                Swal.fire(
                    "Enhorabuena",
                    "El registro se edito correctamente",
                    "success"
                )
                fillTable();
            },
            error: function() {
                Swal.fire(
                    "Error",
                    "El registro no pudo ser editado",
                    "error"
                );
            }
        });
    });
    $("#deleteFrm").on("submit", function(event) {
        event.preventDefault();
        $.ajax({
            url: baseUrl + "/" + deleteId,
            type: "DELETE",
            dataType: "json",
            success: function(response) {
                $("#deleteEmployeeModal").modal("hide");
                if (response == 1)
                    Swal.fire(
                        "Enhorabuena",
                        "El registro se elimino correctamente",
                        "success"
                    ).then(function() {
                        fillTable();
                    });
                else
                    Swal.fire(
                        "Error",
                        "El registro no pudo ser eliminado",
                        "error"
                    );
            },
        });
    });
});

function fillTable() {
    $.ajax({
        url: baseUrl,
        type: "GET",
        dataType: "json",
        success: function(editoriales) {
            $(".table tbody").html("");
            editoriales.forEach(function(editorial) {
                $(".table tbody").append(
                    "\
                <tr>\
                    <td>" +
                    editorial.codigo_editorial +
                    "</td>\
                    <td>" +
                    editorial.nombre_editorial +
                    "</td>\
                    <td>" +
                    editorial.contacto +
                    "</td>\
                    <td>" +
                    editorial.telefono +
                    '</td>\
                    <td>\
                        <a href="#editEmployeeModal" data-id="' +
                    editorial.id +
                    '" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>\
                        <a href="#deleteEmployeeModal" data-id="' +
                    editorial.id +
                    '" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>\
                    </td>\
                </tr>'
                );
            });
        },
    });
}

function editorial(id, codigo_editorial, nombre_editorial, contacto, telefono) {
    return {
        id: id,
        codigo_editorial: codigo_editorial,
        nombre_editorial: nombre_editorial,
        contacto: contacto,
        telefono: telefono,
    };
}