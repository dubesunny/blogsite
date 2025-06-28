$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $('.select2').select2();
    $('.summernote').summernote({
        height: 150
    });

    $('.dropify').dropify();
    /** Open Modal */
    $(document).on("click", ".openModal", function (e) {
        let url = $(this).attr("data-url");
        let title = $(this).attr("data-title");
        $.ajax({
            type: "GET",
            url: url,
            success: function (response) {
                $("#exampleModal").modal("show");
                $(".modal-title").text(title);
                $(".modal-body").html(response);
            },
        });
    });

    /**
     * Form add or edit handler
     */
    $(document).on("click", ".formHandler", function (e) {
        e.preventDefault();
        let type = $(this).attr("data-type");
        let url = $(this).attr("data-url");
        const data = $("#form").serialize();
        $("[name]").removeClass("is-invalid");
        $(".error-message").text("");

        $.ajax({
            type: type,
            url: url,
            data: data,
            success: function (response) {
                toastr.success(response.success);
                $("#form")[0].reset();
                $("#exampleModal").modal("hide");
                $("#dataTable").load(location.href + " #dataTable");
            },
            error: function (xhr) {
                if (xhr.status == 422) {
                    let errors = xhr.responseJSON.errors;
                    $.each(errors, function (field, message) {
                        let input = $('[name="' + field + '"]');
                        input.addClass("is-invalid");
                        input
                            .closest(".col")
                            .find(".error-message")
                            .text(message[0]);
                    });
                }
            },
        });
    });

    $(document).on("click", ".deleteHandler", function () {
        let url = $(this).attr("data-url");
        $.ajax({
            type: "DELETE",
            url: url,
            success: function (response) {
                toastr.success(response.success);
                $("#dataTable").load(location.href + " #dataTable");
            },
        });
    });
});
