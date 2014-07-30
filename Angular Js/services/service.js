var serviceModule = angular.module('Angular_Service',[]).factory('testService',['$rootScope',function($rootScope){
    var TODOS = [];


    var addTODO = function(task)
    {
        TODOS.push({'task':task});
    }


    var getTODOs = function()
    {
        return TODOS;
    }

    var deleteTODO = function(todo)
    {
     for(var i = 0; i< TODOS.length;i++)
     {
         if(TODOS[i].task == todo.task)
         {
             TODOS.splice(i,1);
             return;
         }
     }
    }

    var service = {
        addTodo : addTODO,
        getTodo : getTODOs,
        deleteTodo: deleteTODO
    }
    return service;

}])