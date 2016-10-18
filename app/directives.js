app.directive('formElement', function() {
    return {
        restrict: 'E',
        transclude: true,
        scope: {
            label: "@",
            model: "="
        },
        link: function(scope, element, attrs) {
            scope.disabled = attrs.hasOwnProperty('disabled');
            scope.required = attrs.hasOwnProperty('required');
            scope.pattern = attrs.pattern || '.*';
        },
        template: '<div class="form-group"><label class="col-sm-3 control-label no-padding-right" >  {{label}}</label><div class="col-sm-7"><span class="block input-icon input-icon-right" ng-transclude></span></div></div>'
    };

});

app.directive('onlyNumbers', function() {
    return function(scope, element, attrs) {
        var keyCode = [8, 9, 13, 37, 39, 46, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 110, 190];
        element.bind("keydown", function(event) {
            if ($.inArray(event.which, keyCode) == -1) {
                scope.$apply(function() {
                    scope.$eval(attrs.onlyNum);
                    event.preventDefault();
                });
                event.preventDefault();
            }

        });
    };
});

app.directive('focus', function() {
    return function(scope, element) {
        element[0].focus();
    }
});

app.directive('animateOnChange', function($animate) {
    return function(scope, elem, attr) {
        scope.$watch(attr.animateOnChange, function(nv, ov) {
            if (nv != ov) {
                var c = 'change-up';
                $animate.addClass(elem, c, function() {
                    $animate.removeClass(elem, c);
                });
            }
        });
    }
});

app.directive('toggle', function() {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            if (attrs.toggle == "tooltip") {
                $(element).tooltip();
            }
            if (attrs.toggle == "popover") {
                $(element).popover();
            }
        }
    };
});

app.directive('fileModel', ['$parse', function($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.fileModel);
            var modelSetter = model.assign;

            element.bind('change', function() {
                scope.$apply(function() {
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);


app.service('fileUpload', ['$http', function($http) {
    this.uploadFileToUrl = function(file, uploadUrl, name) {
        var fd = new FormData();
        fd.append('file', file);
        fd.append('name', name);
        $http.post(uploadUrl, fd, {
                transformRequest: angular.identity,
                headers: { 'Content-Type': undefined, 'Process-Data': false }
            })
            .success(function() {
                console.log("Success");
            })
            .error(function() {
                console.log("Success");
            });
    }
}]);
