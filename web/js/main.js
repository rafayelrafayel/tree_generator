(function ($) {
    $(document).on('click', '.checkbox-node-class', function (e) {
        var $this = $(this);
        var is_checked = $this.is(':checked');
        var parent = $this.closest('li');
        if (is_checked) {
            checkNodes(parent);
            checkChildNodesIfNeeded($this);
        } else {
            uncheckNodes(parent);
            unCheckParentNodeIfNeeded($this);
        }
    });

    function checkNodes(_parent) {
        _parent.find(".checkbox-node-class")
                .prop('checked', true).trigger('change');
    }
    function  uncheckNodes(_parent) {
        _parent.find(".checkbox-node-class")
                .prop('checked', false).trigger('change');
    }

    function checkChildNodesIfNeeded(_this) {
        _this.parentsUntil('#id_1').siblings().filter('input:checkbox').prop('checked', true).trigger('change');
    }

    function unCheckParentNodeIfNeeded(_this)
    {
        _this.parentsUntil('#id_1').siblings().filter('input:checkbox').prop('checked', !!(_this.closest('li').siblings().children('input:checked').length)).trigger('change');
        _this.parents('li').each(function () {
            $(this).parent().find('li').each(function () {
                if ($(this).children('input').prop('checked')) {
                    checkChildNodesIfNeeded($(this))
                    //console.log($(this).text());
                }
            });


        });
       
    }

})(jQuery);