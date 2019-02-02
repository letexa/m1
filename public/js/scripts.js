(function($) {
    $.fn.audio = function(method, params) {
        return audioMethods.init.apply(this, [params]);
    }

    var audioMethods = {
        
        addButton: null,
        editButton: null,
        form: null,
        is_showForm: false,
        is_edit: false,

        init: function() {
            audioMethods.addButton = $('._js_addAudioButton');
            audioMethods.editButton = $('._js_editAudioButton');
            audioMethods.form = $('._js_addAudioForm');
            
            audioMethods.addButton.off().on('click', function() {
                audioMethods.addAudio();
            });
            
            audioMethods.editButton.off().on('click', function() {
                var data = $(this).data('audio');
                audioMethods.editAudio(data);
            });
        },
        
        addAudio: function() {
            audioMethods.showForm();
        },
        
        editAudio: function(data) {
            audioMethods.is_edit = true;
            if (!audioMethods.is_showForm) {
                audioMethods.showForm();
                audioMethods.form.find($('[type=submit]')).html('Сохранить');
            }
            if (data) {
                $.each(data, function(i, val) {
                    $('[name='+i+']').val(val);
                });
            }
        },
        
        showForm: function() {
            if (audioMethods.form.hasClass('d-none')) {
                audioMethods.form.addClass('d-block');
                audioMethods.form.removeClass('d-none');
                audioMethods.addButton.html('Скрыть');
                audioMethods.addButton.removeClass('btn-primary')
                audioMethods.addButton.addClass('btn-secondary');
                audioMethods.is_showForm = true;
            } else {
                audioMethods.form.addClass('d-none');
                audioMethods.form.removeClass('d-block');
                audioMethods.addButton.html('Добавить альбом');
                audioMethods.addButton.removeClass('btn-secondary')
                audioMethods.addButton.addClass('btn-primary');
                audioMethods.form.find($('[type=submit]')).html('Создать');
                audioMethods.is_showForm = false;
                if (audioMethods.is_edit) {
                    audioMethods.is_edit = false;
                    audioMethods.form.find('input').val('');
                }
                
            }
        }
    }
})(jQuery);


