lbc.controller('firstController', function($scope,$http) {


    $scope.json = [{
            filterName : 'RegionMain',
            value: 'rhone_alpes',
            values: [{value : 'rhone_alpes', name: 'Rhone Alpes'}],
            children: [{
                filterName : 'RegionMain',
                value: 'rhone_alpes',
                values: [{value : 'rhone_alpes', name: 'Rhone Alpes'}],
                children: []
            }]
    }];
});