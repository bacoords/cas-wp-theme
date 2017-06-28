

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
		var shipping = $scope.totalShipping()
		var total = shipping + price;
		return total;
	}
	$scope.totalSaved = function(){
		var price = 0;
		for (i = 0; i < $scope.items.length; i++) {
			if($scope.items[i][2]){
				if ($scope.items[i][2][0].type == 'discount'){
					price += $scope.items[i][2][0].price;
				}
			}
		}

		return price;
	}
	
	$scope.totalShipping = function(){
		var shipping = 0;
		for (i = 0; i < $scope.items.length; i++) {
			for(j = 0; j < $scope.items[i].length; j++){
				if($scope.items[i][j][0].type == 'extra'){
					shipping += 5.45;
				}
				if($scope.items[i][j][0].type == 'poster' || $scope.items[i][j][0].type == 'program'){
					if($scope.items[i][j][0].subtitle == '3 Seasons'){
						shipping += (5.45 * 3);
					} else if($scope.items[i][j][0].subtitle == '2 Seasons'){
						shipping += (5.45 * 2);
					} else {
						shipping += 5.45;
					}
				}
			}
		}
		
		return shipping;
	}
	
	$scope.emptyCart = function() {
		var e = confirm("Remove all items from your cart?");
		if(e == true){
				Lockr.rm('CASCart');
				$scope.items = [];
		}
	}
	
	$scope.stringList = function(){
		var s = '<br>================<BR><BR>';
		for(i = 0; i < $scope.items.length; i++){
			s += "School: " + $scope.items[i][0][0].school + "......$" +  $scope.items[i][0][0].total + "<br>";
			for(j = 1; j < $scope.items[i].length; j++){
				if($scope.items[i][j][0].type == 'discount'){
					s += "--Seasons:" + $scope.items[i][j][0].subtitle + "........$" + $scope.items[i][j][0].price + "<BR>";
				}else{
					s += "--Product:" + $scope.items[i][j][0].name + "(" + $scope.items[i][j][0].subtitle  + ")" + "........$" + $scope.items[i][j][0].price + "<br>";
				}
			}
			s += "===============<br><br>";			
		}
		s += "Final Price Charged: $" + $scope.totalPrice();
		return s;
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
