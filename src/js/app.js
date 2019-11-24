 $('body').on('hidden.bs.modal', '.modal', function () {
        $(this).removeData('bs.modal');
      });