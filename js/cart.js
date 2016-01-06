

angular.module('cartApp', [])
 .config(['$provide', function($provide) {
		$provide.decorator('$locale', ['$delegate', function($delegate) {
			if($delegate.id == 'en-us') {
				$delegate.NUMBER_FORMATS.PATTERNS[1].negPre = '-\u00A4';
				$delegate.NUMBER_FORMATS.PATTERNS[1].negSuf = '';
			}
			return $delegate;
		}]);
	}])
.controller('CartCtrl', function($scope) {
	$scope.showform = false
	$scope.items = null;
	$scope.items = Lockr.get('CASCart');
	$scope.totalPrice = function(){
		var price = 0;
		for (i = 0; i < $scope.items.length; i++) { 
				price += $scope.items[i][0][0].total;
		}

		return price;
	}
	$scope.totalSaved = function(){
		var price = 0;
		for (i = 0; i < $scope.items.length; i++) {
				if ($scope.items[i][2][0].type == 'discount'){
					price += $scope.items[i][2][0].price;
				}
		}

		return price;
	}
	$scope.removeItem = function(cindex, pindex, type){
		var c = confirm("Remove this item from your cart?")
		if(c == true){
			//Removes from cart::
// 			$scope.items[pindex].splice(cindex,1);
			
			//Needs to remove discount if necessary
			if(type == "discount") {
				var z = cindex - 1;
				$scope.items[pindex].splice(z,2);	
	 		} else if (type == 'poster' || type == 'program'){
				$scope.items[pindex].splice(cindex,2);	
			} else if (type == 'extra'){
				$scope.items[pindex].splice(cindex,1);
			}
			//Needs to delete entire school if necessary
			if($scope.items[pindex].length == 1){
				$scope.items.splice(pindex, 1);
			} else {   //Else Needs to recalculate price
				var p = 0;
				for (i = 1; i < $scope.items[pindex].length; i++) {
// 					if ($scope.items[pindex][i][0].type != 'discount'){
						p += $scope.items[pindex][i][0].price;
// 					} else if ($scope.items[pindex][i][0].type == 'discount'){
// 						p -= $scope.items[pindex][i][0].price;
// 					}
				}
				$scope.items[pindex][0][0].total = p;
			}
			
			
			
			//Stores new cart
			Lockr.rm('CASCart');
			if($scope.items.length > 0){
				Lockr.set('CASCart', $scope.items);
			}
		}
	}
});
