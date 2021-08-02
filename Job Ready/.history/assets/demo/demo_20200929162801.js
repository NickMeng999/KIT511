demo = {
  initNowUiWizard: function() {
    // Code for the Validator
    var $validator = $('.card-wizard form').validate({
      //example validator, this validator is for foem input, need to change for upload
      rules: {
        firstname: {
          required: true,
          minlength: 3
        },
        lastname: {
          required: true,
          minlength: 3
        },
        email: {
          required: true,
          minlength: 3,
        }
      },
      highlight: function(element) {
        $(element).closest('.input-group').removeClass('has-success').addClass('has-danger');
      },
      success: function(element) {
        $(element).closest('.input-group').removeClass('has-danger').addClass('has-success');
      }
    });

    // Wizard Initialization
    $('.card-wizard').bootstrapWizard({
      'tabClass': 'nav nav-pills',
      'nextSelector': '.btn-next',
      'previousSelector': '.btn-previous',
      'finishSelector': '.btn-finish',

      onNext: function(tab, navigation, index) {
        var $valid = $('.card-wizard form').valid();
        if (!$valid) {
          $validator.focusInvalid();
          return false;
        }
      },

      onFinish: function(tab, navigation, index) {
        var $wizard = navigation.closest('.card-wizard');
        $($wizard).find('.btn-previous').hide();
        $($wizard).find('.btn-finish').hide();
        $($wizard).find('.row').hide();
        $($wizard).find('.info-text').html('hello');
      },

      onInit: function(tab, navigation, index) {
        //check number of tabs and fill the entire row
        var $total = navigation.find('li').length;
        var $wizard = navigation.closest('.card-wizard');

        first_li = navigation.find('li:first-child a').html();
        $moving_div = $("<div class='moving-tab'></div>");
        $moving_div.append(first_li);
        $('.card-wizard .wizard-navigation').append($moving_div);



        refreshAnimation($wizard, index);

        $('.moving-tab').css('transition', 'transform 0s');
      },

      onTabClick: function(tab, navigation, index) {
        var $valid = $('.card-wizard form').valid();

        if (!$valid) {
          return false;
        } else {
          return true;
        }
      },

      onTabShow: function(tab, navigation, index) {
        var $total = navigation.find('li').length;
        var $current = index + 1;

        var $wizard = navigation.closest('.card-wizard');

        // If it's the last tab then hide the last button and show the finish instead
        if ($current >= $total) {
          $($wizard).find('.btn-next').hide();
          $($wizard).find('.btn-finish').show();
        } else {
          $($wizard).find('.btn-next').show();
          $($wizard).find('.btn-finish').hide();
        }

        button_text = navigation.find('li:nth-child(' + $current + ') a').html();

        setTimeout(function() {
          $('.moving-tab').html(button_text);
        }, 150);

        var checkbox = $('.footer-checkbox');

        if (!index == 0) {
          $(checkbox).css({
            'opacity': '0',
            'visibility': 'hidden',
            'position': 'absolute'
          });
        } else {
          $(checkbox).css({
            'opacity': '1',
            'visibility': 'visible'
          });
        }

        refreshAnimation($wizard, index);
      }
    });

    $(".hidden-passport").change(function() {
      if (this.files && this.files[0]) {
        $(".hidden-passport").closest('.upload-input').addClass('has-success');
        $("#passport-input").focus();
        $("#passport-input").val(this.files[0].name);
      }
    });

    $(".hidden-prepassport").change(function() {
      if (this.files && this.files[0]) {
        $(".hidden-prepassport").closest('.upload-input').addClass('has-success');
        $("#prepassport-input").val(this.files[0].name);
        $("#prepassport-input").focus();
      }
    });

    $(".hidden-photo").change(function() {
      if (this.files && this.files[0]) {
        $(".hidden-photo").closest('.upload-input').addClass('has-success');
        $("#photo-input").val(this.files[0].name);
        $("#photo-input").focus();
      }
    });
    
    $(".hidden-transcript").change(function() {
      if (this.files && this.files[0]) {
        $(".hidden-transcript").closest('.upload-input').addClass('has-success');
        $("#transcript-input").val(this.files[0].name);
        $("#transcript-input").focus();
      }
    });

    $(".hidden-employment").change(function() {
      if (this.files && this.files[0]) {
        $(".hidden-employment").closest('.upload-input').addClass('has-success');
        $("#employment-input").val(this.files[0].name);
        $("#employment-input").focus();
      }
    });

    $(".hidden-vocational").change(function() {
      if (this.files && this.files[0]) {
        $(".hidden-vocational").closest('.upload-input').addClass('has-success');
        $("#vocational-input").val(this.files[0].name);
        $("#vocational-input").focus();
      }
    });

    // Prepare the preview for profile picture
    $("#wizard-picture").change(function() {
      readURL(this);
    });

    $('[data-toggle="wizard-radio"]').click(function() {
      wizard = $(this).closest('.card-wizard');
      wizard.find('[data-toggle="wizard-radio"]').removeClass('active');
      $(this).addClass('active');
      $(wizard).find('[type="radio"]').removeAttr('checked');
      $(this).find('[type="radio"]').attr('checked', 'true');
    });

    $('[data-toggle="wizard-checkbox"]').click(function() {
      if ($(this).hasClass('active')) {
        $(this).removeClass('active');
        $(this).find('[type="checkbox"]').removeAttr('checked');
      } else {
        $(this).addClass('active');
        $(this).find('[type="checkbox"]').attr('checked', 'true');
      }
    });

    $('.set-full-height').css('height', 'auto');

    //Function to show image before upload in case of uploading photo avatar

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
          $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
        }
        reader.readAsDataURL(input.files[0]);
      }
    }

    $(window).resize(function() {
      $('.card-wizard').each(function() {
        $wizard = $(this);

        index = $wizard.bootstrapWizard('currentIndex');
        refreshAnimation($wizard, index);

        $('.moving-tab').css({
          'transition': 'transform 0s'
        });
      });
    });

    function refreshAnimation($wizard, index) {
      $total = $wizard.find('.nav li').length;
      $li_width = 100 / $total;

      total_steps = $wizard.find('.nav li').length;
      move_distance = $wizard.find('.nav').width() / total_steps;
      index_temp = index;
      vertical_level = 0;

      mobile_device = $(document).width() < 600 && $total > 3;

      if (mobile_device) {
        move_distance = $wizard.width() / 2;
        index_temp = index % 2;
        $li_width = 50;
      }

      $wizard.find('.nav li').css('width', $li_width + '%');

      step_width = move_distance;
      move_distance = move_distance * index_temp;

      if (mobile_device) {
        vertical_level = parseInt(index / 2);
        vertical_level = vertical_level * 38;
      }

      $wizard.find('.moving-tab').css('width', step_width);
      $('.moving-tab').css({
        'transform': 'translate3d(' + move_distance + 'px, ' + vertical_level + 'px, 0)',
        'transition': 'all 0.5s cubic-bezier(0.29, 1.42, 0.79, 1)'

      });
    }
  },

};