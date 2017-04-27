(function ( $ ) {

  $.fn.typeProgress = function() {

    var maxLength = this.attr('maxlength');
    if(maxLength == undefined)
    {
      console.log('Error attribute maxlength');
      return;
    }

    var currentNode = this;
    var parentNode = this.parent();

    parentNode.append('<div class="type-progress-container"><div class="type-progress" style="width: 0%"></div></div>');

    var progressContainer = parentNode.find('.type-progress-container');
    var progress = progressContainer.find('.type-progress');

    this.on('keyup focus', function(){
      var currentLength = currentNode.val().length;
      var percent = currentLength * 100 / maxLength;

      progress.css('width', percent+'%');
    });

    this.on('focus', function(){
      progressContainer.addClass('focus');
    });

    this.on('blur', function(){
      progressContainer.removeClass('focus');
    });
  };

}( jQuery ));
