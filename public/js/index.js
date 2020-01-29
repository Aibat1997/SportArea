$(".btn-dash").on("click", function() {
    var answer = $(".hidden-labels");
    $(".hidden-labels")
        .not(answer)
        .slideUp(400);
    answer.slideToggle(400);
    $(this)
        .find(".fa-chevron-down")
        .toggleClass("arrow-up");
});
$(".select").on("click", function() {
    $(".arrow-select").toggleClass("arrow-up");
});
$("#ex1").slider({
    formatter: function(value) {
        return value + " лет";
    }
});

$("#send_code").click(function(e) {
    e.preventDefault();
    axios
        .post("/register", {
            user_firstname: $('input[name=user_firstname]').val(),
            phone: $('.reg_phone').val(),
        })
        .then(function(response) {
            $('#show_sms_code').html(response.data);
        });
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $("#blah").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function() {
    readURL(this);
});
