(function(){
    var O = O || {};

    O.types = {
        'email':/^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/,
        'text':/[a-zA-z0-9+*&^%$#@!-_ ]*/,
        'number':/[0-9]*/,
        'mobile':/[0-9]{10}/,
        'alphabets':/[a-zA-Z ]/
    };
    O.rules = [];

    O.validate = function(){
        for(var i= 0,len = O.rules.length; i<len;i++) {
            var bool = O.validateTruly(O.rules[i]);

            if(!bool)
            {
                alert(O.rules[i].display);
                return bool;
            }
        }
    };
    O.validateTruly = function(obj) {
        var value = document.getElementById(obj.id).value;
         return obj.validate.test(value);
    };
    window.O = O || {};
}());