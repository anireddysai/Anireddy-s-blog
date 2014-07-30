serviceModule.controller('testController',['$scope','testService',function($scope,testService){

    $scope.init = function()
    {
        // Writing init method to dsplay, the TODOS on page Load if any.

      var todos =   testService.getTodo();
      $scope.todos = todos;
    }

    $scope.addTodo  =  function()
    {
        var task = $scope.todo;
        console.log(task);

        testService.addTodo(task);
    }
    $scope.deleteIt = function(todo)
    {
        testService.deleteTodo(todo);
        alert("Hooo! The TODO Deleted!");
        $scope.init();

    }

    $scope.init();
}])


