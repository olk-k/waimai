+$(function () {
    $(".form-submit").Validform({
        tiptype: function (msg, o) {
            if (o.type !== 2) {
                o.obj.parents(".form-group").addClass(" has-error has-feedback ");
                o.obj.parents(".content").find(".alert-danger").removeClass("hide");
                o.obj.parents(".content").find(".alert-danger > span").text(msg);
            } else {
                o.obj.parents(".form-group").removeClass(" has-error has-feedback ");
                o.obj.parents(".content").find("[role=alert]").addClass("hide");
            }
        }, beforeSubmit: function (o) {
            $.post(o.attr("action"), o.serialize(), function (data) {
                if (data.status === 0) {
                    o.obj.parents(".content").find(".alert-danger").removeClass("hide");
                    o.obj.parents(".content").find(".alert-danger > span").text(data.info);
                } else {
                    window.location.href = data.url;
                }
            });
            return false;
        }
    });


});