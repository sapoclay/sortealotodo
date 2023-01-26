var rdraw, ticket_id;
$(document).ready(function () {
    const ticketModal = $("#ticketModal");

    $("#new_ticket").click(function () {
        ticketModal.find(".modal-title").text("Añadir Ticket");
        ticketModal.modal("show");
    });
    ticketModal.on("hide.bs.modal", function (e) {
        $("#ticketForm")[0].reset();
        ticketModal.find(".modal-title").text("");
        ticketModal.find("input:hidden").val("");
    });

    // Guardar ticket
    $("#ticketForm").submit(function (e) {
        e.preventDefault();
        const form = $(this);
        const modal = $("#ticketModal");
        const button = form.find("button");
        const alert = form.find(".alert");
        const msg = $("<div>").hide().addClass("rounded-0 alert");

        button.attr("disabled", true);
        alert.remove();

        $.ajax({
            url: "guardar_ticket.php",
            method: "POST",
            data: form.serialize(),
            dataType: "json",
        })
            .done(function (resp) {
                if (resp.status === "success") {
                    location.replace("./?page=tickets");
                } else {
                    msg.addClass("alert-danger");
                    msg.text(
                        resp.error || "Ocurrió un error en el servidor al guardar el ticket"
                    );
                }
                if (msg.text()) {
                    form.prepend(msg);
                    msg.show("slideDown");
                }
            })
            .fail(function (err) {
                console.error(err);
                msg.text("Ocurrió un error guardando el ticket");
                msg.addClass("alert-danger");
                form.prepend(msg);
                msg.show("slideDown");
            })
            .always(function () {
                button.attr("disabled", false);
            });
    });

    // Editar ticket
    $(".edit_ticket").click(function (e) {
        e.preventDefault();
        const modal = $("#ticketModal");
        const id = $(this).attr("data-id");
        const data = { id: id };

        $.ajax({
            url: "obtener_ticket.php",
            method: "POST",
            data: data,
            dataType: "json",
        })
            .done(function (resp) {
                if (resp.status) {
                    modal.find('input[name="id"]').val(resp.data.id);
                    modal.find('input[name="code"]').val(resp.data.code);
                    modal.find('input[name="name"]').val(resp.data.name);

                    modal.find(".modal-title").text("Editar Ticket");
                    modal.modal("show");
                } else {
                    alert(
                        "Ocurrió un error en el servidor al obtener los datos de este ticket"
                    );
                }
            })
            .fail(function (err) {
                alert("Ocurrió un error obteniendo la información del ticket");
                console.error(err);
            });
    });

    // Borrar ticket
    $(".delete_ticket").click(function (e) {
        e.preventDefault();
        const id = $(this).attr("data-id");

        if (confirm("¿Quieres eliminar este ticket?") === true) {
            const data = { id: id };

            $.ajax({
                url: "borrar_ticket.php",
                method: "POST",
                data: data,
                dataType: "json",
            })
                .done(function (resp) {
                    if (resp.status) {
                        location.reload();
                    } else {
                        alert("Fallo en el servidor al la hora de eliminar el ticket");
                        console.error(resp);
                    }
                })
                .fail(function (err) {
                    alert("El proceso de eliminación falló por un error desconocido");
                    console.error(err);
                });
        }
    });

    // Sorteo
    const draw = async () => {
        var totalTickets = $(".ticket-item").length;
        var pick = Math.ceil(Math.random() * totalTickets);

        for (var ii = 0; ii < 3; ii++) {
            for (var i = 1; i <= totalTickets; i++) {
                var _i = i > totalTickets ? i - totalTickets : i;
                var _scroll = $(`.ticket-item:nth-child(${_i})`)[0].offsetLeft;
                $("#ticket-list")[0].scrollLeft = _scroll - 350;
                $(".highlight-item").removeClass("highlight-item");
                $(`.ticket-item:nth-child(${_i})`).addClass("highlight-item");
                await new Promise((resolve) => setTimeout(resolve, 100));
            }
        }

        for (var i = 1; i <= pick; i++) {
            var _i = i > totalTickets ? i - totalTickets : i;
            var _scroll = $(`.ticket-item:nth-child(${_i})`)[0].offsetLeft;
            $("#ticket-list")[0].scrollLeft = _scroll - 350;
            $(".highlight-item").removeClass("highlight-item");
            $(`.ticket-item:nth-child(${_i})`).addClass("highlight-item");
            await new Promise((resolve) => setTimeout(resolve, 300));
        }

        var item = $(`.ticket-item.highlight-item`);
        ticket_id = item.attr("data-id");
        var win_modal = $("#winnerModal");
        rdraw = $("#rdraw").val();
        var draw_text = $("#draw_text").val();
        win_modal.find("#winner").html(item.find(".item-name").text());
        win_modal.find("#winner_code").html(item.find(".item-code").text());
        win_modal.find("#draw_winner").text(draw_text);
        win_modal.modal("show");
    };

    $("#draw").click(function () {
        draw();
    });

    // Ventana modal del sorteo
    $("#winnerModal").on("hide.bs.modal", function (e) {
        e.preventDefault();
        const button = $(this).find("button");
        button.attr("disabled", true);

        const data = { ticket_id: ticket_id, draw: rdraw };

        $.ajax({
            url: "guardar_ganador.php",
            method: "POST",
            data: data,
            dataType: "json",
        })
            .done(function (resp) {
                if (resp.status) {
                    location.reload();
                } else {
                    alert(
                        resp.error ||
                        "Se ha producido un error en el servidor al guardar la información sobre el ganador"
                    );
                }
            })
            .fail(function (err) {
                alert("Sin poder guardar información del ganador");
                console.error(err);
            })
            .always(function () {
                button.attr("disabled", false);
            });
    });

    // Borrado de la tabla winners
    $(document).ready(function () {
        $("#delete-all-winners").click(function (e) {
            e.preventDefault();
            if (confirm("¿Estás seguro de eliminar todos los ganadores?")) {
                $.ajax({
                    type: "POST",
                    url: "borrar_ganadores.php",
                    dataType: "json",
                    success: function (response) {
                        if (response.status === "success") {
                            location.replace("./?page=winners");
                        } else {
                            alert(
                                response.error ||
                                "Error en el servidor al eliminar los ganadores"
                            );
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                        alert("Error al eliminar los registros de los ganadores");
                    },
                });
            }
        });
    });

    const exclude_winners = document.querySelector("#exclude_winners");
    if (exclude_winners) {
        exclude_winners.addEventListener("change", (e) => {
            if (e.target.checked) {
                location.replace("./");
            } else {
                location.replace("./?include_winners");
            }
        });
    }
});
