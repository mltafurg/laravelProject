# laravelProject

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Tutorial 3

### What is the difference between the two solutions ? 

- first of all using the dependency inversion, the controller calls to the interface, receiving the store function that service provider links to the interface, so the controller actually does not know which class uses to get the function.
  
- Now, in the other solution, we do not use the interface, instead we instanciate the class that has the implemented function of the interface, here the controller needs to know the class to use the store function.

### Advantages and disvantages of the two solutions ? 

**Dependency inversion:** 

- Advantages: Having the separation of tasks helps us, when we want to modify the code in the future and add another form of storing the images, 
as we only need to modify the service provider file to connect the controller with the new store function of the new class. 

- Disadvantages: For a starting project using this method, requires creating different files that may complexify the code. 

**Without dependency inversion:**

- Advantages: If we dont change the way we store images of other files, or basically if we do not have different ways of doing something and its always the same solution (local disk storage ) is faster instantiation of the class in the controller. 

- Disadvantages: When the time comes to add a new way of storing images, we need to modify the code of the controllers that are using this method, as we have to instantiate the class in the controllers.

So, when we are not using dependency inversion, the way we program is more similar to the structured programing, where the function store needs to be called directly from the file that it needs it. On the other hand, dependency inversion has the way of POO, where we take advantage of the polymorphism and have a class that implements the method of the interface, and only adding it's logic, for the controller only to call the interface to access the store function. 


  
