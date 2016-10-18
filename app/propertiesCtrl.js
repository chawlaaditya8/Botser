app.controller('propertiesCtrl', function($scope, $modal, $filter, Data) {
    $scope.property = {};
    Data.get('user/' + $scope.userSession).then(function(data) {
        $scope.user = data.data;
        Data.get('properties/' + $scope.user[0].userID).then(function(data) {
            $scope.properties = data.data;
        });
    });

    $scope.changeProductStatus = function(property) {
        property.status_u = (property.status_u == "Active" ? "Inactive" : "Active");
        Data.put("properties/" + property.id, { status_u: property.status_u });
    };

    $scope.deleteproperty = function(property) {
        if (confirm("Are you sure to remove the deal")) {
            Data.delete("properties/" + property.id).then(function(result) {
                $scope.properties = _.without($scope.properties, _.findWhere($scope.properties, { id: property.id }));
            });
        }
    };
    $scope.open = function(p, size) {
        var modalInstance = $modal.open({
            templateUrl: 'partials/propertyEdit.html',
            controller: 'propertyEditCtrl',
            size: size,
            resolve: {
                item: function() {
                    return p;
                }
            }
        });
        modalInstance.result.then(function(selectedObject) {
            if (selectedObject.save == "insert") {
                $scope.properties.push(selectedObject);
                $scope.properties = $filter('orderBy')($scope.properties, 'id', 'reverse');
            } else if (selectedObject.save == "update") {
                p.name = selectedObject.name;
                p.address = selectedObject.address;
                p.locality = selectedObject.locality;
                p.long_description = selectedObject.long_description;
                p.price = selectedObject.price;
                p.gender = selectedObject.gender;
                p.state = selectedObject.state;
                p.type = selectedObject.type;
            }
        });
    };

});


app.controller('propertyEditCtrl', function($scope, Upload, $timeout, $modalInstance, item, Data) {

    $scope.property = angular.copy(item);
    $scope.names = ["New Delhi", "Gurgaon", "Faridabad", "Ghaziabad", "Noida"];
    $scope.types = ["Skincare", "Healthcare"];

    $scope.cancel = function() {
        $modalInstance.dismiss('Close');
    };
    $scope.title = (item.id > 0) ? 'Edit deal' : 'Add deal';
    $scope.buttonText = (item.id > 0) ? 'Update deal' : 'Add New deal';

    var original = item;
    $scope.isClean = function() {
        return angular.equals(original, $scope.property);
    }
    $scope.uploadPic = function(file) {
        var parts = file.name.split(".");
        var result = parts[parts.length - 1];
        var filename = $scope.property.id + "." + result;
        $scope.property.image = filename;
        file.upload = Upload.upload({
            url: 'image_upload.php',
            method: 'POST',
            sendFieldsAs: 'form',
            fields: { name: $scope.property.id },
            file: file
        });

        file.upload.then(function(response) {
            $timeout(function() {
                file.result = response.data;
            });
        }, function(response) {
            if (response.status > 0)
                $scope.errorMsg = response.status + ': ' + response.data;
        }, function(evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    };
    $scope.saveproperty = function(property) {
        // $scope.property.locality = $scope.property.locality.name;
        Data.get('user/' + $scope.userSession).then(function(data) {
            $scope.user = data.data;
            property.userid = $scope.user[0].userID;
            property.contact_person = $scope.user[0].userName;
            if (property.id > 0) {
                Data.put('properties/' + property.id, property).then(function(result) {
                    if (result.status != 'error') {
                        var x = angular.copy(property);
                        x.save = 'update';
                        console.log($scope.property);
                        $modalInstance.close(x);
                    } else {}
                });
            } else {
                property.status_u = 'Active';
                property.type = $scope.user[0].userName;
                Data.post('properties', property).then(function(result) {
                    if (result.status != 'error') {
                        var x = angular.copy(property);
                        x.save = 'insert';
                        x.id = result.data;
                        $modalInstance.close(x);
                    } else {}
                });
            }
        });
    };
});
