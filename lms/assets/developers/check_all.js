 $("#checker").bind("click", function() {
    var toggleState = !! jQuery.data(this, "togglestate");

    $(document.myform.arr_ids[]).each(function() {
        this.checked = !toggleState;
    });


    $(this).text(toggleState ? "Check All" : "UnCheck All");
    jQuery.data(this, "togglestate", !toggleState);
});

$(document.myform).delegate("input[name=arr_ids[]]", "change", function() {
    var curState, prevState, fullStateChange = true;
    $(document.myform.arr_ids[]).each(function() {
        curState = this.checked;

        if (prevState != null && prevState !== curState) {
            fullStateChange = false;
        }

        prevState = curState;
    });

    if (!fullStateChange) {
        return;
    }

    $("#checker").data("togglestate", curState).text( !curState ? "Check All" : "UnCheck All");




});

$(document.myform.arr_ids[]).trigger("change");