var lbc = angular.module('lbc', []).config(function($interpolateProvider){
        $interpolateProvider.startSymbol('{{').endSymbol('}}');
    }
).factory('RecursionHelper', ['$compile', function($compile){
    return {
        /**
         * Manually compiles the element, fixing the recursion loop.
         * @param element
         * @param [link] A post-link function, or an object with function(s) registered via pre and post properties.
         * @returns An object containing the linking functions.
         */
        compile: function(element, link){
            // Normalize the link parameter
            if(angular.isFunction(link)){
                link = { post: link };
            }

            // Break the recursion loop by removing the contents
            var contents = element.contents().remove();
            var compiledContents;
            return {
                pre: (link && link.pre) ? link.pre : null,
                /**
                 * Compiles and re-adds the contents
                 */
                post: function(scope, element){
                    // Compile the contents
                    if(!compiledContents){
                        compiledContents = $compile(contents);
                    }
                    // Re-add the compiled contents to the element
                    compiledContents(scope, function(clone){
                        element.append(clone);
                    });

                    // Call the post-linking function, if any
                    if(link && link.post){
                        link.post.apply(null, arguments);
                    }
                }
            };
        }
    };
}]).directive("tree", function(RecursionHelper) {
    return {
        restrict: "E",
        scope: {family: '='},
        template:
                '<ul>' +
                '<li ng-repeat="(index,data) in family">' +
                '{{ data.filterName }}<select ng-model="family[index][\'value\']">'+
                '<option ng-repeat="select in data.values" value="{{select.value}}">{{select.name}}</option>'+
                '</select>' +
                '<tree family="data.children"></tree>' +
                '</li>' +
                '</ul>',
        compile: function(element) {
            // Use the compile function from the RecursionHelper,
            // And return the linking function(s) which it returns
            return RecursionHelper.compile(element);
        }
    };
});

/*

 Structure du json :
 {
 CategoryMain:
 { filterName: CategoryMain, value: 'voiture' , childs :
 [
 {  {instance: MaxPrice : value : 10 , childs : []}},
 { minPrice : { value : 1, childs : [] }}
 ],
 values : []
 },
 RegionMain: { value: undefined', childs: []}, }
 *
 * */