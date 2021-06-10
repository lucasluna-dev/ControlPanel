$(document).ready(function() {

    $('.container-poup ').magnificPopup({
        delegate: 'a', // child items selector, by clicking on it popup will open
        type: 'image',gallery:{enabled:true}
        // other options
      });
});