/*
|--------------------------------------------------------------------------
| resources/js/admin.js *** Copyright netprogs.pl | available only at Udemy.com | further distribution is prohibited  ***
|--------------------------------------------------------------------------
*/

/* Lecture 30 */
var Ajax = {
  get: function get(url, _success) {
    var data = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : null;

    var _beforeSend = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : null;

    $.ajax({
      cache: false,
      url: base_url + '/' + url,
      type: "GET",
      data: data,
      success: function success(response) {
        App[_success](response);
      },
      beforeSend: function beforeSend() {
        if (_beforeSend) App[_beforeSend]();
      }
    });
  }
};
/* Lecture 30 */

var App = {
  GetReservationData: function GetReservationData(id, date) {
    Ajax.get('ajaxGetReservationData', 'AfterGetReservationData', {
      room_id: id,
      date: date
    }, 'BeforeGetReservationData');
  },
  BeforeGetReservationData: function BeforeGetReservationData() {},
  AfterGetReservationData: function AfterGetReservationData(response) {}
};
