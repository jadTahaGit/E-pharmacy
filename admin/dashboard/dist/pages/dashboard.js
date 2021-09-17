/*
 Template Name: Zarak - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Dashboard Init
 */
$('.select2js').select2({
    placeholder: "اختر اختيار"
});
$( "#type" ).change(function() {
    if($(this).val()==2)
    {
        $('#product_discount').removeClass('none');        
        $('#items').removeClass('none');        
    }
    else{
        $('#product_discount').addClass('none');        
        $('#items').addClass('none');        
    }

});
$(document.body).on("change","#product_section",function(){
    if(this.value==2) 
    {
        $('#expire-date').removeClass('none');        
    }
    else{
        $('#expire-date').addClass('none');        
    }
    
    
});



$(document).ready(function() {
  $('#datatable').DataTable({
        dom: 'Blfrtip',lengthMenu: [ [ 25, 50, 100, -1 ], [ '25', '60', '100', 'الجميع' ] ],
        "order": [[ 0, "desc" ]],
        buttons: [
            'excelHtml5',
        ],"language": {
            "lengthMenu": "عرض _MENU_ صف فى الصفحة",
            "sSearch": "البحث",
            "zeroRecords": "لا يوجد بيانات",
            "info": "يظهر _PAGE_ من _PAGES_",
            "infoEmpty": "لا يوجد معلومات",
            "infoFiltered": "( تم التصفيه من _MAX_ صف)",
            	"oPaginate": {
		"sFirst":    	"البدايه",
		"sPrevious": 	"السابق",
		"sNext":     	"التالى",
		"sLast":     	"الاخير"
	},

        }
    } );
  $('.datatable').DataTable({
        dom: 'Blfrtip',lengthMenu: [ [ 25, 50, 100, -1 ], [ '25', '60', '100', 'الجميع' ] ],
        "order": [[ 0, "desc" ]],
        buttons: [
            'excelHtml5',
        ],"language": {
            "lengthMenu": "عرض _MENU_ صف فى الصفحة",            
            "sSearch": "البحث",
            "zeroRecords": "لا يوجد بيانات",
            "info": "يظهر _PAGE_ من _PAGES_",
            "infoEmpty": "لا يوجد بيانات",
            "infoFiltered": "( تم التصفيه من _MAX_ صف)",
            	"oPaginate": {
		"sFirst":    	"البدايه",
		"sPrevious": 	"السابق",
		"sNext":     	"التالى",
		"sLast":     	"الاخير"
	},

        }
    } );
    } );

$(function () {
    'use strict'
    $('.confirm').click(function () {
        return confirm('هل انت متأكد من حذف هذا ؟');
    });
});
if (CKEDITOR.env.ie && CKEDITOR.env.version < 9) CKEDITOR.tools.enableHtml5Elements(document);
// The trick to keep the editor in the sample quite small
// unless user specified own height.
CKEDITOR.config.height = 150;
CKEDITOR.config.width = 'auto';
var initSample = (function () {
    var wysiwygareaAvailable = isWysiwygareaAvailable()
        , isBBCodeBuiltIn = !!CKEDITOR.plugins.get('bbcode');
    return function () {
        var editorElement = CKEDITOR.document.getById('editor');
        // :(((
        if (isBBCodeBuiltIn) {
            editorElement.setHtml('Hello world!\n\n' + 'I\'m an instance of [url=https://ckeditor.com]CKEditor[/url].');
        }
        // Depending on the wysiwygarea plugin availability initialize classic or inline editor.
        if (wysiwygareaAvailable) {
            var editor = CKEDITOR.replace('editor', {
                filebrowserBrowseUrl: '/ckfinder/ckfinder.html'
                , filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
                , filebrowserWindowWidth: '1000'
                , filebrowserWindowHeight: '700'
            });
            CKFinder.setupCKEditor(editor);
        }
        else {
            editorElement.setAttribute('contenteditable', 'true');
            CKEDITOR.inline('editor');
            // TODO we can consider displaying some info box that
            // without wysiwygarea the classic editor may not work.
        }
        CKEDITOR.config.contentsLangDirection = 'rtl';
        CKEDITOR.config.extraPlugins = 'youtube';
    };

    function isWysiwygareaAvailable() {
        // If in development mode, then the wysiwygarea must be available.
        // Split REV into two strings so builder does not replace it :D.
        if (CKEDITOR.revision == ('%RE' + 'V%')) {
            return true;
        }
        return !!CKEDITOR.plugins.get('wysiwygarea');
    }
})();
if ($("#editor").length) {
    initSample();
}