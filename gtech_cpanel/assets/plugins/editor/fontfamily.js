if (!RedactorPlugins)
     var RedactorPlugins = {};

(function ($)
{
     RedactorPlugins.fontfamily = function ()
     {
          return {
               init: function ()
               {
                    //var fonts = ['Arial', 'Helvetica', 'Georgia', 'Times New Roman', 'Monospace', 'Diwani', 'Kufi', 'Naskh', 'Thuluth', 'Maghribi','Alhambra','Arabicsans'];
                    var fonts = ['Arial', 'Helvetica', 'Georgia', 'Times New Roman','Nskad', 'V_Badrt', 'V_Class1-b', 'V_Kamran_Tarkibi-ri', 'dijad', 'diva1k'];
                    var that = this;
                    var dropdown = {};

                    $.each(fonts, function (i, s)
                    {
                         dropdown['s' + i] = {title: s, func: function () {
                                   that.fontfamily.set(s);
                              }};
                    });
                    dropdown.remove = {title: 'Remove Font Family', func: that.fontfamily.reset};
                    var button = this.button.add('fontfamily', 'Change font family');
                    this.button.addDropdown(button, dropdown);
               },
               set: function (value)
               {
                    this.inline.format('span', 'style', 'font-family:' + value + ';');
               },
               reset: function ()
               {
                    this.inline.removeStyleRule('font-family');
               }
          };
     };
})(jQuery);