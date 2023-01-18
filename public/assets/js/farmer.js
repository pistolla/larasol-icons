$(function () {

    $("#btn_add_farmer").click(function () {
        clearErrors();
        $("#farmer_form")[0].reset();
        $("#modal_farmer").modal();
    });


    $("#btn_add_farmer_i").click(function () {
        clearErrors();
        $("#farmer_form")[0].reset();
        //$("#img")[0].attr("src", "");
        $("#modal_farmer").modal();

    });

    $("#btn_add_farmer_p").click(function () {
        clearErrors();
        $("#farmer_form")[0].reset();
        //$("#img")[0].attr("src", "");
        $("#modal_farmer").modal();
    });


    function btn_edit_farmer() {
        $(".btn_edit_farmer").click(function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "show-farmer",
                dataType: "json",
                data: { "id": $(this).attr("id_farmer") },
                success: function (response) {
                    clearErrors();
                    $("#farmer_form_edit")[0].reset();
                    $.each(response["imput"], function (id, value) {
                        $("#" + id + "_edit").val(value);
                    });
                    $("#modal_farmer_edit").modal();
                }
            })

        });

        $(".btn_del_farmer").click(function () {
            course_id = $(this);
            Swal.fire({
                title: "Alert!",
                text: "Do you want to delete this farmer?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Yes",
                cancelButtonText: "No",
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        url: "destroy",
                        dataType: "json",
                        data: { "id": course_id.attr("id_farmer") },
                        success: function (response) {
                            $msg = "Farmer " + response["messages"] + " removed successfully!";
                            Swal.fire("Success!", $msg, "success");
                            dt_farmers.ajax.reload();
                            dt_farmers_inact.ajax.reload();
                        }
                    })
                }
            })
        });
    }
});