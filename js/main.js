jQuery(document).ready(function() {

	jQuery('.sticky').Stickyfill();
	jQuery('.sponsor-form-link').click(function() {
			jQuery('.row-schools-sponsor-form').fadeIn(500);
			jQuery('.row-schools-invoice-form').hide();
		});

////			Ad size
	jQuery('.adb-ad-size > li').click(function(){
			jQuery('.adb-ad-size > li').removeClass('ui-selected');
//					jQuery('.adb-summary > li').remove('')
			jQuery(this).addClass('ui-selected');

	});

});


angular.module('orderApp', [])
.factory('PosterFactory', function(){
	var posters = [
		{
			size:"18 x 4 Sponsorship",
			priceone:1975,
			discounttwo:425,
			discountthree:1025,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/block-18-4.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/posters/18x4-Preview.jpg"
		},
		{
			size:"18 x 2 Sponsorship",
			priceone:1275,
			discounttwo:250,
			discountthree:625,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/block-18-2.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/posters/18x2-Preview.jpg"
		},
		{
			size:"6 x 4 Sponsorship",
			priceone:845,
			discounttwo:100,
			discountthree:235,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/block-6-4.2.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/posters/6x4-Preview.jpg"
		},
		{
			size:"4 x 4 Sponsorship",
			priceone:645,
			discounttwo:100,
			discountthree:235,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/block-4-4.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/posters/4x4-Preview.jpg"
		},
		{
			size:"6 x 6 Sponsorship",
			priceone:1275,
			discounttwo:250,
			discountthree:625,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/block-6-6.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/posters/6x6-Preview.jpg"
		},
		{
			size:"6 x 8 Sponsorship",
			priceone:1575,
			discounttwo:350,
			discountthree:825,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/block-6-8.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/posters/6x8-Preview.jpg"
		},
		{
			size:"3 x 2 Sponsorship",
			priceone:375,
			discounttwo:60,
			discountthree:150,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/block-3-2.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/posters/3x2-Preview.jpg"
		},
		{
			size:"2 x 2 Sponsorship",
			priceone:245,
			discounttwo:50,
			discountthree:135,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/block-2-2.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/posters/2x2-Preview.jpg"
		},
		{
			size:"4 x 2 Sponsorship",
			priceone:445,
			discounttwo:100,
			discountthree:235,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/block-4-2.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/posters/4x2-Preview.jpg"
		}
	]
	return {
		all: function(){
			return posters;
		}
	};
})
.factory('ProgramFactory', function(){
	var programs = [
		{
			size:"1/2 Page Sponsorship",
			priceone:645,
			discounttwo:100,
			discountthree:235,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/1-2.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/1-2PagePreview.jpg",
			mc: 0
		},
		{
			size:"Full Page Sponsorship",
			priceone:845,
			discounttwo:100,
			discountthree:235,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/full.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/FullPagePreview.jpg",
			mc: 3
		},
		{
			size:"1/16 Page Sponsorship",
			priceone:245,
			discounttwo:50,
			discountthree:135,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/1-16.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/1-16PagePreview.jpg",
			mc: 0
		},
		{
			size:"1/8 Page Sponsorship",
			priceone:375,
			discounttwo:60,
			discountthree:150,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/1-8.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/1-8PagePreview.jpg",
			mc: 0
		},
		{
			size:"1/4 Page Sponsorship",
			priceone:445,
			discounttwo:100,
			discountthree:235,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/1-4.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/1-4PagePreview.jpg",
			mc: 0
		},
		{
			size:"Double Truck Sponsorship",
			priceone:1575,
			discounttwo:350,
			discountthree:825,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/center.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/DoubleTruckPreview.jpg",
			mc: 2
		}
	]
	return{
		all: function(){
			return programs;
		}
	}
})
.factory('ProgramSecFactory', function(){
	var programs = [
				{
			size:"Full Page Sponsorship",
			priceone:845,
			discounttwo:100,
			discountthree:235,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/full.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/FullPagePreview.jpg",
			mc: 3
		},
		{
			size:"Inside Covers Sponsorship",
			priceone:1275,
			discounttwo:250,
			discountthree:625,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/full.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/InsideCoversPreview.jpg",
			mc: 3
		},
		{
			size:"Back Cover Sponsorship",
			priceone:1375,
			discounttwo:300,
			discountthree:700,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/full.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/BackCoverPreview.jpg",
			mc: 3
		},
		{
			size:"Double Truck Sponsorship",
			priceone:1575,
			discounttwo:350,
			discountthree:825,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/center.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/DoubleTruckPreview.jpg",
			mc: 2
		},
		{
			size:"Center Fold Sponsorship",
			priceone:1775,
			discounttwo:400,
			discountthree:925,
			img: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/center.png",
			preview: "http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/CenterFoldPreview.jpg",
			mc: 2
		}
	]
	return{
		all: function(){
			return programs;
		}
	}
})
.controller('PosterCtrl', function($scope, PosterFactory) {
	$scope.styleasposter = true;
	$scope.styleasprogram = false;
	
	$scope.posters = PosterFactory.all();
//			$scope.sumSchoolName = "";
	$scope.posterSelected=false;
	$scope.sumPosterPreview = 'http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/OrderMockupPosterONE.jpg';
	$scope.seasonsSelected=false;
	$scope.sumExtraTwoPrice = 0;
	$scope.sumExtraOnePrice = 0;
	$scope.sumDiscountPrice = 0;
	$scope.adbExtraOne = false;
	$scope.adbExtraTwo = false;
	$scope.bagadded = false;
	$scope.showmc3 =false;
	$scope.showmc2 =false;

	$scope.selectPoster = function(poster){
		$scope.posterSelected=true;
		$scope.oneseasonprice = poster.priceone;
		$scope.threeseasonprice = (poster.priceone * 3);
		$scope.sumPoster = poster;
		$scope.sumPosterSize = poster.size;
		$scope.sumPosterPrice = poster.priceone;
		$scope.sumPosterPriceTot =  poster.priceone;
		$scope.sumPosterPreview = poster.preview;
		$scope.sumDiscountName = "";
		$scope.adbSeasonOne = false;
		$scope.adbSeasonTwo = false;
		$scope.adbSeasonThree = false;
		$scope.bagadded = false;
		$scope.sumDiscountPrice = 0;
		var div = document.getElementById("sumSchoolName");
		$scope.currentSchool = div.textContent;
	}

	$scope.selectSeasons = function(seasons){
		$scope.adbSeasonOne = false;
		$scope.adbSeasonTwo = false;
		$scope.adbSeasonThree = false;
		$scope.bagadded = false;
		if(seasons===3){
			$scope.sumDiscountName = "Full Year Discount";
			$scope.sumDiscountPrice = $scope.sumPoster.discountthree;
			$scope.sumPosterPriceTot = ($scope.sumPosterPrice * 3);
			$scope.adbSeasonThree = true;
			$scope.seasons = 3;
		} else if (seasons===2){
			$scope.sumDiscountName = "Two Season Discount";
			$scope.sumDiscountPrice = $scope.sumPoster.discounttwo;
			$scope.sumPosterPriceTot = ($scope.sumPosterPrice * 2);
			$scope.adbSeasonTwo = true;
			$scope.seasons = 2;
		} else if (seasons===1){

			$scope.sumDiscountName = "No Discount";
			$scope.sumDiscountPrice = 0;
			$scope.sumPosterPriceTot = ($scope.sumPosterPrice * 1);
			$scope.adbSeasonOne = true;
			$scope.seasons = 1;
		}

		$scope.seasonsSelected=true;
	}

	$scope.selectExtras = function(extras){
		$scope.bagadded = false;
		 if (extras===2){
			if($scope.adbExtraTwo===false){
				$scope.adbExtraTwo = true;
				$scope.sumExtraTwoName = "Athletic Shirts";
				$scope.sumExtraTwoPrice = 1500;
				console.log('this');
			} else {
				$scope.adbExtraTwo = false;
				$scope.sumExtraTwoName = "";
				$scope.sumExtraTwoPrice = 0;
				console.log('that');
			}
		} else if (extras===1){

			if($scope.adbExtraOne===false){
				$scope.adbExtraOne = true;
				$scope.sumExtraOneName = "Pocket Schedules";
				$scope.sumExtraOnePrice = 750;
			} else {
				$scope.adbExtraOne = false;
				$scope.sumExtraOneName = "";
				$scope.sumExtraOnePrice = 0;
			}
		}


	}

	$scope.totalPrice = function(){
		if($scope.sumPosterPriceTot){
			var total = ($scope.sumPosterPriceTot - $scope.sumDiscountPrice);
		} else {
			var total = 0;
		}
		return total + ($scope.sumExtraOnePrice + $scope.sumExtraTwoPrice);

	}



	$scope.addToBag = function(){
		console.log('Add to Bag');
		var neg = -Math.abs($scope.sumDiscountPrice);
		var seasons = $scope.seasons + ' Seasons';
		var seasonsd = seasons + ' Discount';
		var order = [
			[{school: $scope.currentSchool, total: $scope.totalPrice()}],
			[{name: $scope.sumPosterSize, type: 'poster', subtitle: seasons, price:$scope.sumPosterPriceTot}],
			[{name: "", type: 'discount', subtitle: seasonsd, price:neg}]
		]
//				Lockr.set($scope.currentSchool, [{school: $scope.currentSchool, total: $scope.totalPrice()}]);
		if($scope.adbExtraOne){
			order.push([{name: $scope.sumExtraOneName, type:'extra', subtitle: seasons, price:$scope.sumExtraOnePrice}]);
		}
		if($scope.adbExtraTwo){
			order.push([{name: $scope.sumExtraTwoName, type: 'extra', subtitle: seasons, price:$scope.sumExtraTwoPrice}]);
		}
		Lockr.sadd('CASCart',order);
		$scope.bagadded = true;
		if(!$scope.hidebagalert){
			window.alert('Your Bag is Updated!');
		}
	}

	$scope.checkOut = function(){
		if($scope.bagadded === false){
			$scope.hidebagalert = true;
			$scope.addToBag();
		}
	}
})
.controller('ProgramCtrl', function($scope, ProgramFactory, ProgramSecFactory) {
	
	$scope.styleasposter = false;
	$scope.styleasprogram = true;
	
	$scope.posters = ProgramFactory.all();
	$scope.posterssec = ProgramSecFactory.all();
	
//			$scope.sumSchoolName = "";
	$scope.posterSelected=false;
	$scope.sumPosterPreview = 'http://cas.threecordsstudio.com/wp-content/themes/cas-wp-theme/images/programs/1-2PagePreview.jpg';
	$scope.seasonsSelected=false;
	$scope.sumExtraTwoPrice = 0;
	$scope.sumExtraOnePrice = 0;
	$scope.sumDiscountPrice = 0;
	$scope.adbExtraOne = false;
	$scope.adbExtraTwo = false;
	$scope.bagadded = false;
	$scope.showmc3 =false;
	$scope.showmc2 =false;
	
	
	$scope.selectPoster = function(poster){
		$scope.showmc3 =false;
		$scope.showmc2 =false;
		if(poster.mc === 3){
			$scope.showmc3 =true;

		}	else if(poster.mc === 2){
			$scope.showmc2 =true;

		}	else if(poster.mc === 0){	
			$scope.posterSelected=true;
			$scope.oneseasonprice = poster.priceone;
			$scope.threeseasonprice = (poster.priceone * 3);
			$scope.sumPoster = poster;
			$scope.sumPosterSize = poster.size;
			$scope.sumPosterPrice = poster.priceone;
			$scope.sumPosterPriceTot =  poster.priceone;
			$scope.sumPosterPreview = poster.preview;
			$scope.sumDiscountName = "";
			$scope.adbSeasonOne = false;
			$scope.adbSeasonTwo = false;
			$scope.adbSeasonThree = false;
			$scope.bagadded = false;
			$scope.sumDiscountPrice = 0;
			var div = document.getElementById("sumSchoolName");
			$scope.currentSchool = div.textContent;
		}
	}

	$scope.selectMCPoster = function(i){

		var poster = $scope.posterssec[i];		
		console.log(poster);
		$scope.posterSelected=true;
		$scope.oneseasonprice = poster.priceone;
		$scope.threeseasonprice = (poster.priceone * 3);
		$scope.sumPoster = poster;
		$scope.sumPosterSize = poster.size;
		$scope.sumPosterPrice = poster.priceone;
		$scope.sumPosterPriceTot =  poster.priceone;
		$scope.sumPosterPreview = poster.preview;
		$scope.sumDiscountName = "";
		$scope.adbSeasonOne = false;
		$scope.adbSeasonTwo = false;
		$scope.adbSeasonThree = false;
		$scope.bagadded = false;
		$scope.sumDiscountPrice = 0;
		var div = document.getElementById("sumSchoolName");
		$scope.currentSchool = div.textContent;
	}
	
	$scope.selectSeasons = function(seasons){
		$scope.adbSeasonOne = false;
		$scope.adbSeasonTwo = false;
		$scope.adbSeasonThree = false;
		$scope.bagadded = false;
		if(seasons===3){
			$scope.sumDiscountName = "Full Year Discount";
			$scope.sumDiscountPrice = $scope.sumPoster.discountthree;
			$scope.sumPosterPriceTot = ($scope.sumPosterPrice * 3);
			$scope.adbSeasonThree = true;
			$scope.seasons = 3;
		} else if (seasons===2){
			$scope.sumDiscountName = "Two Season Discount";
			$scope.sumDiscountPrice = $scope.sumPoster.discounttwo;
			$scope.sumPosterPriceTot = ($scope.sumPosterPrice * 2);
			$scope.adbSeasonTwo = true;
			$scope.seasons = 2;
		} else if (seasons===1){

			$scope.sumDiscountName = "No Discount";
			$scope.sumDiscountPrice = 0;
			$scope.sumPosterPriceTot = ($scope.sumPosterPrice * 1);
			$scope.adbSeasonOne = true;
			$scope.seasons = 1;
		}

		$scope.seasonsSelected=true;
	}

	$scope.selectExtras = function(extras){
		$scope.bagadded = false;
		 if (extras===2){
			if($scope.adbExtraTwo===false){
				$scope.adbExtraTwo = true;
				$scope.sumExtraTwoName = "Athletic Shirts";
				$scope.sumExtraTwoPrice = 1500;
				console.log('this');
			} else {
				$scope.adbExtraTwo = false;
				$scope.sumExtraTwoName = "";
				$scope.sumExtraTwoPrice = 0;
				console.log('that');
			}
		} else if (extras===1){

			if($scope.adbExtraOne===false){
				$scope.adbExtraOne = true;
				$scope.sumExtraOneName = "Pocket Schedules";
				$scope.sumExtraOnePrice = 750;
			} else {
				$scope.adbExtraOne = false;
				$scope.sumExtraOneName = "";
				$scope.sumExtraOnePrice = 0;
			}
		}


	}

	$scope.totalPrice = function(){
		if($scope.sumPosterPriceTot){
			var total = ($scope.sumPosterPriceTot - $scope.sumDiscountPrice);
		} else {
			var total = 0;
		}
		return total + ($scope.sumExtraOnePrice + $scope.sumExtraTwoPrice);

	}



	$scope.addToBag = function(){
		console.log('Add to Bag');
		var neg = -Math.abs($scope.sumDiscountPrice);
		var seasons = $scope.seasons + ' Seasons';
		var seasonsd = seasons + ' Discount';
		var order = [
			[{school: $scope.currentSchool, total: $scope.totalPrice()}],
			[{name: $scope.sumPosterSize, type: 'program', subtitle: seasons, price:$scope.sumPosterPriceTot}],
			[{name: "", type:'discount', subtitle: seasonsd, price:neg}]
		]
//				Lockr.set($scope.currentSchool, [{school: $scope.currentSchool, total: $scope.totalPrice()}]);
		if($scope.adbExtraOne){
			order.push([{name: $scope.sumExtraOneName, type: 'extra', subtitle: seasons, price:$scope.sumExtraOnePrice}]);
		}
		if($scope.adbExtraTwo){
			order.push([{name: $scope.sumExtraTwoName, type: 'extra', subtitle: seasons, price:$scope.sumExtraTwoPrice}]);
		}
		Lockr.sadd('CASCart',order);
		$scope.bagadded = true;
		if(!$scope.hidebagalert){
			window.alert('Your Bag is Updated!');
		}
	}

	$scope.checkOut = function(){
		if($scope.bagadded === false){
			$scope.hidebagalert = true;
			$scope.addToBag();
		}
	}
});