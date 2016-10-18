app.controller('userCtrl', function($scope, $modal, $filter, Data) {
    $scope.user = {};
    console.log($scope.userSession);
    Data.get('user/' + $scope.userSession).then(function(data) {
        $scope.user = data.data;
        console.log($scope.user);

    });

    $scope.deleteuser = function(user) {
        if (confirm("Are you sure to remove the user")) {
            Data.delete("users/" + user.id).then(function(result) {
                $scope.users = _.without($scope.users, _.findWhere($scope.users, { id: user.id }));
            });
        }
    };
    $scope.open = function(p, size) {
        var modalInstance = $modal.open({
            templateUrl: 'partials/userEdit.html',
            controller: 'usertEditCtrl',
            size: size,
            resolve: {
                item: function() {
                    return p;
                }
            }
        });
        modalInstance.result.then(function(selectedObject) {
            if (selectedObject.save == "insert") {
                $scope.students.push(selectedObject);
                $scope.students = $filter('orderBy')($scope.students, 'id', 'reverse');
            } else if (selectedObject.save == "update") {
                p.userName = selectedObject.userName;
                p.category = selectedObject.category;
                p.userEmail = selectedObject.userEmail;
                p.address = selectedObject.address;
                p.dob = selectedObject.dob;
                p.phone = selectedObject.phone;
                p.gender = selectedObject.gender;
                p.city = selectedObject.city;
                p.country = selectedObject.country;
                p.pin = selectedObject.pin;
            }
        });
    };
});


app.controller('usertEditCtrl', function($scope, $modalInstance, Upload, $timeout, item, Data) {

    $scope.user = angular.copy(item);

    $scope.uploadPic = function(file) {
        console.log("Something is happening.");
        file.upload = Upload.upload({
            url: 'http://localhost/api/image_upload.php',
            method: 'POST',
            sendFieldsAs: 'form',
            fields: { name: $scope.event.id, type: "user" },
            file: file
        });

        file.upload.then(function(response) {
            $timeout(function() {
                file.result = response.data;
            });
        }, function(response) {
            if (response.status > 0)
                $scope.errorMsg = response.status + ': ' + response.data;
        });

        file.upload.progress(function(evt) {
            // Math.min is to fix IE which reports 200% sometimes
            file.progress = Math.min(100, parseInt(100.0 * evt.loaded / evt.total));
        });
    };


    $scope.cancel = function() {
        $modalInstance.dismiss('Close');
    };
    $scope.title = (item.userID > 0) ? 'Edit user' : 'Add user';
    $scope.buttonText = (item.userID > 0) ? 'Update details' : 'Add New user';

    var original = item;
    $scope.isClean = function() {
        return angular.equals(original, $scope.user);
    }
    $scope.saveuser = function(user) {
        user.uid = $scope.uid;
        console.log(user);
        if (user.userID > 0) {
            Data.put('users/' + user.userID, user).then(function(result) {
                if (result.status != 'error') {
                    var x = angular.copy(user);
                    x.save = 'update';
                    $modalInstance.close(x);
                } else {
                    console.log(result);
                }
            });
        } else {
            Data.post('users', user).then(function(result) {
                if (result.status != 'error') {
                    var x = angular.copy(user);
                    x.save = 'insert';
                    x.userID = result.data;
                    $modalInstance.close(x);
                } else {
                    console.log(result);
                }
            });
        }
    };
});
