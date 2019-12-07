// Giam so luong cua chi tiet gio hang co idMobile duoc truyen vao (giam so luong 1 hang trong gio hang)
function reduceCount(idMobile) {
    var oldCount = parseInt($('.item-' + idMobile).html());
    var newCount = (oldCount > 1) ? (oldCount - 1) : 1;
    $('.item-' + idMobile).html(newCount);
}

// Tang so luong cua chi tiet gio hang co idMobile duoc truyen vao (tang so luong 1 hang trong gio hang)
function increaseCount(idMobile) {
    var oldCount = parseInt($('.item-' + idMobile).html());
    var newCount = oldCount + 1;
    $('.item-' + idMobile).html(newCount);
}

function updateGlobalCart() {
    var items = $('.idItemCart');
    var numberItems = items.length;
    for (let i = 0; i < numberItems; i++) {
        let idCartItem = parseInt(items[i].innerHTML);
        let newCountItem = parseInt($('.item-' + idCartItem)[0].innerHTML);
        $.ajax({
            url: baseurl + 'cart/updateItemCart/' + idCartItem + '/' + newCountItem, // gửi ajax đến action
            type: 'get', // chọn phương thức gửi là get
            dateType: 'text', // dữ liệu trả về dạng text
            data: {},
            success: function (result) {
            }
        });
    }
    window.location = baseurl + 'user/cart';
}

function deleteItemCart(idMobile) {
    alert('Delete item '+ idMobile + ' from cart !');
}