$(document).ready( function() {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    let waitBtn = "<i class='fa fa-spin fa-cog'> </i> Please Wait.....";

    var hulla = new hullabaloo();

    function notify(message, type) {
        hulla.send(message, type);
    }

    $(document).on('submit', '.validate-ticket', function(e) {
        e.preventDefault();

        let _this = $(this);
        let _url = _this.attr('action');
        let _submitBtn = _this.find("button[type='submit']");
        let btnVal = _submitBtn.html();
        _submitBtn.html(waitBtn).attr('disabled','disabled');
        $.ajax({
            url:_url,
            type:"post",
            data:_this.serialize(),
            success:function(data) {
                _this.find('input[name="ticket"]').val('');
                $(".notify-message").removeClass('text-danger').addClass('text-success').html(data.message)
                $(".tickets-sold").html(data.tickets_sold);
                $(".pending-tickets").html(data.pending_tickets);
                $(".used-tickets").html(data.used_tickets);
                $(".refund-tickets").html(data.refund_tickets);
                $(".tickets-sold-price").html(data.tickets_sold_price);
                $(".pending-tickets-price").html(data.pending_tickets_price);
                $(".used-tickets-price").html(data.used_tickets_price);
                $(".refund-tickets-price").html(data.refund_tickets_price);
                notify(data.message, 'success');
            },
            error:function(data) {
                var response = data.responseJSON;
                var notifyMessageElem = $(".notify-message");
                notifyMessageElem.removeClass('text-success').addClass('text-danger');
                if (data.status === 422) {
                    console.log(response, 'res stats inside 422')
                    var errorMessage = response.message
                    if (response.errors) {
                        $.each(response.errors,function(elem,val){
                            errorMessage = val;
                        })
                    }
                    notifyMessageElem.html(errorMessage)
                    notify(errorMessage, 'danger');
                }else{
                    notifyMessageElem.html('Internal server error check connection setting');
                    notify('Internal server error check connection setting', 'danger');
                    //notify('warning','Error occurred','message')
                }
            },
            complete:function() {
                _submitBtn.html(btnVal).removeAttr('disabled');
            }
        });
        return false;
    })
});
